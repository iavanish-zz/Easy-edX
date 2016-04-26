#!/bin/bash

echo "Updating the system"
apt-get update
echo "System updated"

echo "Upgrading the distribution"
apt-get dist-upgrade
echo "Distribution upgraded"

echo "Removing useless packages"
apt-get autoremove
echo "Useless packages removed"

echo "Installing build-essential"
apt-get install build-essential dkms
echo "build-essential installed"

echo "Writing to a system file to make sure virtualbox is considered a trusty package"
echo "deb http://download.virtualbox.org/virtualbox/debian trusty contrib" >> /etc/apt/sources.list.d/virtualbox.list
echo "Written to the file"
# sudo -u avanish1404 nano /etc/apt/sources.list.d/virtualbox.list

echo "Downloading virtualBox and apt-key"
wget -q http://download.virtualbox.org/virtualbox/debian/oracle_vbox.asc -O- | apt-key add -
echo "Downloaded virtualBox and apt-key"

echo "Installing virtualBox"
apt-get update
apt-get install VirtualBox-4.3
echo "Installed virtualBox"

echo "Downloading virtualBox_ExtensionPack"
cd /tmp/ && wget http://download.virtualbox.org/virtualbox/4.3.36/Oracle_VM_VirtualBox_ExtensionPack-4.3.36-105129.vbox-extpack
echo "Downloaded virtualBox_ExtensionPack"

echo "Installing virtualBox_ExtensionPack"
VBoxManage extpack install Oracle_VM_VirtualBox_Extension_Pack-4.3.36-105129.vbox-extpack
echo "Installed virtualBox_ExtensionPack"

echo "Making avanish1404 a dedicated user of the virtualBox"
usermod -aG vboxusers avanish1404
echo "Made avanish1404 a dedicated user of the virtualBox"

echo "Checking status of virtualBox's installation"
/etc/init.d/vboxdrv status
echo "Status okay"

echo "Starting virtualBox service"
/etc/init.d/vboxweb-service start
echo "virtualBox is installed and started successfully"
