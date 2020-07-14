# PiVPN-Dashboard-UI

**Based on [OpenRSD](https://github.com/mitchellurgero/openrsd)
**Based on [PiVPN GUI](https://github.com/AnnonZerp/pivpn-gui)

### How to install

```sudo apt-get update && sudo apt-get install git apache2 php libapache2-mod-php expect geoip-bin```
	
sudo nano /etc/apache2/apache2.conf - Edit the User and Group to the user/group (CURRENT_USERNAME)

```
sudo service apache2 restart
sudo apt install libpam0g-dev
sudo apt install build-essential
cd /var/www/html
cd app/bin
sudo ./compile_pam.sh
sudo service apache2 restart
```

This Project is based off Autoinstall Script of OpenVPN from [pivpn.io](http://pivpn.io).
