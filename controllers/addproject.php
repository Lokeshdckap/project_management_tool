<?php

$conn['db'] = (new DB())->db;



try{
    if(isset($_POST['project_name'])) {



        $name = $_POST['project_name'];
        $type = $_POST['project'];


        $ins = $conn['db']->query("INSERT INTO projects(project_name)VALUES('$name')");


        $selected_id = ($conn['db'])->prepare("SELECT id from projects ORDER BY id desc limit 1");
        $selected_id->execute();
        $data = $selected_id->fetchAll();
        $id = $data[0]['id'];

        $uploadFolder = 'images/';
        foreach ($_FILES['files']['tmp_name'] as $key => $image) {
        $imageTmpName = $_FILES['files']['tmp_name'][$key];
        $imageName = $_FILES['files']['name'][$key];
        $result = move_uploaded_file($imageTmpName,$uploadFolder.$imageName);

        $query = $conn['db']->query("INSERT INTO images(image_path,model_id,model_name)VALUES('$uploadFolder$imageName','$id','$type')");
    }

    }
}
catch(PDOException $e){
    die($e->getMessage());
}

try{

    $statement = ($conn['db'])->query("select * from projects");
    $data=$statement->fetchAll(PDO::FETCH_OBJ);

    return $data;
}
catch(PDOException $e){
    die("connection problem");
}
// require 'views/home.view.php';