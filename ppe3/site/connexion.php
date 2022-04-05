<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <style>
        /* change couleur texte * requis 
        */
        .error {
            color: #FF0000;
        }

        body {
            margin-right: 0;
            margin-left: 0;
            margin-top: 0;
            margin-bottom: 0;
        }

        /*==================================-----Barre du haut------===================================*/

        header {
            width: 100%;
            margin-right: 0;
            margin-left: 0;
            border-bottom: 3px solid rgb(128, 216, 252);
            background: linear-gradient(45deg,
                    rgb(255, 255, 255),
                    rgb(255, 255, 255),
                    rgb(128, 216, 252),
                    rgb(128, 216, 252));
        }

        header div.barre-du-haut {
            height: 100px;
            width: 250px;
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .barre-du-haut .boutons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            position: absolute;
            right: 50px;
            margin-top: 20px;
        }

        .boutons a {
            margin-left: 35px;
            float: left;
            padding: 18px;
            text-align: center;
            border: 2px solid rgb(255, 255, 255);
            border-radius: 5px;
            text-decoration: none;
            color: rgb(255, 255, 255);
            font-family: "Trebuchet MS", sans-serif;
            font-size: 20px;
            transition: 0.4s ease-in-out;
        }

        .boutons a:hover {
            background-color: white;
            color: rgb(128, 216, 252);
            border: 2px solid rgb(128, 216, 252);
            border-radius: 5px;
        }

        .barre-du-haut img {
            height: auto;
            width: 230px;
        }

        /*======================================================================================*/
        main {
            margin: 150px auto;
            margin-bottom: 96px;
            max-width: 750px;
            height: 550px;
            border-radius: 15px;
            padding: 10px;
            box-shadow: 5px 5px 25px 4px #8888885b;
        }

        .contenu h1 {
            font-family: "Trebuchet MS", sans-serif;
            font-size: 35px;
            color: rgb(58, 127, 155);
        }

        .contenu p {
            font-family: "Trebuchet MS", sans-serif;
            font-weight: 500;
            font-size: 25px;
            margin-left: 20px;
            color: rgb(118, 120, 121);
            margin-top: 3%;
            float: left;
        }

        /*-------------------------------------------------------------------------------------------------------------*/

        footer {
            background-color: rgb(46, 46, 46);
            width: 100%;
            height: 100px;
            margin-bottom: 0;
            position: fixed;
        }

        footer a {
            text-decoration: none;
            color: rgb(212, 212, 212);
            font-family: "Trebuchet MS", sans-serif;
            font-size: 20px;
            margin-left: 50px;
            float: left;
            margin-top: 20px;

        }
    </style>
</head>

<body>

    <?php
    session_start();
    // define variables and set to empty values
    $email =  $mdp = "";
    $emailErr = $mdpErr = "";



    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "inscription";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    ?>




    <?php

    //Vérifie les caractères rentrés dans les catégories du formulaire
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $email = test_input($_POST["email"]);

        $mdp = test_input($_POST["mdp"]);


        /*$gender = test_input($_POST["gender"]);*/
    }

    //Vérifie les caractères rentrés et leurs concordences.
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {



        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }




        if (empty($_POST["mdp"])) {
            $mdpErr = "Password is required";
        } else {
            $mdp = test_input($_POST["mdp"]);
            // check if e-mail address is well-formed
            if (!preg_match("/^[a-zA-Z-' ]*$/", $mdp)) {
                $mdpErr = "Invalid password";
            }
        }


        if (empty($_POST["statut"])) {
            $numTelErr = "Statut is required";
        } else {
            $numTel = test_input($_POST["statut"]);
            // check if e-mail address is well-formed
            if (!preg_match("/^[a-zA-Z-' ]*$/", $statut)) {
                $statutErr = "Invalid statut";
            }
        }

        $sql = "SELECT email, mdp FROM test WHERE email = '$email' AND mdp = '" . hash('md5', $mdp) . "'";
        $result = $conn->query($sql);

        $rows = mysqli_num_rows($result);
        if ($rows == 1) {

            $_SESSION['email'] = $email;
            header("Location: connecte.php");
        } else {

           // $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
           // echo ($message);
        }

        $conn->close();
    }
    ?>
    <header>
        <div class="barre-du-haut">
            <div class="logo">
                <a href="C:\Users\Amin\Desktop\ppe3\acceuil.html"><img src="https://zupimages.net/up/22/02/ysks.png" alt="logo" /></a>
            </div>

            <div class="boutons">
                <a id="connexion" href="../site/accueil.php">Accueil</a>
                <a id="inscription" href="../site/formulaire.php">Inscription</a>
            </div>
        </div>
    </header>

    <main>
        <div class="contenu"> <br> <br><br>
            <h1 class="text-center">Connexion</h1> <br><br><br>

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">


                <div class="text-center">
                    <label for="email">Email :</label> <input type="text" name="email">
                    <span class="error">* <?php echo $emailErr; ?></span>
                    <br><br>
                </div> <br>


                <div class="text-center">
                    <label for="mdp">Mdp :</label> <input type="password" name="mdp">
                    <span class="error">* <?php echo $mdpErr; ?></span>
                    <br><br>
                </div> <br>



        </div>


        <div class="text-center">
            <input type="submit" name="submit" value="Submit">
        </div>


        </form>
    </main>

    <footer>
        <div class="footer">
            <a href="C:\Users\Amin\Desktop\ppe3\mentions _legales.html">
                <p>Mentions légales</p>
            </a>
            <a href="">
                <p>Nous contacter</p>
            </a>
        </div>
    </footer>




</body>

</html>