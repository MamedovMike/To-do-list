<?php

// Тот же самый принцип работы, как на главной странице, только с некоторыми отличиями для пользователей

require 'Database.php';
session_start();

$user_id = $_SESSION['user_id'];
$task  = new Database('MySQL-8.2', 'root', '', 'users_to_do_list');
$tasks = $task->getUserTasks($user_id);


$userName = $task->getUserName();

if(!empty($_GET['title']) && !empty($_GET['content'])){
    $a = $_GET['id'];
    $b = $_GET['title'];
    $c = $_GET['content'];
    $task->updateUserTask($a, $b, $c);
    header('Location: own_user_tasks.php');
}
?>

<h3>Welcome<?if($userName):?> <?=$userName?> <?endif;?>!</h3>

<title>To do list</title>
<div class="box">
    <form action="user_page_scripts/user_add.php" method="POST">
        <h1 class="h1">To do list</h1>
        <div class="inside_box">
            <div>Title: <input type="text" name="title"></div><br>
            <div>Description: <input type="text" name="content"></div><br>
            <div><input class="add" type="submit" value="Add"></div>
            <link rel="stylesheet" href="styles/style.css">
        </div>
        </form>
    <div class="tasks">
        <?php foreach($tasks as $item): ?>
            <div class="tasks-item">
            <? if($item['priority'] == 'high'): ?>
                <img src="pics/red_dot.png" alt="Высокий приоритет" style="width: 16px;">
            <? elseif($item['priority'] == 'medium'): ?>
                <img src="pics/yellow_dot.png" alt="Средний приоритет" style="width: 16px;">
            <? elseif($item['priority'] == 'low'): ?>
                <img src="pics/green_dot.png" alt="Низкий приоритет" style="width: 16px;">
            <? else: ?>
                <img src="pics/grey_dot.jpg" alt="Нейтральный приоритет" style="width: 16px;">
            <? endif; ?>
                <form action="user_page_scripts/user_favourite.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                    <input type="hidden" name="favourite" value="<?php echo $item['favourite']; ?>">
                    <button type="submit" class="fav_button" name="button" value="<?php echo $item['id']; ?>">
                    <? if($item['favourite'] == true): ?>
                        <img src="pics/star.png" class="star" style="height: 1rem;">
                    <? else: ?>
                        <img src="pics/empty_star.png" style="height: 1rem;"> 
                    <? endif; ?>    
                    </button>
                </form>
                
                <?=$item['title']; ?> - <?=$item['content'];?>
                <a href="user_page_scripts/user_edit.php?id=<? echo $item['id'];?>&title=<?=$item['title'];?>&content=<?=$item['content'];?>" class="edit">
                <img src="pics/edit.png" style="height: 1rem;">
                </a>
                
                <form action="user_page_scripts/user_delete.php" method="POST" class="">
                    <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                    <button type="submit" class="delete_button" name="delete_button">X</button>
                </form>

                <form action="user_page_scripts/user_priority.php" method="POST">
                    <select name="priority">
                        <option value="">-- Choose a priority of task --</option>
                        <option value="high">High</option>
                        <option value="medium">Middle</option>
                        <option value="low">Low</option>
                    </select>
                    <input type="hidden" name="prior_id" value="<?php echo $item['id']; ?>">
                    <button type="submit">Choose</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<a href="index.php"> На главную страницу</a>