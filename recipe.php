<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Przepis na Miod wroścówki | Szama</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&amp;display=swap" rel="stylesheet">

    <?php include'config.php'; ?>

    <link rel="stylesheet" href="css/aside.css">
    <link rel="stylesheet" href="css/recipe.css">
</head>

<body>
    <main class="app">
        <?php 
            include'header.php';
        ?>

        <section class="main_section">
            <main>
                <header class="page-header">
                    <span>
                        <a href="index.php">Strona głowna /</a>
                    </span>
                </header>

                <br>
                <hr><br>

                <section>

                    <?php 
                    
                        $id = $_GET['id'];

                        $sql = "SELECT * FROM post INNER JOIN users ON user_id = users.id WHERE post.id = $id";
                        $res = mysqli_query($conn, $sql);

                        while($recipe = mysqli_fetch_assoc($res)){
                            echo '
                            
                                <div class="title">
                                    <h3>'. $recipe['title'] .'</h3>
                                    <span class="author"> <i class="bi bi-person-lines-fill"></i> <i>'. $recipe['username'] .'</i></span>
                                </div>
                                <div class="top">
                                    <div class="img">
                                        <img src="foto/'. $recipe['image_path'] .'" alt="">
                                    </div>
                                    <br>
                                    <div class="ingredients" style="margin-left: 15px;">
                                        <h4>Składniki:</h4>
                                        <br>
                                        <ul>';

                                            $all = explode('|' , $recipe['ingredients']);

                                            foreach($all as $x){
                                                echo"<li>" . $x . "</li>"; 
                                            }

                                        echo' </ul>
                                    </div>
                                </div>
                                <br>
                                <div class="bottom">
                                    <div class="preparation">
                                        <h4>Sposób przygotowania:</h4>
                                        <br>
                                        <ol type="1">';

                                            $all = explode('|' , $recipe['preparation']);

                                            foreach($all as $x){
                                                echo"<li>" . $x . "</li>"; 
                                            }

                                        echo'</ol>
                                    </div>
                                    <br>
                                    <div class="description">
                                        <h4> Opis: </h4>
                                        <br>
                                        '; echo $recipe['description']; echo'
                                        <br><br>
            
                                    </div>

                            ';
                        }

                    ?>

                        <hr>
                        <br>

                        <div class="comments" id="comments">
                            <?php 

                                if(isset($_SESSION['login_status'])){
                            ?>
                                <h4>Dodaj swój komentarz!</h4>
                                <br>
                                <form action="backend-files/addComment.php">
                                    <input type="hidden" name="post_id" value=<?php echo $id ?>>
                                    <textarea name="message" id="" cols="80" rows="5"></textarea>
                                    <input type="submit" value="Wyślij">
                                </form>
                            <?php }else{ ?>

                                <h4>Aby dodać komentarz zalguj się!</h4>
                                <br>
                                <a href="login.php" class="login-button">Zaloguj się</a>


                            <?php } ?>
                            <br><br><br>
                            <h4> Komentarze: </h4>
                                <?php 
                                
                                    $sql_comm = "SELECT * FROM comment INNER JOIN users ON user_id = users.id WHERE post_id = $id";
                                    $res_comm = mysqli_query($conn, $sql_comm);

                                    while($comment = mysqli_fetch_assoc($res_comm)){
                                        echo'
                                            <div class="comment">
                                                <div class="top">
                                                    <div class="author">
                                                        <i class="bi bi-person-circle"></i> '. $comment['username'] .'
                                                    </div>
                                                    <i class="date">
                                                        '. $comment['date'] .'
                                                    </i>
                                                </div>
                                                <br>
                                                <div class="message">
                                                    '. $comment['message'] .'
                                                </div>
                                            </div>
                                        ';
                                    }
                                
                                ?>
                            

                            <br><br><br>
                        </div>
                    </div>
                </section>
            </main>
        </section>
    </main>

    <script src="src/aside.js"></script>
</body>

</html>