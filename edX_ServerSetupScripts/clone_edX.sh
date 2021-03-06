#!/bin/bash

# Cloning the existing edX machine
echo "Cloning the existing edX machine..."
VBoxManage clonevm Clone-able-edX --mode machine --options keepnatmacs --name test --register
echo "Successfully cloned the machine. Machine's name is test"

echo

# Performing port forwarding for LMS
echo "Performing port forwarding for LMS..."
VBoxManage modifyvm test --natpf1 \"Rule1,TCP,,9090,10.0.2.15,80
echo "Port forwarding performed successfully. LMS will now be available on port 9090"

echo

# Performing port forwarding for studio
echo "Performing port forwarding for studio..."
VBoxManage modifyvm test --natpf1 \"Rule2,TCP,,19090,10.0.2.15,18010
echo "Port forwarding performed successfully. Studio will now be available on port 19090"

echo

# Starting the new edX instance
echo "Starting the new edX instance..."
VBoxManage startvm test --type headless
echo "Started the new edX instance"
echo "LMS is available at http://192.168.1.243:9090"
echo "Studio is available at http://192.168.1.243:19090"

echo
