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
            background: linear-gradient(45deg, rgb(255, 255, 255), rgb(255, 255, 255), rgb(128, 216, 252), rgb(128, 216, 252));
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
            font-family: 'Trebuchet MS', sans-serif;
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
            max-width: 1600px;
            height: 330px;
            border-radius: 15px;
            padding: 10px;
            box-shadow: 5px 5px 25px 4px #8888885b;


        }


        .contenu h2 {
            font-family: "Trebuchet MS", sans-serif;
            font-size: 35px;
            color: rgb(58, 127, 155);
        }

        .contenu span {
            font-family: "Trebuchet MS", sans-serif;
            font-weight: 500;
            margin-top: 3%;
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

        /* change couleur texte * requis 
        */
        .error {
            color: #FF0000;
        }
    </style>
</head>

<body>

    <?php
    // define variables and set to empty values
    $name = $email = $adresse = $codePostal = $ville = $numTel = $mdp = $statut = "";
    $nameErr = $emailErr = $adresseErr = $codePostalErr = $villeErr = $numTelErr = $mdpErr = $statutErr = "";



    $servername = "localhost";
    $username = "root";
    $password = '';
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
        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $adresse = test_input($_POST["adresse"]);
        $mdp = test_input($_POST["mdp"]);
        $codePostal = test_input($_POST["codePostal"]);
        $ville = test_input($_POST["ville"]);
        $statut = test_input($_POST["statut"]);
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
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }


        if (empty($_POST["adresse"])) {
            $adresseErr = "Adresse is required";
        } else {
            $adresse = test_input($_POST["adresse"]);
            // check if e-mail address is well-formed
            if (!preg_match("/^[a-zA-Z-0-9' ]*$/", $adresse)) {
                $adresseErr = "Invalid adresse format";
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

        if (empty($_POST["codePostal"])) {
            $codePostalErr = "codePostal is required";
        } else {
            $codePostal = test_input($_POST["codePostal"]);
            // check if e-mail address is well-formed
            if (!preg_match("/^[0-9' ]*$/", $codePostal)) {
                $codePostalErr = "Invalid code postal";
            }
        }

        if (empty($_POST["ville"])) {
            $villeErr = "ville is required";
        } else {
            $ville = test_input($_POST["ville"]);
            // check if e-mail address is well-formed
            if (!preg_match("/^[a-zA-Z-' ]*$/", $ville)) {
                $villeErr = "Invalid ville";
            }
        }

        if (empty($_POST["numTel"])) {
            $numTelErr = "Numero is required";
        } else {
            $numTel = test_input($_POST["numTel"]);
            // check if e-mail address is well-formed
            if (!preg_match("/^[0-9' ]*$/", $numTel)) {
                $numTelErr = "Invalid numero";
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
    }
    ?>
    <header>
        <div class="barre-du-haut">
            <div class="logo">
                <a href=""><img src="https://zupimages.net/up/22/02/ysks.png" alt="logo"></a>
            </div>

            <div class="boutons">
                <a id='connexion' href="../site/accueil.php">Accueil</a>
                <a id='inscription' href="../site/connexion.php">Connexion</a>
            </div>
        </div>
    </header><br><br>

    <div class="contenu text-center  ">
        <h2>PHP Form Validation Example</h2> <br>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            Name: <input type="text" name="name">
            <span class="error">* <?php echo $nameErr; ?></span>
            <br><br> <br>
            E-mail:
            <input type="text" name="email">
            <span class="error">* <?php echo $emailErr; ?></span>
            <br><br><br>
            Adresse:
            <input type="text" name="adresse">
            <span class="error">* <?php echo $adresseErr; ?></span>
            <br><br><br>
            Code Postal:
            <input type="text" name="codePostal">
            <span class="error">* <?php echo $codePostalErr; ?></span>
            <br><br><br>
            Ville:
            <input type="text" name="ville">
            <span class="error">* <?php echo $villeErr; ?></span>
            <br><br><br>
            Mdp:
            <input type="password" name="mdp">
            <span class="error">* <?php echo $mdpErr; ?></span>
            <br><br><br>
            N° Telephone:
            <input type="text" name="numTel">
            <span class="error">* <?php echo $numTelErr; ?></span>
            <br><br><br>
            Formation:
            <select name="statut">
                <option>BTS SIO</option>
                <option>BTS MCO</option>
            </select>


            <br><br> <br>
            <input type="submit" name="submit" value="Submit">

           
        </form><br>
    </div>

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
    <?php


    if (empty($_POST['mdp']) || empty($_POST['email'])) {
    } else if (filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match("/^[a-zA-Z-' ]*$/", $name) && preg_match("/^[a-zA-Z0-9' ]*$/", $adresse)) {

        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO test (name, email, adresse, codePostal, ville , mdp, numTel, statut) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssissis", $_POST['name'], $_POST['email'], $_POST['adresse'], $_POST['codePostal'], $_POST['ville'], md5($_POST['mdp']), $_POST['numTel'], $_POST['statut']);
        $stmt->execute();


        header('Location: formulaire.php');
    }


    ?>
</body>

</html>