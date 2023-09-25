<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Szukaj | Szama</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&amp;display=swap" rel="stylesheet">

    <?php include'config.php' ?>
    <link rel="stylesheet" href="css/search.css">
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
                        <a href="index.html">Strona głowna /</a>
                    </span>
                </header>

                <br>
                <hr><br>

                <section>

                    <div class="row">
                        <?php

                            $sql = "SELECT * FROM categories";
                            $res = mysqli_query($conn, $sql);

                            while($categories = mysqli_fetch_assoc($res)){
                                echo "
                                    <a href='index.php?filter_id=$categories[id]' class='col-12 col-md-6 col-lg-6' style='background-image: url(foto/$categories[image_path]);'>
                                        $categories[name]
                                    </a>
                                ";
                                                       
                            }

                        ?>
                </section>
            </main>
        </section>

    </main>
    
    <?php include'footer.php'; ?>
</body>
</html>