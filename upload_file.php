<?php
 
/* Following variable will 
 * hold 1, if upload completes, 
 * 2  if file already exists, 
 * otherwise 0. */
$uploadComplete = 0;

if ($_FILES["file"]["error"] > 0) {
    echo "Error: " . $_FILES["file"]["error"] . "<br>";
    $uploadComplete = 0;
} else if (file_exists("upload/" . $_FILES["file"]["name"])) {
//    echo $_FILES["file"]["name"] . " already exists. ";
    $uploadComplete = 2;
} else {
    move_uploaded_file($_FILES["file"]["tmp_name"],
    "upload/" . $_FILES["file"]["name"]);
//    echo "File Name: " . $_FILES["file"]["name"] . "<br>";
//    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    $uploadComplete = 1;
}

/* Holds the names of entities that to be displayed. variable is passed to
 * WebGL through header */
$redirectionData = NULL;
$objN = NULL;

/* Holds the name of uploaded database file */
$dbFileName = $_FILES["file"]["name"];

/* Database file name is splited into its components, i.e. file name and
 * extension and stored in array */
$dbNameComponents = explode(".", $dbFileName);

/* Copying the name of file into variable */
$dbFilePreffix = $dbNameComponents[0];

/* Path of directory where uploaded file get stored */
$uploadPath = "upload/";

/* Path of directory where OBJ files stored */
$objPath = "obj/";

/* Command that lists the entities of a BRL-CAD database file is copied into 
 * a variable */
$cmd = "env /usr/brlcad/dev-7.24.1/bin/mged -c $uploadPath$dbFileName ls -a 2>&1";

//$cmd = "./entity_list $uploadPath$dbFileName";

/* Output of command is stored into variable as string */
$out = shell_exec($cmd);

/* Spliting the stirng and storing names of entities into array */
$list = explode(" ", $out);

/* Counting total number of entities */
$totalEntities = count($list) - 2;

/* Number of entities to be displayed directly after upload */

if ($totalEntities < 5) {
	$n = $totalEntities;
} else {
	$n = 5;
}

/* Display list of entities on browser */
function displayList($dbFileName, $uploadPath, $totalEntities, $list)
{
    echo "total entities in $dbFileName: $totalEntities</br>";
    for ($i = 0; $i < $totalEntities + 1; $i++) {
        if($list[$i] == "_GLOBAL") {
            $i = $i + 1;
            $totalEntties = $totalEntities + 1;
            echo "$i ". $list[$i]. "<br>";
        } else {
            echo "$i ". $list[$i]. "<br>";
        }
    }
}

/* Create OBJ files  */
function createOBJ($dbFileName, $dbFilePreffix, $entity, $uploadPath, $objPath)
{
    $gobj = "/usr/brlcad/dev-7.24.1/bin/g-obj -n 10 -o $objPath$dbFilePreffix\_$entity.obj $uploadPath$dbFileName $entity";
    if(!shell_exec($gobj)) {
        echo "$gobj: error!!!<br>";
    } else {
//        echo "$gobj: Success<br>";
    }
}

/* If file already exits, upload fails and models of entities of pre existing
 * file are displayed */
if ($uploadComplete == '2') {
//	displayList($dbFileName, $uploadPath, $totalEntities, $list);

    for ($i = 0; $i < $n; $i++) {
        if($list[$i] == "_GLOBAL") {
            $i = $i + 1;
            $n = $n + 1;
	    $objN = $objPath.$dbFilePreffix."_".$list[$i].".obj";
	    $redirectionData = $redirectionData."|".$objN;
	} else {
	    $objN = $objPath.$dbFilePreffix."_".$list[$i].".obj";    
	    $redirectionData = $redirectionData."|".$objN;
	}
    }
       header('Location: model_display.php?obj='.$redirectionData);
    

} else if ($uploadComplete == '1') {
//    displayList($dbFileName, $uploadPath, $totalEntities, $list); 
    for ($i = 0; $i < $n; $i++) {
        if($list[$i] == "_GLOBAL") {
            $i = $i + 1;
            $n = $n + 1;
            createOBJ($dbFileName, $dbFilePreffix, $list[$i], $uploadPath, $objPath);
	    $objN = $objPath.$dbFilePreffix."_".$list[$i].".obj";
	    $redirectionData = $redirectionData."|".$objN;
	} else {
            createOBJ($dbFileName, $dbFilePreffix, $list[$i], $uploadPath, $objPath);
	    $objN = $objPath.$dbFilePreffix."_".$list[$i].".obj";    
	    $redirectionData = $redirectionData."|".$objN;
	}
    }
//    $objN = $objPath.$dbFilePreffix."_".$list[3].".obj";
    header('Location: model_display.php?obj='.$redirectionData);
}
?>
