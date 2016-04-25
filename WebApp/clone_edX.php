<!DOCTYPE html>

<html>

    <title>Get a new open edX instance</title>

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css" />
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3-theme-red.css" />
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" />
    
    <link rel="stylesheet" type="text/css" href="style.css" />

    <body>

        <div id="wrapper">


        	<a href="clone_edX.html" style="text-decoration:none;">
            	<!-- Header -->
            	<header class="w3-container w3-theme w3-padding" id="myHeader">
                	<div class="w3-center">
                    	<h1><b>GET A NEW OPEN edX INSTANCE</b></h1>
                	</div>
            	</header>
            </a>


            <?php  

				$instructorsID = "";
				$studentsID = "";

				if(isset($_POST['submit-form'])) {

					echo "<div class=\"w3-row-padding w3-right w3-margin-top\">";


		           	echo "<div class=\"w3-half\">";
        	        echo "<div class=\"w3-card-2 w3-padding-top\" style=\"min_height:600px\">";
					
					$instructorsID = $_POST['instructorsID'];
					$studentsID = $_POST['studentsID'];

					$instructorsIDArray = explode(',', $instructorsID);
					$studentsIDArray = explode(',', $studentsID);

					$machineName = "edX" . rand();

					if(!function_exists("ssh2_connect")) {
						echo "Not feasible right now. Terminated!!<br><br>";
						die("function ssh2_connect doesn't exist");
					}

					if(!($con = ssh2_connect("sabre.iiitd.edu.in", 22))) {
						echo "Can't connect. Server issues. Terminated!!<br><br>";
					}
					else {
						if(!ssh2_auth_password($con, "avanish1404", "avanish")) {
							echo "Can't authenticate. Terminated!!<br><br>";
						}

						if(!($clone = ssh2_exec($con, "VBoxManage clonevm Clone-able-edX --mode machine --options keepnatmacs --name test --register"))) {
							echo "Unable to clone. Server issues. Terminated!!<br><br>";
						}
						else {
							sleep(30);

							$lMSPort = rand(1000, 65535);
							$studioPort = rand(1000, 65535);

							$lMSPortForward = "VBoxManage modifyvm test --natpf1 \"Rule1,TCP,," . $lMSPort . ",10.0.2.15,80\"";
							if(!($portF1 = ssh2_exec($con, $lMSPortForward))) {
								echo "Can't perform port forwarding. Server issues. Terminated!!<br><br>";
							}
							sleep(5);

							$studioPortForward = "VBoxManage modifyvm test --natpf1 \"Rule2,TCP,," . $studioPort . ",10.0.2.15,18010\"";
							if(!($portF2 = ssh2_exec($con, $studioPortForward))) {
								echo "Can't perform port forwarding. Server issues. Terminated!!<br><br>";						
							}
							sleep(5);
							if(!($startVM = ssh2_exec($con, "VBoxManage startvm test --type headless"))) {
								echo "Could not start the new edX instance. Server issues. Terminated!!<br><br>";
							}

							sleep(60);
							echo "Your edX LMS: <a href=\"http://192.168.1.243:" . $lMSPort . "/\">192.168.1.243:" . $lMSPort . "</a><br><br>";
							echo "Your edX Studio: <a href=\"http://192.168.1.243:" . $studioPort . "/\">192.168.1.243:" . $studioPort . "</a><br><br>";
						}
					}

					echo "</div>";
					echo "</div>";
					
				}

			?>


            <!-- Footer -->
            <div id="footer">
                <p style="text-align:right">
                    Developed by Avanish Singh <a href="https://github.com/iavanish" target="_blank"> (@iavanish) </a>
                </p>
            </div>

            
        </div>

    </body>

</html>
