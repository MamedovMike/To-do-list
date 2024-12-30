<?php
require_once 'Database.php';

$task  = new Database('MySQL-8.2', 'root', '', 'blog_db');
$tasks = $task->get();
?>
<title>To do list</title>
    <form action="add.php" method="POST">
        <h1>To do list</h1>
            Title: <input type="text" name="title"><br>
            Description: <input type="text" name="content"><br>
            <input class="" type="submit" value="Add">
            <link rel="stylesheet" href="style.css">
        </form>

<div class="task-list">
<?php foreach($tasks as $item): ?>
    <div class="task-item">
        <form action="favourite.php" method="POST" class="">
            <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
            <input type="hidden" name="favourite" value="<?php echo $item['favourite']; ?>">
            <button type="submit" class="" name="button" value="<?php echo $item['id']; ?>">
                <? if($item['favourite'] == true): ?>
                    <img src="star.png" class="star" style="height: 1rem;">
                <? else: ?>
                    <img src="empty_star.png" style="height: 1rem;"> 
                <? endif; ?>    
            </button>
        </form>

        <div class="task-content">
            <?php echo $item['id']; ?> : <?=$item['title']; ?> - <?=$item['content'];?><br>
        </div>
        <form action="delete.php" method="POST" class="">
            <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
            <button type="submit" class="btn btn-danger" name="delete_button">X</button>
        </form>
        </div>
<?php endforeach; ?>
</div>

