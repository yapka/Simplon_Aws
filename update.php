<?php
include 'config.php';
// faires des ajouts
if ( isset( $_POST[ 'submit' ] ) ) 
 {
    $name = $_POST['name'];
    $email= $_POST["email"];
    $contact= $_POST["contact"];

    $result = $conn->prepare( " SELECT * FROM participants WHERE email = '$email' " );
    $result->execute( array( $email) );

    
    if ( $result->rowCount()>0  )
 {

        $erreur[] = 'le mail existe !';

    } else 

    {

        $insert = $conn->prepare('INSERT INTO participants(contact, nom_prenom,email) VALUES (?,?,?)');
        $insert->execute( array( $contact,$name,$email));

            header( 'location:admin.php' );


     }
}
?>


<!DOCTYPE html>
<html lang = 'fr'>
<head>
<meta charset = 'UTF-8'>
<meta http-equiv = 'X-UA-Compatible' content = 'IE=edge'>
<meta name = 'viewport' content = 'width=device-width, initial-scale=1.0'>
<title>Modifier</title>
<link rel = 'stylesheet' href = 'style.css'>

</head>
<body>
   <section>
       <h1> Modification d'un participant</h1>
       <?php 
       if(isset($erreur)){// si la variable $erreur existe , on affiche le contenu ;
           echo "<p class= 'Erreur'>".$erreur."</p>" ;
       }
       ?>
       <form action="" method="POST">  <!--on ne mets plus rien au niveau de l'action , pour pouvoir envoyé les données  dans la même page -->
       <label>Nom & Prenom </label>
           <input type="text" name="name" placeholder="" required>

           <label>Adresse Mail</label>
           <input type="email" name="email" placeholder=""required>

           <label>Contact</label>
           <input type="text" name="contact" placeholder=""required>
           <input type="submit" value="Modifier" name="submit">
           <a href="admin.php">Annuler</a>
       </form>
   </section> 
</body>
</html>