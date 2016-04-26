# CapstoneProject
Course management system using Open edX


edX_ServerSetupScripts

virtualBoxSetup.sh
On an Ubuntu server (preferably 14.04), run this script with root access. Once this script finishes, VirtualBox will be installed on the server. Further changes will be made in this VirtualBox only. I have made myself (avanish1404) a dedicated user of this VirtualBox.

Command: sudo ./virtualBoxSetup.sh

edXInstallation.sh
Run this script with root access. Once this script finishes, a full stack version of edX will be installed on the server. We can just keep on cloning this instance whenever we need a new edX instance.

Command: sudo ./edXInstallation.sh

clone_edX.sh
First create a clone of the initially installed full stack instance of edX, and name it Clone-able-edX.
Then, run this script. No need of having root access for running this script. Once this script finishes, a new instance of edX will be created (by cloning the Clone-able-edX machine).

Command: sudo ./clone_edX.sh


WebApp

Deployment procedure:
On an Ubuntu machine (preferably 14.04), install apache2 and php5.
Copy the contents of the folder WebApp (https://github.com/iavanish/CapstoneProject/tree/master/WebApp) into /var/www/html folder.
Run the following command on a terminal:
sudo /etc/init.d/apache2 start
Now, the  web application is deployed and ready to be used.
