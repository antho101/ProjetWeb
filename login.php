
<?php
    include('./lib/php/InfoLog.php');
?>
<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">
        <link href="lib/css/bootstrap.min.css" rel="stylesheet">
        <link href="lib/css/accueil.css" rel="stylesheet">
        <link href="lib/css/page_intro_login.css" rel="stylesheet">
        <script src="lib/css/js/ie-emulation-modes-warning.js"></script>
        <title>Dashboard Template for Bootstrap</title>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>  

        <script type="text/javascript">
            $(function() {
                setInterval(function() {
                    $(".slideshow ul").animate({marginLeft: -350}, 800, function() {
                        $(this).css({marginLeft: 0}).find("li:last").after($(this).find("li:first"));
                    })
                }, 3500);
            });
        </script> 
    </head>
    <body id="body_login">
        <?php
        $erreur = 0;
        $login = 0;
        $erreur_mess = array();
        $cpt = 0;
        $i = 0;

      

        if (isset($_POST["envoie"])) {
            if (!isset($_POST['name']) || empty($_POST['name'])) {
                $erreur = $erreur + 1;
                $erreur_mess[$erreur] = 'login invalide';
            }
            if (!isset($_POST['pass']) || empty($_POST['pass'])) {
                $erreur = $erreur + 1;
                $erreur_mess[$erreur] = 'password invalide';
            }
            if ($erreur == 0) {
                if ($_POST['name'] != $loginLog) {
                    $erreur = $erreur + 1;
                    $erreur_mess[$erreur] = 'login incorrect';
                } else {
                    if ($_POST['pass'] != $passLog) {

                        $erreur = $erreur + 1;
                        $erreur_mess[$erreur] = 'pass incorrect';
                    } else {
                        $login = 1;
                    }
                }
            }
        }
        if ($login == 1) {
            //echo ' connexion réussi, redirection en cours...';
            echo '<META HTTP-EQUIV="Refresh" CONTENT="1; URL=index.php">';
            ?>


            <?php
        } else {
            ?>

            <div class="menu-container">

                <div class="nav">
                    <p id="text-connexion">Connexion</p>
                    <div class="settings"></div>
                </div>

                <div class="menu">
                    <!--<form action="#" method="post">
                        <ul>

                            <li> Login<input  type="text" name="name" class="inp" placeholder="Login"></li>
                            <li> <input type="password" name="pass" placeholder="Password"></li>
                            <li>
                                <button value="envoie" name="envoie" type="submit" id="myButton" data-loading-text="Loading..." class="btn btn-primary">
                                    loading
                                </button>
                            </li>                         

                        </ul>
                    </form>-->
                    <form action="#" method="post" role="form" style="padding:30px;">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Login</label>
                            <input type="text" class="form-control" name="name" placeholder="Login">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="pass" id="exampleInputPassword1" placeholder="Password">
                        </div>

                        <button type="submit" value="envoie" name="envoie" class="btn btn-primary" style="margin:0 auto;text-align:center;width:100%;margin-top:5%;">Connexion</button>
                    </form>
                    <?php
                    if ($erreur != 0) {
                        foreach ($erreur_mess as $key => $value) {
                            //echo '<div id="erreur">erreur #' . $key . ': ' . $value . '</div><br/>';
                            echo '<div class="alert alert-danger" role="alert" >
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                <span class="sr-only">Error:</span>
                                ' . $value . '
                                </div>';
                        }
                    }
                    ?>
                </div>
                <?php
            }
            ?>
        </div>

    </body>
</html>