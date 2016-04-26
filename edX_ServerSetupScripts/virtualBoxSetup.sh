#!/bin/bash

echo "Updating the system..."
apt-get update -y
echo "System updated"

echo

echo "Upgrading the Debian packages to the latest version..."
apt-get dist-upgrade -y
echo "Debian packages upgraded"

echo

echo "Removing useless packages..."
apt-get autoremove -y
echo "Useless packages removed"

echo

echo "Installing required kernel-headers and kernel-packages..."
apt-get install build-essential dkms -y
echo "kernel-headers and kernel-packages installed"

echo

echo "Creating a separate VirtualBox repository file in Ubuntu..."
echo "deb http://download.virtualbox.org/virtualbox/debian trusty contrib" >> /etc/apt/sources.list.d/virtualbox.list
echo "Created a separate VirtualBox repository file in Ubuntu"

echo

echo "Downloading the repository key..."
wget -q http://download.virtualbox.org/virtualbox/debian/oracle_vbox.asc -O- | apt-key add -
echo "Downloaded the repository key"

echo

echo "Installing VirtualBox..."
apt-get update -y
apt-get install VirtualBox-4.3 -y
echo "Installed VirtualBox"

echo

echo "Downloading VirtualBox_ExtensionPack..."
cd /tmp/ && wget http://download.virtualbox.org/virtualbox/4.3.36/Oracle_VM_VirtualBox_ExtensionPack-4.3.36-105129.vbox-extpack
echo "Downloaded VirtualBox_ExtensionPack"

echo

echo "Installing VirtualBox_ExtensionPack..."
VBoxManage extpack install Oracle_VM_VirtualBox_Extension_Pack-4.3.36-105129.vbox-extpack
echo "Installed VirtualBox_ExtensionPack"

echo

echo "Making avanish1404 a dedicated user of the VirtualBox..."
usermod -aG vboxusers avanish1404
echo "Made avanish1404 a dedicated user of the VirtualBox"

echo

echo "Checking if VirtualBox was correctly installed and loaded..."
/etc/init.d/vboxdrv status
echo "Status okay"

echo

echo "Starting VirtualBox web service..."
/etc/init.d/vboxweb-service start
echo "Started VirtualBox web service"

echo

echo "VirtualBox is installed and started successfully"

echo
