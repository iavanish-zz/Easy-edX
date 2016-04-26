# CapstoneProject
<h3><b>Course management system using Open edX</b></h3>


<h5>edX_ServerSetupScripts</h5>

<h7>virtualBoxSetup.sh</h7>
On an Ubuntu server (preferably 14.04), run this script with root access. Once this script finishes, VirtualBox will be installed on the server. Further changes will be made in this VirtualBox only. I have made myself (avanish1404) a dedicated user of this VirtualBox.

Command: sudo ./virtualBoxSetup.sh

<h7>edXInstallation.sh</h7>
Run this script with root access. Once this script finishes, a full stack version of edX will be installed on the server. We can just keep on cloning this instance whenever we need a new edX instance.

Command: sudo ./edXInstallation.sh

<h7>clone_edX.sh</h7>
First create a clone of the initially installed full stack instance of edX, and name it Clone-able-edX.
Then, run this script. No need of having root access for running this script. Once this script finishes, a new instance of edX will be created (by cloning the Clone-able-edX machine).

Command: sudo ./clone_edX.sh


<h5>WebApp</h5>

<h7>Deployment procedure:</h7>
1. On an Ubuntu machine (preferably 14.04), install apache2 and php5.
2. Copy the contents of the folder WebApp (https://github.com/iavanish/CapstoneProject/tree/master/WebApp) into /var/www/html folder.
3. Run the following command on a terminal:
    sudo /etc/init.d/apache2 start

Now, the  web application is deployed and ready to be used.
