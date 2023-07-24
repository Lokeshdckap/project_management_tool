
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project_Management</title>
    <link rel="stylesheet" href="views/style.css">
</head>
<body>
<div>
       <form action="/store" method="POST" enctype="multipart/form-data">
        <label>Project NAME:</label>
        <input type="text" name="project_name" placeholder="Enter the project name">
        <input type="file" name="files[]" multiple>
        <input type="text" name="project" hidden value="project">
        <button type="submit">Add Project</button>
        </form>
    </div>
</body>
</html>
