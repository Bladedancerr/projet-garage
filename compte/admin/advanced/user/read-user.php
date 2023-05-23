<?php 
if (isset($_COOKIE['admin'])){
    if ($_COOKIE['admin'] != 1) {
        header('Location: ../../compte.php');
    }
}
else {
    header('Location: ../../../../index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include '../../../../include/head.php'?>
    </head>
    <body>
        <?php include '../../../../include/header.php'?>
        <section class="contenu">
            <h2>Afficher les information d'un utilisateur</h2>
            <form method="POST" action="read-user.php" class="formulaire">
                <p>Entrer un nom d'utilisateur valide :</p>
                <input type="text" name="rnom" placeholder="Nom d'utilisateur">
                <input type="submit" value="Afficher les informations du compte">
            </form>
            <table>
                <thead>
                    <tr>
                        <th>id_utilisateur</th>
                        <th>email</th>
                        <th>nom</th>
                        <th>mdp</th>
                        <th>admin</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php
                        include "../../../../code/crud_users.php";
                        if ($_SERVER["REQUEST_METHOD"] == "POST" AND $_POST["rnom"] != "") {
                            $rnom = $_POST["rnom"];
                            if ($rnom == "") {
                                echo "Le champ est vide, veuillez entrer un nom";
                            }
                            else {
                                read_user_text($rnom,$conn);
                            }
                        }
                    ?>
                    </tr>
                </tbody>
            </table>
            <?php include "all-user.php"?>
        </section>
        <?php include '../../../../include/footer.php'?>
    </body>
</html>