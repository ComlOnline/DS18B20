<?php
$handle = fopen("/sys/bus/w1/devices/w1_bus_master1/w1_master_slaves", "r");
if ($handle) {
    while (($sensors = fgets($handle)) !== false) {
           $sensor = "/sys/bus/w1/devices/".trim($sensors)."/w1_slave";
           $sensorhandle = fopen($sensor, "r");
             if ($sensorhandle) {
                $thermometerReading = fread($sensorhandle, filesize($sensor));
                fclose($sensorhandle);
                // We want the value after the t= on the 2nd line
                preg_match("/t=(.+)/", preg_split("/\n/", $thermometerReading)[1], $matches);
                $sensors = str_replace(PHP_EOL, '', $sensors);
                $jsonstring->$sensors = $matches[1];
                $json = json_encode($jsonstring, JSON_NUMERIC_CHECK );
                echo $json;
                $sensors++;
             } else {
                print "{\"ERROR\":\"NOTEMP\"}";
             }
    }

    fclose($handle);
} else {
        print "{\"ERROR\":\"NOTFOUND\"}";
}
?>
