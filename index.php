<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    session_start();
    
    //подключение к бд и выполнение запроса на получение массива комментариев из таблицы
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=marlin_db;charset=utf8','root','');    
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //безопасный режим
        $id = 0;
        $sql = "SELECT * FROM comments ORDER BY `id` DESC";
        $result = $pdo->prepare($sql);

        $result->execute([$id]);
        $comments_arr = $result->fetchAll();
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
    // $comments = [
    //     [
    //         "username" => "John Doe",
    //         "id" => "01",
    //         "avatar" => "img/no-user.jpg",
    //         "date" => "12/10/2025",
    //         "text" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe aspernatur, ullam doloremque deleniti, sequi obcaecati."
    //     ],
    //     [
    //         "username" => "Vasya",
    //         "id" => "02",            
    //         "avatar" => "img/no-user.jpg",
    //         "date" => "12/10/2042",
    //         "text" => "Вася оставил коммент тест такой то "
    //     ], 
    //     [
    //         "username" => "Alex",
    //         "id" => "03",            
    //         "avatar" => "img/no-user.jpg",
    //         "date" => "12/06/2020",
    //         "text" => "Далеко-далеко за словесными, горами в стране гласных и согласных живут рыбные тексты. Подпоясал жизни решила алфавит предупредила сбить своего города пояс страна вопрос всеми моей, реторический возвращайся языком что страну скатился имеет. "
    //     ]               
    // ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Comments</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="css/app.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    Project
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                            <li class="nav-item">
                                <a class="nav-link" href="login.html">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="register.php">Register</a>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header"><h3>Комментарии</h3></div>

                            <div class="card-body">
                              <!-- <div class="alert alert-success" role="alert">
                                Комментарий успешно добавлен
                              </div> -->
                                <?php 
                                    if (!empty($_SESSION['success'])) {
                                        echo $_SESSION['success'];                                        
                                        unset($_SESSION['success']);
                                    } 
                                ?>    
                            <!-- Выводим  содержимое массива циклом -->                            
                                 <?php 
                                 foreach ($comments_arr as $comment): ?>        
                                <div class="media">                                                                    
                                  <img src="img/<?php echo $comment["avatar"]?>" class="mr-3" alt="<?php echo $comment["name"]?>" width="64" height="64">
                                  <div class="media-body">
                                    <h5 class="mt-0"><?php echo $comment["name"]?></h5> 
                                    <span><small> <?php echo date("d/m/y", strtotime($comment["date"])); ?>
                                    </small></span>
                                    <p> <?php echo $comment["text"]?></p>                                 
                                  </div>                                  
                                </div>
                                <?php endforeach;?>   
                                  
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-12" style="margin-top: 20px;">
                        <div class="card">
                            <div class="card-header"><h3>Оставить комментарий</h3></div>

                            <div class="card-body">
                                <form action="forms/addcomment.php" method="POST">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Имя</label>
                                        <input name="name" class="form-control" id="exampleFormControlTextarea1" />
                                    </div>
                                  <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Сообщение</label>
                                    <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                  </div>
                                  <button type="submit" class="btn btn-success" name="submit">Отправить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
