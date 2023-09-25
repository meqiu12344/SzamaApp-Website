<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="app">
        <main class="register">
            <div class="left">
                <h1>Załóż konto :)</h1>
                <i>Zarejestuj się w naszym serwisie po to, aby odkrywać oraz dzielić się przepisami na przepyszne dania lub przekąski.</i>
            </div>
            <div class="right">
                <form action="backend-files/addAccount.php" method="get">
                    <?php 
                    
                        if(isset($_GET['loginError'])){
                            echo '<h1 style="color:red;">Login jest zajęty!</h1>';
                        }else if(isset($_GET['usernameError'])){
                            echo '<h1 style="color:red;">Nazwa użytkownika jest zajęty!</h1>';
                        }else{
                            echo '<h1>Stworz konto</h1>';
                        }

                    ?>
                    <hr><br>

                    <label for="">
                        <span><i class="bi bi-person-badge"></i> Nazwa użytkownika:</span>
                        <input type="text" name="username" id="">
                    </label>

                    <label for="">
                        <span><i class="bi bi-door-open-fill"></i> Login:</span>
                        <input type="text" name="login" id="">
                    </label>

                    <label for="">
                        <span><i class="bi bi-key-fill"></i> Hasło:</span>
                        <input type="password" name="password" id="">
                    </label>
                    
                    <label for="" class="submit">
                        <input type="submit" value="Zarejestruj się">
                    </label>
                    
                    <label for="">
                        <a href="login.php"> <i class="bi bi-link-45deg"></i> Masz konto? Zaloguj się.</a>
                    </label>
                </form>
            </div>
        </main>
    </div>
</body>
</html>