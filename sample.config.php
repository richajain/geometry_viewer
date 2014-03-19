<?php
/*                     C O N F I G . P H P
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
/** @file geometry_viewer/config.php
 *
 */

    /** Title of project. */
    $title = "BRL-CAD Online Geometry Viewer";

    /** Domain name of site. e.g. http://brlcad.org/ */
    $siteUrl = 'http://localhost/~harmanpreet/';

    /** Subject of confirmation e-mail sent on new account creation. */
    $newAccountSubject = 'Confirmation Link';

    /** Subject of password reset e-mail. */
    $passwordResetSubject = 'Reset Password';

    /** E-mail address of sender. Currently, it should be gmail address. */
    $senderEmail = 'yourGmailAccount@gmail.com';

    /** Password of sender's account. */
    $senderPassword = 'xxxxxxxx';

    /** Name of sender written in emails. */
    $senderName = 'Online Geometry Viewer';

    /** 
     * Path of mged executable file. To check this path on your 
     * system, run this command on terminal: "which mged" 
     * (without quotes).
     */
    $mgedPath = 'env /usr/brlcad/dev-7.24.1/bin/mged';

    /**
     * Path of g-obj executable file. To check this path on your 
     * system, run this command on terminal: "which g-obj" 
     * (without quotes).
     */
    $gobjPath = '/usr/brlcad/dev-7.24.1/bin/g-obj';

    $normTol = '10';


    /** MySQL credentials. */

    $mysqlUsername = '';
    $mysqlPassword = '';
    $mysqlDatabase = '';

/*                                                                    
 * Local Variables:                                                   
 * mode: PHP                                                            
 * tab-width: 8
 * End:                                                               
 * ex: shiftwidth=4 tabstop=8                                         
 */
?>
