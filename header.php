        <aside class="close" id="aside">
            <br><br>
            <div class="logo">
                <span>SzamaApp</span>
            </div>

            <div class="links">
                <ul>
                    <li>
                        <a href="index.php"><i class="bi bi-house"></i> <span>Home</span> </a>
                    </li>
                    <li>
                        <a href="search.php"><i class="bi bi-search"></i> <span>Szukaj</span> </a>
                    </li>
                    <?php 
                        session_start();

                        if(isset($_SESSION['login_status'])){
                            echo '<li>';
                            echo '<a> <i class="bi bi-person-circle"></i> <span style="color: #fff">' . $_SESSION['username'] .'</span> </a>';
                            echo '</li>';

                        }
                    ?>
                    <li>
                        <?php

                            if(isset($_SESSION['login_status'])) {
                                echo'<a href="backend-files/logout.php"><i class="bi bi-box-arrow-left"></i> <span>Wyloguj sie</span> </a>';
                            }else{
                                echo'<a href="login.php"><i class="bi bi-door-open-fill"></i> <span>Zaloguj się</span> </a>';
                            }
                        
                        ?>
                        
                    </li>
                    <li>
                        <a href="add.php"><i class="bi bi-plus-square-fill"></i> <span>Dodaj przepis</span></a>
                    </li>
                    <li class="last">
                        <i class="bi bi-layout-sidebar" onclick="close_aside()"></i>
                    </li>
                </ul>
            </div>
        </aside>