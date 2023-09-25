<?php 

    include'../config.php';

    session_start();

    $FileName    = $_FILES['picture']['name'];
    $TmpName     = $_FILES['picture']['tmp_name'];
    $title       = $_POST['title'];
    $description = $_POST['opis'];
    $categorie   = $_POST['categorie'];
    $data = date("Y-m-d");

    $link = "localhost/szama/accept.php";

    move_uploaded_file($TmpName,'../foto/'.$FileName);

    $i = 1;
    $x = 1;
    $ingredients = "";
    $preparation = "";
    
    for(;;){
        if(isset($_POST['skladnik' . $i])){
            $i_str = strval($i);
            $word = $_POST['skladnik'. $i_str];
            
            $ingredients = $ingredients . ($word . " | ");
        }else{
            $i = 1;
            break;
        }

        $i++;
    }

    while(true){
        if(isset($_POST['krok' . $x])){
            $x_str = strval($x);
            $word = $_POST['krok'. $x_str];
            $preparation = $preparation . ($word . " | ");
        }else{
            break;
        }

        $x++;
    }

    $sql = "INSERT INTO `post`(`title`, `description`, `ingredients`, `preparation`, `user_id`, `image_path`, `categories_id`, `status`) VALUES ('$title', '$description', '$ingredients', '$preparation', '$_SESSION[user_id]', '$FileName', $categorie, 1)";
    $res = mysqli_query($conn, $sql);

    $sql_id = "SELECT id FROM `post` ORDER BY `post`.`id` DESC";
    $res_id = mysqli_query($conn, $sql_id);
    $qry_id = mysqli_fetch_assoc($res_id);

    if($res){
        require("../PHPMailer/src/PHPMailer.php");
        require("../PHPMailer/src/SMTP.php");
        require("../PHPMailer/src/Exception.php");

        $mail = new PHPMailer\PHPMailer\PHPMailer();

        $mail->IsSMTP();
        $mail->CharSet = "UTF-8";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465 ; 
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPAuth = true;
        $mail->Username = "websitemessage24@gmail.com";
        $mail->Password = "tbiztklvdhzupnmk";
        $mail->Subject = "Nowa wiadomość ze strony!";
        $mail->setFrom('websitemessage24@gmail.com', 'Szama App');
        $mail->isHTML(true);
        $mail->Body = '
            <html>
            <head>
                <style>
                    .links{
                        display: flex;
                    }

                    a {
                        display: flex;
                        align-items: center;
                        justify-content: center;

                        font-size: 25px;
                        font-weight: 700;
                        text-decoration: none;
                        color: #000;

                        padding: 20px;

                        width: 30%;
                    }
                </style>
            </head>
            <body>
                <p>Tytuł: <b>' .$title.'</b></p>
                <p>Składniki: <b>' .$ingredients.'</b></p>
                <p>Przygotowanie: <b>' .$preparation.'</b></p>
                <p>Opis: <b>' .$description.'</b></p>

                <br>
                <div class="links">
                    <a href="'.$link.'?accept&id='.$qry_id['id'].' " style="background-color: green;">Akceptuj</a>
                    <a href="'.$link.'?refusal&id='.$qry_id['id'].'" style="background-color: red; text-align: right;">Odrzuć</a>
                </div>
            </body>
            
            ';
            
        $mail->addAddress('meqiu06@gmail.com');

        if ( !$mail->send() ) {		
            echo 'Some error... / Jakiś błąd...';
            echo 'Mailer Error: ' . $mail->ErrorInfo;	
            exit;
        }

        header('Location: ../index.php');
    }else{
        echo"<h1> Coś poszło nie tak :( </h1>";
    }
