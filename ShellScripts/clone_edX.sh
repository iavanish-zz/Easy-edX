#!/bin/bash

VBoxManage clonevm Clone-able-edX --mode all --name test --register
VBoxManage modifyvm test --natpf1 \"Rule1,TCP,,9090,10.0.2.15,80
VBoxManage modifyvm test --natpf1 \"Rule2,TCP,,19090,10.0.2.15,18010

# need to add code to create users and all