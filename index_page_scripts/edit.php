<?php

// Скрипт для изменения задачи

require '../Database.php';
$id = $_GET['id'];
$title = $_GET['title'];
$content = $_GET['content'];
?>

<div class="box">
    <!-- Форма для отправления изменений на главную страницу. Команда для изменения написана в самом начале index.php -->
    <form action="../index.php" method="GET">
        <h1 class="h1">To do list edit</h1>
        <div class="inside_box">
            <div>ID: <input type="text" value=<?echo $id;?> disabled style="border: none; background-color: white; color: #000000;"></div><br>
            <div>Title: <input type="text" name="title" value="<? echo $title;?>"></div><br>
            <div>Description: <input type="text" name="content" value="<? echo $content;?>"></div><br>
            <div><input class="add" type="submit" value="Edit"></div>
            <input type="hidden" value="<?php echo $id;?>" name="id">
            <link rel="stylesheet" href="../styles/style.css">
        </div>
        </form>
</div>
