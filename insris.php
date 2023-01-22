<?php
include 'config.php';
// faires des ajouts
if ( isset( $_POST[ 'submit' ] ) ) 
 {
    $name = $_POST['name'];
    $email= $_POST["email"];
    $mat=$_POST["mat"];
    $poste=$_POST["poste"];
    $password = $_POST["mdp"];
    $confirmpassword = $_POST["cmdp"];
    
    $result = $conn->prepare(  $select = " SELECT * FROM participants WHERE email = '$email' " );
    $result->execute( array( $email) );

    
    if ( $result->rowCount()>0  && $password != $confirmpassword)
 {

        $erreur = 'le mail existe ou les mots de pass sont differents!';

    } else 
    {

        
        $insert = $conn->prepare('INSERT INTO admin(mat, name_subname, email, poste, password) VALUES (?,?,?,?,?)');
        $insert->execute( array( $mat, $name,$email,
            $poste,$confirmpassword));

            header( 'location:index.php' );


     }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de connexion</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
   <section>
       <h1> Inscription d'un administrateur</h1>
       <?php 
       if(isset($erreur)){// si la variable $erreur existe , on affiche le contenu ;
           echo "<p class= 'Erreur'>".$erreur."</p>"  ;
       }
       ?>
       <form action="" method="POST">  <!--on ne mets plus rien au niveau de l'action , pour pouvoir envoyé les données  dans la même page -->
           <label>Nom & Prenom </label>
           <input type="text" name="name">
        
           <label>Adresse Mail</label>
           <input type="text" name="email">

           <label>Matricule simplon</label>
           <input type="text" name="mat">

           <label>Poste</label>
           <input type="text" name="poste">

           <label >Mots de Passe</label>
           <input type="password" name="mdp">

           <label > confirmation de Mots de Passe</label>
           <input type="password" name="cmdp">

           <input type="submit" value="S'incrire" name="submit">
           <p>avez vous un compte <a href="index.php">se connecter</a></p>
       </form>
   </section> 
   <script src="animation.js"></script>
</body>
</html>