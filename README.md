# CapstoneProject
<h3>Course management system using Open edX</h3>
<br>
<h4>edX_ServerSetupScripts</h4>
<ul>
<li>
<b>virtualBoxSetup.sh</b><br>
On an Ubuntu server (preferably 14.04), run this script with root access. Once this script finishes, VirtualBox will be installed on the server. Further changes will be made in this VirtualBox only. I have made myself (avanish1404) a dedicated user of this VirtualBox.
<br>
Command: sudo ./virtualBoxSetup.sh
</li>

<li>
<b>edXInstallation.sh</b><br>
Run this script with root access. Once this script finishes, a full stack version of edX will be installed on the server. We can just keep on cloning this instance whenever we need a new edX instance.
<br>
Command: sudo ./edXInstallation.sh
</li>

<li>
<b>clone_edX.sh</b><br>
First create a clone of the initially installed full stack instance of edX, and name it Clone-able-edX.
Then, run this script. No need of having root access for running this script. Once this script finishes, a new instance of edX will be created (by cloning the Clone-able-edX machine).
<br>
Command: sudo ./clone_edX.sh
</li>
</ul>
<br>

<h4>WebApp</h4>

<b>Deployment procedure:</b>
<ol>
<li>On an Ubuntu machine (preferably 14.04), install apache2 and php5.</li>
<li>Copy the contents of the folder WebApp (https://github.com/iavanish/CapstoneProject/tree/master/WebApp) into /var/www/html folder</li>
<li>Run the following command on a terminal:<br>
    sudo /etc/init.d/apache2 start</li>
</ol>

Now, the  web application is deployed and ready to be used.
