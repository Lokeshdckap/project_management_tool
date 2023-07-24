<?php

$conn['db'] = (new DB())->db;



try{
    if(isset($_POST['action'])) {

        $id = $_POST['action'];
        // var_dump($id);
        $task_name = $_POST['task_name'];

        $description = $_POST['description'];

        $status = $_POST['start'];

        $assigned_name = $_POST['assigned_name'];
       
        $type = $_POST['task'];
     $ins = $conn['db']->query("INSERT INTO tasks(task_name,descripition,project_id,is_status,assigned)VALUES('$task_name',' $description','$id','$status','$assigned_name')");
     
     $selected_id = ($conn['db'])->prepare("SELECT id from tasks ORDER BY id desc limit 1");
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
}catch(PDOException $e){
    die("connection problem");
}

