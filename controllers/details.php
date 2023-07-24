<?php
 

    $conn['db'] = (new DB())->db;

        try{
            $id = $_POST['edit'];
            
//    var_dump($id);
            $statement = $conn['db']->query("SELECT * FROM tasks where id = $id");
             $singleDatum = $statement->fetchAll();
             $images = $conn['db']->query("SELECT * from images where model_id = '$id' and model_name = 'task'");
             $image = $images->fetchAll();
            require "views/details.view.php";
        }
        catch(Expection $e)
        {
        die($e->getMessage());
        }
