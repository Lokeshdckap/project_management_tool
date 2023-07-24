<!DOCTYPE html>
<html lang="en">
<head>
    <title>Projects</title>
    <link href="views/style.css" rel="stylesheet">
</head>
<body>
    <div class="container">
   <form action="/update" method="POST">
        <?php foreach($singleDatum as $single):?>
         <div>
            <li>TaskName: <?php echo $single['task_name']?></li>
            <li>Name: <?php echo $single['assigned']?></li>
            <li>Description: <?php echo $single['descripition']?></li>
            <li>status: <?php echo $single['is_status']?></li>
            <button type="submit" name="Delete" value="<?php echo $single['id']?>">Delete</button>
         </div>
        <?php endforeach;?>
        <h1>Task Images</h1>
        <?php foreach($image as $images):?>
        <img src="<?php echo $images['image_path']?>" width="100px" hieght="100px">
        <?php endforeach;?>
        </form>
     </div>
</body>
</html>