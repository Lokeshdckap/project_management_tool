<?php

   $conn['db'] = (new DB())->db;

try{
    $id= $_POST['projects'];

    $statement = $conn['db']->query("SELECT * FROM tasks where deleted_at IS NULL and project_id = $id");
    $singleData = $statement->fetchAll();
    $counts = count($singleData);

    $_SESSION['id'] = $id;

    $deleted = $conn['db']->query("SELECT * FROM tasks where deleted_at IS NOT NULL and project_id = $id");
    $datass = $deleted->fetchAll();
    $count = count($datass);

    $images = $conn['db']->query("SELECT * from images where model_id = '$id' and  model_name = 'project'");
    $allImg = $images->fetchAll();
    // var_dump($allImg);
    require "views/home.view.php";

}
catch(Expection $e)
{
    die($e->getMessage());
}

