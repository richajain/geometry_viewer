<?php
/*                         L O G I N . P H P
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
/** @file geometry_viewer/accounts/login.php
 *
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
	<title>Sign In</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="imagetoolbar" content="no" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<meta name="copyright" content="" />

	<link href="inc/css/bootstrap.min.css" rel="stylesheet" 
        type="text/css" media="screen" />

        <script src="inc/js/bootstrap.min.js"></script>
        <script src="inc/js/jquery-1.10.2.min.js"></script>
        
        <style>
            body {
                background-color:#F2F2F2;
            }
        </style>
	
    </head>

    <body>
        <?php
            /* Start session */
            session_start();
            include_once 'inc/php/config.php';

            /*check if the form has been submitted */
            if(isset($_POST['sign_in'])){

                /* prevent mysql injection */
	
                $password = md5(mysql_real_escape_string($_POST['password']));
	        $email = mysql_real_escape_string($_POST['email']);
	
                /* quick/simple validation */
                if (empty($password)) { 
                    $action['result'] = 'error'; 
                }

                if (empty($email)) { 
                    $action['result'] = 'error'; 
                }
	
	        if ($action['result'] != 'error') {
				
                    $result = mysql_query("SELECT * FROM `users` WHERE 
                    (email='$email' AND password='$password')")  
                    or die(mysql_error());

                    if(!isset($result)) {
                        echo "query failed";
                    }

                    if (mysql_num_rows($result) > 0) {
                        session_regenerate_id();
                        $member = mysql_fetch_assoc($result);
                        $_SESSION['id'] = $member['id'];
                        $_SESSION['username'] = $member['username'];
                        $_SESSION['email'] = $member['email'];
                        session_write_close();
                        header("Location: ../upload.php");
                        exit();
                
                    } else {
                        /* Login failed */
                        echo "email ID and / or password not found";
                        exit();
                    }
                }
            }
        ?>

        <form method="post" action="" class="form-horizontal" 
        role="form">
            <fieldset>
                <legend>Sign In</legend>        
                    <div class="form-group">
                        <label class="col-lg-1 control-label" 
                        for="email">Email:</label>
                        <div class="col-lg-10">
                            <input type="email" class="form-control" 
                            id ="email" name="email" 
                            style="width: 250px;" required>
                        </div>
                    </div>

    		    
                    <div class="form-group">
                        <label class="col-lg-1 control-label" 
                        for="password">Password:</label>
                        <div class="col-lg-10">
                            <input type="password" class="form-control" 
                            id ="password" name="password" 
                            style="width: 250px;" required>
                        </div>
                    </div>
    		        

                    <div class="col-lg-1">
    		        <input type="submit" value="Sign in" 
                        class="btn btn-primary" name="sign_in" 
                        style="width: 250px;"/>			
                    </div>
            </fieldset>    
        </form>			
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
