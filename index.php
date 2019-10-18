<?php 
    $comments = [
        [
            "username" => "John Doe",
            "id" => "01",
            "avatar" => "img/no-user.jpg",
            "date" => "12/10/2025",
            "text" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe aspernatur, ullam doloremque deleniti, sequi obcaecati."
        ],
        [
            "username" => "Vasya",
            "id" => "02",            
            "avatar" => "img/no-user.jpg",
            "date" => "12/10/2042",
            "text" => "Вася оставил коммент тест такой то "
        ], 
        [
            "username" => "Alex",
            "id" => "03",            
            "avatar" => "img/no-user.jpg",
            "date" => "12/06/2020",
            "text" => "Далеко-далеко за словесными, горами в стране гласных и согласных живут рыбные тексты. Подпоясал жизни решила алфавит предупредила сбить своего города пояс страна вопрос всеми моей, реторический возвращайся языком что страну скатился имеет. "
        ]               
    ];
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
                <a class="navbar-brand" href="index.html">
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
                                <a class="nav-link" href="register.html">Register</a>
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
                              <div class="alert alert-success" role="alert">
                                Комментарий успешно добавлен
                              </div>
                              
                            <!-- Выводим  содержимое массива циклом -->
                                 <?php foreach ($comments as $key => $value): ?>        
                                <div class="media">                                                                    
                                  <img src="<?php echo $comments[$key]["avatar"]?>" class="mr-3" alt="<?php echo $comments[$key]["username"]?>" width="64" height="64">
                                  <div class="media-body">
                                    <h5 class="mt-0"><?php echo $comments[$key]["username"]?></h5> 
                                    <span><small><?php echo $comments[$key]["date"]?></small></span>
                                    <p> <?php echo $comments[$key]["text"]?></p>                                 
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
                                <form action="/store" method="post">
                                    <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Имя</label>
                                    <input name="name" class="form-control" id="exampleFormControlTextarea1" />
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Сообщение</label>
                                    <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                  </div>
                                  <button type="submit" class="btn btn-success">Отправить</button>
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