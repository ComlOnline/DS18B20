# DS18B20
Simple PHP Code to automatically read and display DS18B20 names and temps to a php page on a raspberry pi.

## Instructions:
You will need to setup the pi to add OneWire support  
Start by adding `dtoverlay=w1-gpio` to `/boot/config.txt`  
You can do this by running:  
```echo "dtoverlay=w1-gpi" | sudo tee -a /boot/config.txt```  

Then add the `w1-gpio` and `w1-therm` moduels to `/etc/modules`  
```echo "w1-gpio" | sudo tee -a /etc/modules```  
```echo "w1-therm" | sudo tee -a /etc/modules```  


Now reboot your pi. Add temp.php to /var/www/ then visit http://127.0.0.1/temp.php

Page output should look similar to this:
```
{"28-0517027014ff":19625}
{"28-0214640d18ff":19687}
```
