<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php include'config.php' ?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/aside.css">
    <link rel="stylesheet" href="css/add.css">
</head>
<body>
    <main class="app">
        <?php 
            include'header.php';

            if(!isset($_SESSION['login_status'])){
                header("Location: login.php");
            }
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

                <h3>Dodaj swój własny przepis.</h3>
                <span>Podziel się z naszym społeczeństwem swoim pysznym przepisem. Niech wszyscy to zobaczą. 😋😮</span>
                
                <br><br><br>

                <form action="backend-files/addRecipe.php" method="POST" enctype="multipart/form-data" id="form">
                    <div class="top">
                        <div class="file-input-container">
                            <label for="file-input" class="file-input-label">
                                <input type="file" name="picture" id="file-input" class="file-input" accept=".jpg, .jpeg, .png" onchange="updateFileName(this)">
                                <span id="file-name">Dodaj zdjęcie</span>
                            </label>
                        </div>
                        <div class="title">
                            <label for="title-input" class="title-input">
                                <input type="text" name='title' placeholder="Tytuł">
                            </label>
                        </div>
                    </div>

                    <br>
        
                    <div class="mid">
                        <div class="ingredients" id="ingredients">
                            <h2><b>Składniki:</b></h2>
                            <!-- input -->
                            <label for="skladnik1">
                                <input type="text" name="skladnik1" id="skladnik1" placeholder="Składnik 1" required>
                                <i class="bi bi-trash"></i>
                            </label>
        
                            <label for="skladnik2">
                                <input type="text" name="skladnik2" id="skladnik2" placeholder="Składnik 2" required>
                                <i class="bi bi-trash"></i>
                            </label>
        
                            <label for="skladnik3">
                                <input type="text" name="skladnik3" id="skladnik3" placeholder="Składnik 3" required>
                                <i class="bi bi-trash"></i>
                            </label>
                        </div>
                        <div class="button" onclick="add_input('ingredients' , 'Składnik', 'skladnik'), get_trash_icons()"> + </div>
        
                        <br><br>
        
                        <div class="preparation" id="preparation">
                            <h2><b>Przygotowanie:</b></h2>
                            
                            <label for="krok1">
                                <input type="text" name="krok1" id="krok1" placeholder="Krok 1" required>
                                <i class="bi bi-trash"></i>
                            </label>
        
                            <label for="krok2">
                                <input type="text" name="krok2" id="krok2" placeholder="Krok 2" required>
                                <i class="bi bi-trash"></i>
                            </label>
        
                            <label for="krok3">
                                <input type="text" name="krok3" id="krok3" placeholder="Krok 3" required>
                                <i class="bi bi-trash"></i>
                            </label>
                        </div>
        
                        <div class="button" onclick="add_input('preparation' , 'Krok' , 'krok'), get_trash_icons()"> + </div>
                    </div>
        
                    <br><br>

                    <h2><b>Kategoria: </b></h2>
                    <input class="cate" list="categories" name="categorie" />
                    <datalist id="categories">

                        <?php 
                        
                            $sql = "SELECT * FROM categories";
                            $res = mysqli_query($conn, $sql);

                            while($cate = mysqli_fetch_assoc($res)){
                                echo "<option value='$cate[id]'> $cate[name] </option>";
                            }
                        
                        ?>

                    </datalist>

                    <br><br>
        
                    <h2><b>Opis:</b></h2>
                    <textarea name="opis" id="" cols="50" rows="10"></textarea>
        
                    <input type="submit" id="submit" value="Udostępnij">
                    <br><br><br>
                </form>
            </main>
        </section>
    </main>

    <script src="src/add-recipe-buttons.js"></script>
    <script src="src/aside.js"></script>
</body>
</html>