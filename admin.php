<?php
include "config.php";
// pour les admins
$admin=$conn->query('SELECT * FROM admin');
$a =$admin->fetch();

$participants=$conn->query('SELECT * FROM participants');



?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de connexion</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
*{
    margin: 0;
    padding: 0;
    
    font-family: 'Poppins', sans-serif;
}
body {
     /* display: flex; */
    
    /* justify-content: center;  */
    height: 100vh;
    background: linear-gradient(to top, rgba(0,0,0,0.5)50%,rgba(0,0,0,0.5)50%), url(fond.jpg); 
    background-size: cover;
}
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#"><i class="bi bi-person-circle"></i></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#"><?php echo $a['name_subname'];?></a>
          </li>
          <li class="nav-item">
            
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#tableau">Tableau de bort</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">Deconnexion</a>
          </li>
        </ul>
      </div>
</nav><br>

   <div class="container">
    <h2>Enregistrer des participants <a href="form.php" class="btn btn-dark"><i class="bi bi-plus-circle"></i></a></h2>

    <div class="content" id="tableau">
    
    <table class="table table-dark">
    <thead>
    <tr>
      <th scope="col">Nom & Prenom</th>
      <th scope="col">Email</th>
      <th scope="col">Contact</th>
      <th scope="col">Modifier</th>
      <th scope="col">Suprimer</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($i=$participants->fetch() )
     { ?>

    <tr>
      <th scope="row"><?php echo $i['nom_prenom'];?></th>
      <td><?php echo $i['email'];?></td>
      <td><?php echo $i['contact'];?></td>
     

      <td><a href="delete.php?id=<?php echo $i['contact'] ;?>&code=1" class="btn btn-light" onclick="return confirm(Voulez vous vraiment modifier)"><i class="bi bi-archive-fill"></i></a></td>
      
      <td><a href="delete.php?id=<?php echo $i['contact'] ;?>&code=0" class="btn btn-danger" onclick="return confirm(Voulez vous vraiment modifier)"><i class="bi bi-trash"></i></a></td>
    </tr>
  
  </tbody>
<?php  
}?>
</table>

</div>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"><script>
</body>
</html>
