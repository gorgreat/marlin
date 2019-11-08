<?php 
session_start();

if ( (isset($_POST['name']) AND !empty($_POST['name'])) AND ( isset($_POST['email']) AND !empty($_POST['email']) )  AND ( isset($_POST['password']) AND !empty($_POST['password']) )  ) {
    $datauser = [
        'name' => strip_tags($_POST['name']),
        'email' => strip_tags($_POST['email']),
        // 'password' => strip_tags($_POST['password'])
        'password' => password_hash(strip_tags($_POST['password']), PASSWORD_BCRYPT)
    ];  
    $pdo = new PDO('mysql:host=localhost;dbname=marlin_db;charset=utf8','root','');    
    $sql = "INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES (NULL, :name, :email, :password)" ;
    $result = $pdo->prepare($sql);
    $result->execute($datauser);        
    $_SESSION['register'] = '<div class="alert alert-success" role="alert"> Вы успешно зарегистрировались </div>';
} else {
    $_SESSION['register'] = '<div class="alert alert-danger" role="alert"> Ошибка </div>';       
};
   header('Location: /register.php');   
?>
