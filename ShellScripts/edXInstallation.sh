#!/bin/bash

sudo -u avanish1404 nano /etc/default/grub
sudo -u avanish1404 update-grub
sudo -u avanish1404 apt-get update -y
sudo -u avanish1404 apt-get install -f
sudo -u avanish1404 rm -rf /var/lib/apt/lists/*
sudo -u avanish1404 apt-get update -y
sudo -u avanish1404 apt-get upgrade -y
sudo -u avanish1404 apt-get install git
sudo -u avanish1404 reboot

wget https://raw.githubusercontent.com/edx/configuration/master/util/install/ansible-bootstrap.sh -O - | sudo -u avanish1404 bash
wget https://raw.githubusercontent.com/edx/configuration/master/util/install/sandbox.sh -O - | bash

cd /var/tmp
git clone https://github.com/edx/configuration

sudo -u avanish1404 nano configuration/playbooks/roles/common_vars/defaults/main.yml

cd /var/tmp/configuration
sudo -u avanish1404 pip install -r requirements.txt

cd /var/tmp/configuration/playbooks && sudo -u avanish1404 ansible-playbook -c local ./edx_sandbox.yml -i “localhost,”

sudo -u avanish1404 su edxapp -s /bin/bash
cd ~
source edxapp_env
python /edx/app/edxapp/edx-platform/manage.py lms createsuperuser --settings aws

cd /edx/app/edxapp/edx-platform
sudo -u avanish1404 -u www-data /edx/bin/python.edxapp ./manage.py lms --settings aws create_user -e avanish@example.com -u avanish -p 12345678
