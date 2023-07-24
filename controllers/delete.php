<?php
$conn['db'] = (new DB())->db;

// if(isset($_POST['Delete'])){
    $id = $_POST['Delete'];

    var_dump($id);
    try{

        $statement = $conn['db']->query("UPDATE tasks SET deleted_at = now() WHERE id = $id");
        $statement->execute();
        header('Location: /');
    }

    catch(PDOException $e){
        die ("delete failed");
    }
// }