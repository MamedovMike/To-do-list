<?php

class Database{

    // Общая БД для всего

    public $conn_obj;
    public $sql;

    // Метод для подключения к БД
    public function __construct($host, $user, $password, $db_name){
        $this->conn_obj = new \mysqli($host, $user, $password, $db_name);
        
        if($this->conn_obj->connect_errno){
            die('Ошибка подключения: ' . $this->conn_obj->connect_error);
        } 
    }

    //--------------------------------------------------------------------------------------------------

        // Методы ниже относятся к главной странице

    // Метод для добавления задачи в БД
    public function insertTask($task_title, $task_content){
        $sql = "INSERT INTO tasks (title, content) VALUES('$task_title', '$task_content')";
        $this->conn_obj->query($sql);
    }

    // Метод для добавления избранных задачек
    public function addFavouriteTask($task_id, $task_isFavor = true){
        $sql = "UPDATE tasks SET favourite = '$task_isFavor' WHERE id = '$task_id'";
        $this->conn_obj->query($sql);
    }

    // Метод для добавления изменений в БД
    public function updateTask($task_id, $task_title, $task_content){
        $sql = "UPDATE tasks SET title = '$task_title', content = '$task_content' WHERE id = " . $task_id;
        $this->conn_obj->query($sql);
    }

    // Метод для добавления приоритета в задачку
    public function addTaskPriority($task_id, $task_priority){
        $sql = "UPDATE tasks SET priority = '$task_priority' WHERE id = '$task_id'";
        $this->conn_obj->query($sql);
    }

    // Метод для удаления задачки
    public function deleteTask($task_id){
        $sql = "DELETE FROM tasks WHERE id = " . $task_id;
        $this->conn_obj->query($sql);
    }

    // Метод для показа всех задачек. user_id - null, так как мы берем общие задачки
    public function getTasks(){
        $sql = "SELECT * FROM tasks WHERE user_id IS NULL";
        $raw = $this->conn_obj->query($sql);
        $result = [];

        while ($row = $raw->fetch_assoc()) {

            $result[] = $row;
        }

        return $result;
    } 

    // Метод для показа избранных задачек
    public function getFavouriteTasks(){
        $sql = "SELECT * FROM tasks WHERE favourite = 1";
        $raw = $this->conn_obj->query($sql);
        $result = [];

    while ($row = $raw->fetch_assoc()) {
        $result[] = $row;
    }

    return $result;
    }

    // Метод для показа приоритета задачек
    public function getPriorityTasks($task_priority){
        $sql = "SELECT * FROM tasks WHERE priority = '$task_priority'";
        $raw = $this->conn_obj->query($sql);
        $result = [];

    while ($row = $raw->fetch_assoc()) {
        $result[] = $row;
    }

    return $result;
    }

    //---------------------------------------------------------------------------------------

    // Методы ниже относятся к пользователям. Нет впринципе никаких отличий от методов выше


    public function insertUserTask($user_title, $user_content, $user_id){
        $sql = "INSERT INTO tasks (title, content, user_id) VALUES('$user_title', '$user_content', '$user_id')";
        $this->conn_obj->query($sql);
    }

    public function addUserFavouriteTask($task_id, $user_isFavor = true){
        $sql = "UPDATE tasks SET favourite = '$user_isFavor' WHERE id = '$task_id'";
        $this->conn_obj->query($sql);
    }

    public function updateUserTask($task_id, $user_title, $user_content){
        $sql = "UPDATE tasks SET title = '$user_title', content = '$user_content' WHERE id = " . $task_id;
        $this->conn_obj->query($sql);
    }

    public function addUserTaskPriority($task_id, $task_priority){
        $sql = "UPDATE tasks SET priority = '$task_priority' WHERE id = '$task_id'";
        $this->conn_obj->query($sql);
    }

    public function deleteUserTask($task_id){
        $sql = "DELETE FROM tasks WHERE id = " . $task_id;
        $this->conn_obj->query($sql);
    }

    public function getUserTasks($user_id){
        $sql = "SELECT * FROM tasks WHERE user_id = '$user_id'";
        $raw = $this->conn_obj->query($sql);
        $result = [];

        while ($row = $raw->fetch_assoc()) {

            $result[] = $row;
        }

        return $result;
    } 

    public function getFavouriteUserTasks(){
        $sql = "SELECT * FROM tasks WHERE favourite = 1";
        $raw = $this->conn_obj->query($sql);
        $result = [];

    while ($row = $raw->fetch_assoc()) {
        $result[] = $row;
    }

    return $result;
    }

    public function getUserPriorityTasks($task_priority){
        $sql = "SELECT * FROM tasks WHERE priority = '$task_priority'";
        $raw = $this->conn_obj->query($sql);
        $result = [];

    while ($row = $raw->fetch_assoc()) {
        $result[] = $row;
    }

    return $result;
    }

    //------------------------------------------------------------------------------------------------------

    // Методы ниже нужны для авторизации и регистрации пользователей

    // Метод для добавления пользователей в БД(регистрация)
    public function addUser($email, $username, $password){
        $sql = "INSERT INTO users (user_name, email, password) VALUES('$username', '$email', '$password')";
        $this->conn_obj->query($sql);
        $user_id = $this->conn_obj->insert_id;
        session_start();
        $_SESSION['user_id'] = $user_id;
    }

    // Метод для показа имени пользователя. Сделан для красоты
    public function getUserName(){
        session_start();
        $user_id = $_SESSION['user_id']; 
        $sql = "SELECT user_name FROM users WHERE id = '$user_id'";
        $raw = $this->conn_obj->query($sql);

    if($row = $raw->fetch_assoc()) {
        return $row['user_name'];
    }

    return null;
    }

    // Метод для авторизации
    public function sign_in($email){
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $this->conn_obj->query($sql);
        
        return $result->fetch_assoc();
    }

}
?>