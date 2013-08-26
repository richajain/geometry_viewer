<?php
    include 'variables.php';

    /** 
     * D I S P L A Y _ L I S T
     *
     * Display list of entities on browser 
     */
    function display_list($dbFileName, $uploadPath, $totalEntities, $list)
    {
        echo "total entities in $dbFileName: $totalEntities</br>";
        for ($i = 0; $i < $totalEntities + 1; $i++) {
            if ($list[$i] == "_GLOBAL") {
            $i = $i + 1;
            $totalEntties = $totalEntities + 1;
            echo "$i ". $list[$i]. "<br>";
            } else {
                echo "$i ". $list[$i]. "<br>";
            }
        }
    }  

    /**
     * C R E A T E _ O B J
     * 
     * Create OBJ files  
     */
    function create_obj($dbFileName, $dbFilePreffix, $entity, $uploadPath, $objPath)
    {
    $gobj = "/usr/brlcad/dev-7.24.1/bin/g-obj -n 10 -o $objPath$dbFilePreffix\_$entity.obj $uploadPath$dbFileName $entity";
        if (!shell_exec($gobj)) {
            echo "$gobj: error!!!<br>";
        } else {
        /**  echo "$gobj: Success<br>"; */
        }
    }
?>
