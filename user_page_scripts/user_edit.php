<?php
require '../Database.php';
$id = $_GET['id'];
$title = $_GET['title'];
$content = $_GET['content'];
$priority = $_GET['priority'];
?>
<head>
    <link rel="stylesheet" href="../styles/style.css">
    <title>Edit - To Do List</title>
</head>
<body class="edit_page">
    <h1 class="h1">To do list edit</h1>
<div class="box">
    <form action="../own_user_tasks.php" method="GET">
        <div class="inside_box">
            <div><input type="text" name="title" value="<? echo $title;?>" class="username"></div><br>
            <div><input type="text" name="content" value="<? echo $content;?>" class="username"></div><br>
            <select name="priority" class="username">
                <option value="">Choose a priority of task</option>
                <option value="high">High</option>
                <option value="medium">Middle</option>
                <option value="low">Low</option>
            </select>
            <div class="add_btn_edit"><input class="add" type="submit" value="Edit"></div>
            <input type="hidden" value="<?php echo $id;?>" name="id">
        </div>
    </form>
</div>
</body>