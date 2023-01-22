<?php 
 

   include 'config.php';

if ( isset( $_POST[ 'submit' ] ) )
 {
    if ( !empty( $_POST[ 'email' ] ) AND !empty( $_POST[ 'mdp' ] ) ) 
 {
        $email = $_POST[ 'email' ] ;
        $pass = $_POST[ 'mdp' ];
    
    $result = $conn->prepare( " SELECT * FROM admin WHERE email = '$email' && password= '$pass' " );

    $result->execute( array( $email, $pass ) );
    if ( $result->rowCount()>0 ) 
 {
        $stag = $result->fetch();
        session_start();
        // $_SESSION[ 'nom' ] = $stag[ 'nom' ];
        // $_SESSION[ 'prenom' ] = $stag[ 'prenom' ];

        header( 'location:admin.php' );

} else {
        $error= 'incorrect email ou password!';
    }

}else{
    $error= 'Remplissez tout les champs!';
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
       <h1> Connexion admin</h1>
       <?php 
       if(isset($error)){// si la variable $erreur existe , on affiche le contenu ;
           echo "<p class= 'Erreur'>".$error."</p>"  ;
       }
       ?>
       <form action="" method="POST">  <!--on ne mets plus rien au niveau de l'action , pour pouvoir envoyé les données  dans la même page -->
           <label>Adresse Mail</label>
           <input type="text" name="email" required>
           <label >Mots de Passe</label>
           <input type="password" name="mdp" required>

           <input type="submit" value="Valider" name="submit">
           <p>N'avez vous pas un compte administrateur? <a href="insris.php">S'incris</a></p>
       </form>
   </section> 
</body>
</html>