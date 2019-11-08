<?php 
session_start();

if ( isset($_REQUEST['name']) AND !empty($_REQUEST['name']) AND isset($_REQUEST['text']) AND !empty($_REQUEST['text']) ) {
    $_SESSION['success'] = '<div class="alert alert-success" role="alert"> Комментарий успешно добавлен </div>';
    $data = [
        'name' => $_POST[name],
        'avatar' => 'no-user.jpg',
        'text' => $_POST[text],
        'date' => date("d/m/y")
    ];
    
    $pdo = new PDO('mysql:host=localhost;dbname=marlin_db;charset=utf8','root','');    
    $sql = "INSERT INTO `comments` (`id`, `name`, `avatar`, `date`, `text`) VALUES (NULL, :name, :avatar, :date, :text)" ;
    $result = $pdo->prepare($sql);
    $result->execute($data);
    
} else {
    $_SESSION['success'] = '<div class="alert alert-danger" role="alert"> Поля не заполнены </div>';
}

header('Location: /index.php');    



?>
