<?php
/*                         A U T H . P H P
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
/** @file geometry_viewer/accounts/auth.php
 *
 */

    /* Start session */
    session_start();

    /** Check whether the session variable SESS_MEMBER_ID is 
     * present or not 
     * */
    if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) {
        header("Location: accounts/landing.php");
        exit();
    } else {
        $username = $_SESSION['username'];
        $email = $_SESSION['email'];
    }

/*                                                                    
 * Local Variables:                                                   
 * mode: PHP                                                            
 * tab-width: 8
 * End:                                                               
 * ex: shiftwidth=4 tabstop=8                                         
 */
?>
