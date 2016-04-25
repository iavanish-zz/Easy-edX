<?php  

	$showKeyword = "";

	if(isset($_POST['submit-form'])) {
	
		$showKeyword = $_POST['keyword'];

	}

?>

<!DOCTYPE html>

<html>

    <title>Search for courses on alternative platforms</title>

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css" />
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3-theme-red.css" />
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" />
    
    <link rel="stylesheet" type="text/css" href="style.css" />

    <body>

        <div id="wrapper">


        	<a href="searchCourses.php" style="text-decoration:none;">
            	<!-- Header -->
            	<header class="w3-container w3-theme w3-padding" id="myHeader">
                	<div class="w3-center">
                    	<h1><b>SEARCH FOR COURSES ON ALTERNATIVE PLATFORMS</b></h1>
                	</div>
            	</header>
            </a>


            <div class="w3-row-padding w3-center w3-margin-top">

            	<div class="w3-col">
                    <div class="w3-card-2 w3-padding-top" style="min-height:43px">
            			<form action = "searchCourses.php" method = "post">
							<b>Search Keyword:</b> <input type = "text" value = "<?php echo $showKeyword; ?>" name = "keyword" />
							<input type = "submit" value = "Search" name = "submit-form" />
						</form>
					</div>
				</div>  

			</div>


			<?php  

				$keyword = "";

				if(isset($_POST['submit-form'])) {
	
					$keyword = $_POST['keyword'];


					echo "<div class=\"w3-row-padding w3-right w3-margin-top\">";


		           	echo "<div class=\"w3-half\">";
        	        echo "<div class=\"w3-card-2 w3-padding-top\" style=\"min_height:600px\">";


					// Search Udemy

					$url = "https://www.udemy.com/api-2.0/courses/?search=";
					$url = $url . $keyword;

					$username = "nyrZ40K1B9ZHmgi6H9Htk7thI48ZhWlgmNQYzda0";
					$password = "skylqEx1zh39OdgZQgBb7eem7qd5Pr0ATIMtF152FmAOqLTWPQApWmaz88PSana0W1WtfRgIa1hHUzSrh6g0jiLnZ4hjnMiQJAVRnmSlHf2kxPqOSPGML4y2OXjB3aZs";

					$client = curl_init($url);
					curl_setopt($client, CURLOPT_USERPWD, "$username:$password");
					curl_setopt($client, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
					curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				
					$response = curl_exec($client);
					$result = json_decode($response);
					$results = $result -> results;

					$count = 0;

					echo "<h5><center><b><u><font color='red'>UDEMY</font></u></b></center></h5>";

					echo "<ul>";

					foreach($results as $temp) {
						// limiting the no. of results to 10
						
						if($count == 10) {
							break;
						}
						$count++;

						echo "<li>";
						echo $temp -> title;
						echo " : ";
						$courseURL = "https://www.udemy.com" . $temp -> url;
						echo "<font color='blue'><a href=" . $courseURL . ">" . $courseURL . "</a></font>";
						echo "</li>";
					}

					echo "</ul>";

					echo "</div>";
					echo "</div>";


					echo "<div class=\"w3-half\">";
        	        echo "<div class=\"w3-card-2 w3-padding-top\" style=\"min_height:600px\">";

					// Search Coursera

					$keyword = str_replace(" ", "+", $keyword);

					$url = "https://api.coursera.org/api/courses.v1?fields=previewLink&q=search&query=";
					$url = $url . $keyword;

					$client = curl_init($url);
					curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
				
					$response = curl_exec($client);

					$result = json_decode($response);

					$results = $result -> elements;

					$count = 0;

					echo "<h5><center><b><u><font color='red'>COURSERA</font></u></b></center></h5>";

					echo "<ul>";

					foreach($results as $temp) {
						// limiting the no. of results to 9
						// but if a course has a previewLink, it should be included in the results
						
						if(($count >= 9) && (!array_key_exists("previewLink", $temp))) {
							continue;
						}
						$count++;

						echo "<li>";
						echo $temp -> name;
						echo " : ";
						if(array_key_exists("previewLink", $temp)) {
							$courseURL = $temp -> previewLink;
							echo "<font color='blue'><a href=" . $courseURL . ">" . $courseURL . "</a></font>";
						}
						else {
							echo "<font color='blue'>Preview link not available</font>";
						}
						echo "</li>";
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
