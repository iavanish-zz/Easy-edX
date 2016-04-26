#!/bin/bash

# considering that ubuntu-server-12.04 is installed on the current machine

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

echo "Installing git..."
apt-get install git
echo "Installed git"

echo

echo "Installing edX full stack..."
wget https://raw.githubusercontent.com/edx/configuration/master/util/install/ansible-bootstrap.sh -O - | sudo -u avanish1404 bash
wget https://raw.githubusercontent.com/edx/configuration/master/util/install/sandbox.sh -O - | bash
echo "Installed edX full stack"

echo

echo "Cloning the configuration repo..."
cd /var/tmp
git clone https://github.com/edx/configuration
echo "Cloned the configuration repo"

echo

echo "Installing the ansible requirements..."
cd /var/tmp/configuration
pip install -r requirements.txt\
echo "Installed the ansible requirements"

echo

echo "Running the edx_sandbox playbooks in the configuration/playbooks directory..."
cd /var/tmp/configuration/playbooks && ansible-playbook -c local ./edx_sandbox.yml -i “localhost,”
echo "Succeeded in running edx_sandbox playbook"

echo

echo "edX full stack has been successfully installed"

echo

echo "Rebooting..."
reboot
