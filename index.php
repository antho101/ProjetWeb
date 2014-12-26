<?php
include ('./lib/php/liste_include.php');

$db = Connexion::getInstance($dsn, $user, $pass);
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image/png" href="images/condorcet.png" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"><!--mce:0--></script>


        <link href="lib/css/bootstrap.min.css" rel="stylesheet">
        <link href="lib/css/accueil.css" rel="stylesheet">
        <link href="lib/css/page_intro_login.css" rel="stylesheet">
        <script src="lib/js/jquery.min.js"></script>
        <script src="lib/js/bootstrap.min.js"></script>
        <title>Dashboard Template for Bootstrap</title>
    </head>

    <body>

        <table id="table_all">
            <tr style="height:13%;">
                <td>
                    <?php
                    if (isset($_GET['pages'])) {
                        $p = './pages/' . $_GET['pages'];
                    } else {
                        $p = './pages/header.php';
                    }
                    if (file_exists($p)) {
                        include $p;
                    } else {
                        echo "page en construction !";
                    }
                    ?>
                </td>
            </tr>
            <tr id="accueil_ok" >
                <td valign="top">
                    <div id="all">
                        <?php
                        //quand on arrive sur le site 
                        if (!isset($_SESSION['page'])) {
                            $_SESSION['page'] = "Batiments";
                        }  //si on a cliqué sur un lien du menu
                        if (isset($_GET['page'])) {
                            $_SESSION['page'] = $_GET['page'];
                        }
                        $_SESSION['page'] = $_SESSION['page'];
                        if (file_exists('./pages/' . $_SESSION['page'] . '.php')) {
                            include ('./pages/' . $_SESSION['page'] . '.php');
                        }
                        ?>
                    </div>
                </td>
            </tr>
            <tr class="footer">
                <td>
                    <?php
                    if (isset($_GET['pages'])) {
                        $p = './pages/' . $_GET['pages'];
                    } else {
                        $p = './pages/footer.php';
                    }
                    if (file_exists($p)) {
                        include $p;
                    } else {
                        echo "page en construction !";
                    }
                    ?>
                </td>
            </tr>
        </table>
    </body>
</html>