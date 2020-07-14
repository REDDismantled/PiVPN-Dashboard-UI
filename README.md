# PiVPN-Dashboard-UI

**Based on [OpenRSD](https://github.com/mitchellurgero/openrsd)

**Based on [PiVPN GUI](https://github.com/AnnonZerp/pivpn-gui)

### How to install
```sudo apt update && sudo apt install git apache2 php libapache2-mod-php expect geoip-bin build-essentials gcc```
	
Edit the User and Group to the user/group (CURRENT_USERNAME)
```
sudo nano /etc/apache2/apache2.conf 
```

```
sudo service apache2 restart
sudo apt install libpam0g-dev
sudo apt install build-essential
cd /var/www
sudo git clone https://github.com/REDDismantled/PiVPN-Dashboard-UI html
sudo chown $USER:$USER html
cd html/app/bin
sudo ./compile_pam.sh
sudo service apache2 restart
```

Features by: REDD
UI Theme by: AtomicWolf & REDD

This Project is based off Autoinstall Script of OpenVPN from [pivpn.io](http://pivpn.io).
