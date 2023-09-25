<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Strona główna | Szama
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&amp;display=swap" rel="stylesheet">

    <?php include'config.php'; ?>

    <link rel="stylesheet" href="css/aside.css">
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <main class="app">
        <?php 
            include'header.php';
        ?>

        <section>
            <main>
                <header class="page-header">
                    <span>
                        <b>Główna</b>
                    </span>
                </header>

                <br><hr><br>

                <section>
                    <div class="row">
                        <?php 
                        
                            if(isset($_GET['filter_id'])){
                                $sql = "SELECT * FROM `post` WHERE categories_id=".$_GET['filter_id'] ." and status = 0 ";
                            }else{
                                $sql = "SELECT * FROM post WHERE status = 0";
                            }

                            $res = mysqli_query($conn, $sql);

                            while($recipe = mysqli_fetch_assoc($res)){
                                echo '
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <a href="recipe.php?id='. $recipe['id'] .'">
                                            <div class="img">
                                                <img src="foto/'. $recipe['image_path'] .'" alt="">
                                            </div>
                                            <br>
                                            <div class="opis">
                                                <div class="title">
                                                    <h3>'. $recipe['title'] .'</h3>
                                                </div>
                                                <div class="data">
                                                    '. $recipe['date'] .'
                                                </div>
                                                <div class="opis">
                                                    <i>
                                                        '. $recipe['description'] .'
                                                    </i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                ';
                            }

                        ?>
                    </div>
                </section>
            </main>
        </section>
    </main>

    <script src="src/aside.js"></script>
</body>
</html>