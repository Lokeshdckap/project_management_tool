<?php
   $id = $_POST['project'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project_Management</title>
    <link rel="stylesheet" href="views/style.css">
    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
        <div class="main">
        <form action="/taskStore" method="POST"  enctype="multipart/form-data">
        <input type="hidden" name="action" value="<?php echo $_POST['project'];?>">
    <div>
        <label>TaskName:</label>
        <input type="text" name="task_name" placeholder="Enter the task name">
    </div>
    <div>
        <label>Description:</label>
        <input type="text" name="description" placeholder="Enter the description ">
    </div>
    <div>
            <select class="form-select" name="start">
            <option value="">Open this select menu</option>
            <option value="not-start">not-start</option>
            <option value="completed">completed</option>
            <option value="progress">progress</option>
            </select>
    </div>
    <div>
        <!-- <input type="text" name="is_deleted" placeholder="Enter the task name"> -->
    </div>
    <div>
    <input type="file" name="files[]" multiple>
    <input type="text" name="task" hidden value="task">
    </div>
    <div>
        <input type="text" name="assigned_name" placeholder="Enter the Assigned Name">
    </div>
    <div><button type="submit">Add Task</button></div>
</form>
        </div>
</body>
</html>