<?php

// Это главная страница to do list(а)

// Подключаю БД чтобы всё работало
require_once 'Database.php';

$task  = new Database('MySQL-8.2', 'root', '', 'users_to_do_list');

// Вызываю метод, который показывает задачки
// Приравниваю к новой переменной, чтобы потом показать все задачи
$tasks = $task->getTasks();

// Тут работает скрипт изменения задачи
if(!empty($_GET['title']) && !empty($_GET['content'])){
    $a = $_GET['id'];
    $b = $_GET['title'];
    $c = $_GET['content'];
    $task->updateTask($a, $b, $c);
    header('Location: index.php');
}
?>

<!-- HTML разметка -->
<title>To do list</title>
<div class="box">
    <!-- Форма для отправки данных на скрипт -->
    <form action="index_page_scripts/add.php" method="POST">
        <h1 class="h1">To do list</h1>
        <div class="inside_box">
            <div class="title">Title: <input type="text" name="title"></div><br>
            <div class="descr">Description: <input type="text" name="content"></div><br>
            <div><input class="add" type="submit" value="Add"></div>
            <link rel="stylesheet" href="styles/style.css">
        </div>
        </form>
    <div class="tasks">

        <!-- Перебор для показа задачек-->
        <?php foreach($tasks as $item): ?>
            <div class="tasks-item">
                <!-- Условие для добавления приоритета в задачку -->
            <? if($item['priority'] == 'high'): ?>
                <img src="pics/red_dot.png" alt="Высокий приоритет" style="width: 16px;">
            <? elseif($item['priority'] == 'medium'): ?>
                <img src="pics/yellow_dot.png" alt="Средний приоритет" style="width: 16px;">
            <? elseif($item['priority'] == 'low'): ?>
                <img src="pics/green_dot.png" alt="Низкий приоритет" style="width: 16px;">
            <? else: ?>
                <img src="pics/grey_dot.jpg" alt="Нейтральный приоритет" style="width: 16px;">
            <? endif; ?>

                <!-- Форма, для того чтобы добавить приоритет задачки в БД. Отправляется в скрипт для обработки -->
                <form action="index_page_scripts/favourite.php" method="POST">
                    <!-- Отправляется вместе с URL id задачки -->
                    <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                    <!-- Таким же способом отправляется значение избранной задачи(по умолчанию она 0) -->
                    <input type="hidden" name="favourite" value="<?php echo $item['favourite']; ?>">
                    <button type="submit" class="fav_button" name="button" value="<?php echo $item['id']; ?>">
                        <!-- Условие для добавления задачки в избранное -->
                    <? if($item['favourite'] == true): ?>
                        <img src="pics/star.png" class="star" style="height: 1rem;">
                    <? else: ?>
                        <img src="pics/empty_star.png" style="height: 1rem;"> 
                    <? endif; ?>    
                    </button>
                </form>
                
                <!-- Показ задачек -->
                <?=$item['title']; ?> - <?=$item['content'];?>
                <!-- Ссылка для добавления изменений в задачке. Отправляется на другой скрипт вместе с данными -->
                <a href="index_page_scripts/edit.php?id=<? echo $item['id'];?>&title=<?=$item['title'];?>&content=<?=$item['content'];?>" class="edit">
                <img src="pics/edit.png" style="height: 1rem;">
                </a>
                
                <!-- Форма для удаления задачи -->
                <form action="index_page_scripts/delete.php" method="POST">
                    <!-- POST методом отправляется id задачи для её удаления -->
                    <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                    <button type="submit" class="delete_button" name="delete_button">X</button>
                </form>

                <!-- Форма для добавления приоритета в задачу -->
                <form action="index_page_scripts/priority.php" method="POST">
                    <select name="priority" class="priority">
                        <option value="">-- Choose a priority of task --</option>
                        <option value="high">High</option>
                        <option value="medium">Middle</option>
                        <option value="low">Low</option>
                    </select>
                    <input type="hidden" name="prior_id" value="<?php echo $item['id']; ?>">
                    <button type="submit" class="choose_button">Choose</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="sign_in_up">
    <h3>Do you want your tasks to be saved?</h3>
    <h4>Then you need to <a href="user_page_scripts/sign_up.php">sign up</a></h4>
    <h4>I already have an <a href="user_page_scripts/sign_in.php">account</a></h4>
</div>