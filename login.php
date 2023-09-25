<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zaloguj się | Przepisy</title>

    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <?php session_start(); ?>

    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="app">
        <main>
            <div class="left">
                <h1>Witaj w "przepisy.pl"</h1>
                <i>Zaloguj się lub załóż konto, aby uzyskać dostęp do swojego konta aby odkryć lub dodać pyszne przepisy.</i>
            </div>
            <div class="right">
                <form action="backend-files/loginScript.php" method="GET">
                    <?php

                        if(isset($_GET['error'])){
                            echo '<h1 style="color: red;">Błąd logowania!</h1>';
                        }else{
                            echo '<h1>Zaloguj się</h1>';
                        }

                    ?>
                    <hr><br>
                    <label for="">
                        <span><i class="bi bi-people-fill"></i> Login:</span>
                        <input type="text" name="login" id="">
                    </label>

                    <label for="">
                        <span><i class="bi bi-key-fill"></i> Hasło:</span>
                        <input type="password" name="password" id="">
                    </label>
                    
                    <label for="" class="submit">
                        <input type="submit" value="Zaloguj się">
                    </label>
                    
                    <label for="">
                        <a href="register.php"> <i class="bi bi-link-45deg"></i> Nie masz konta? Załóż je już teraz.</a>
                    </label>
                </form>
            </div>
        </main>
    </div>
</body>
</html>