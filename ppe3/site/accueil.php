<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Acceuil</title>
</head>
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
        height: 480px;
        border-radius: 15px;
        padding: 10px;
        box-shadow: 5px 5px 25px 4px #8888885b;


    }

    .contenu h1 {
        font-family: 'Trebuchet MS', sans-serif;
        font-size: 35px;
        margin-left: 50px;
        color: rgb(58, 127, 155);
    }

    .contenu p {
        font-family: 'Trebuchet MS', sans-serif;
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

<body id="body">
    <?php
    // define variables and set to empty values
    $name = $email = $adresse = $codePostal = $ville = $numTel = $mdp = $statut = "";
    $nameErr = $emailErr = $adresseErr = $codePostalErr = $villeErr = $numTelErr = $mdpErr = $statutErr = "";



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

    session_start();

    //$newEmail = $_SESSION['email'];

    $sql = "SELECT  name FROM test";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            $newName = $row['name'];
        }
    } else {
        echo "0 results";
    }

    ?>



    <?php session_reset(); ?>

    <header>
        <div class="barre-du-haut">
            <div class="logo">
                <a href=""><img src="https://zupimages.net/up/22/02/ysks.png" alt="logo"></a>
            </div>

            <div class="boutons">
                <a id='connexion' href="../site/connexion.php">Connexion</a>
                <a id='inscription' href="../site/formulaire.php">Inscription</a>
            </div>
        </div>
    </header>

    <div class="text-center my-4">
        <h1> Bienvenue <?php echo $newName ?></h1>
    </div>

    <main>

        <div class="contenu">
            <h1>Acceuil</h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                Repellat itaque eius saepe facilis fugit vel exercitationem 
                impedit quam? Temporibus assumenda laborum totam animi at veritatis 
                molestiae culpa illum ab consequuntur. 
                Lorem ipsum dolor sit amet consectetur, 
                adipisicing elit. Quis cum sapiente 
                nesciunt non consequuntur dolorem 
                perspiciatis architecto aliquid 
                alias minima neque, fuga ratione, natus consectetur quam repellendus 
                explicabo debitis qui.Lorem ipsum dolor sit amet consectetur, adipisicin
                g elit. Repellat itaque eius saepe facilis fugit vel exercitationem
                 impedit quam? Temporibus assumenda laborum totam animi at veritatis 
                 molestiae culpa illum ab consequuntur. Lorem ipsum dolor sit amet 
                 consectetur adipisicing elit. Laborum, deleniti. Numquam fuga illo, 
                 ipsa a assumenda neque, magnam doloribus consectetur nostrum ea
                  necessitatibus quam dolores ex, alias corporis ab dolorum. Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                Repellat itaque eius saepe facilis fugit vel exercitationem  lorem   </p>
        </div>



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