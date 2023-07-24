<?php

require 'controllers/addproject.php';

// require 'controllers/list.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project_Management</title>
    <link rel="stylesheet" href="views/style.css">
    <style>
      .container{
        display: flex;
      }
      button{
        cursor: pointer;
        color : ;
      }
    </style>
    <script src="https://kit.fontawesome.com/f117ba3f27.js" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">
        <div class="addTask">
            <a href="/project"><button><b>Add Project</b></button></a>
        </div>
        <div class="sidebar">
     <?php foreach($data as $datas):?>
      <form action="/taskGet" method="POST">
       <ul>
        <button value="<?php echo $datas->id?>" name="projects" type="submit"><?php echo $datas->project_name ?></button>
       </ul>
     </form>

     <?php endforeach;?>
      </div>
      <form action="/taskForm" method="POST">
        <button  name="project" type="submit" value="<?php echo $_SESSION['id'];?>">Add Task</button>
     </form>
        <div class="task">
      <button  type="submit" name="undeleted" value="<?php echo $_SESSION['id'];?>">List Of Undeleted Task (<?php echo $counts?>)</button>
        <?php foreach($singleData as $datum):?>
        <form action="/decription" method="post">
        <div class="cards">
            <?php if($datum['deleted'] == NULL) : ?>
            <ul>
            <li><b>Task Name</b> : <?php echo $datum['task_name'];?></li>
            <li><b>Assigned Person</b> : <?php echo $datum['assigned'];?></li>
            </ul>
            <button type="submit" class="edit" name="edit" value="<?php echo $datum['id'];?>">View More</button>
            <?php endif; ?>

            </div>
        </form>
       <?php endforeach;?>
      <!-- <form action="/taskForm" method="POST"> -->
       <button  type="submit" name="deleted" value="<?php echo $_SESSION['id'];?>">List Of Deleted Task (<?php echo $count ?>)</button>
      <!-- </form> -->
       <?php foreach($datass as $datas):?>
        <form action="/decription" method="post">
        <div class="cards">
            <ul>
            <li><b>Task Name</b> : <?php echo $datas['task_name'];?></li>
            <li><b>Assigned Person</b> : <?php echo $datas['assigned'];?></li>
            <button type="submit" class="edit" name="edit" value="<?php echo $datas['id'];?>">Click to view and Restore</button>
           </ul>
       <?php endforeach;?>
       <h3>Project Images</h3>
       <?php foreach($allImg as $img):?>
        <img src="<?php echo $img['image_path']?>" width="100px" hieght="100px">
       <?php endforeach;?>
     </div>
     </div>
     Hello, <?php echo $_SESSION['login']['email']; ?>

     <a href="/logout" class="text-red-500">Logout</a>

</body> 
</html>
