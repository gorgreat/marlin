<?php 
session_start();
if(isset($_POST['submit'])) {
    $_SESSION['success'] = '<div class="alert alert-success" role="alert"> Комментарий успешно добавлен </div>';
}

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

header('Location: /index.php');
