<?php
/*                 U P L O A D . P H P
 * BRL-CAD
 *
 * Copyright (c) 1995-2013 United States Government as represented by
 * the U.S. Army Research Laboratory.
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public License
 * version 2.1 as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this file; see the file named COPYING for more
 * information.
 */
/** @file geometry_viewer/upload.php
 *
 */
include 'accounts/auth.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
	<meta charset="utf-8">
	<title>BRL-CAD Online Geometry Viewer</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel=stylesheet href="css/dist/css/bootstrap.min.css" media="screen">
	<link rel=stylesheet href="css/upload.css" media="screen">
	<style type="text/css">
		.responsive-image { 
		    max-width:100%; height:auto; 
	    	}
		body {
		    background-color:#F2F2F2;
		}
	</style>
    </head>
    <body>
        <script src="css/dist/js/bootstrap.min.js"></script>
        <legend style="text-align:right;"><h5>You are logged in as: <?php echo $username; ?> | <a href="accounts/logout.php">Logout</a></h5></legend>
	<div class="text-center">
	    <h1 class="text-primary">BRL-CAD Online Geometry Viewer</h1>
	    <form class="navbar-form" action="upload_file.php" method="post" enctype="multipart/form-data">
		<label for="file">Upload BRl-CAD database(.g) file:</label><br>
		<input class="form-control" style="width: 250px;"  type="file" name="file" id="file"><br><br>
		<input type="submit" name="submit" value="Submit" class="btn btn-success btn-large">
	    </form>
	    <img class="responsive-image" src="images/BRL-CAD_gear_logo_256.png" style="width:250px"><br>
	    <a href="http://brlcad.org/" target="_blank">http://brlcad.org/</a>
	</div>
    </body>
</html>

<?php
/*                                                                    
 * Local Variables:                                                   
 * mode: PHP                                                            
 * tab-width: 8
 * End:                                                               
 * ex: shiftwidth=4 tabstop=8                                         
 */
?>
