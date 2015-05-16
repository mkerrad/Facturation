<html><head><title>Ajout d'une ligue</title></head><body>
<link rel="stylesheet" type="text/css" href="form.css"/>
<?php
$connexion = mysql_connect("localhost","root","");
if ($connexion) 
{
  // connexion réussie
  mysql_select_db("m2l",$connexion);
  if (empty($_POST["EnvoiTres"]))
  {
     $charEnvoiTres='N';
  }
  else
  {
     $charEnvoiTres='O';
  }
  $requete="insert into ligue values ('".$_POST["numcompte"]."','".$_POST["intitule"]."','"
.$_POST["numtresorier"]."','".$charEnvoiTres."');";
  $ok= mysql_query($requete,$connexion);
  $requete="insert into tresorier values ('".$_POST["numtresorier"]."','".$_POST["nomtresorier"]."','"
.$_POST["adrue"]."','".$_POST["cp"]."','".$_POST["ville"]."');";
  $ok= mysql_query($requete,$connexion);
  if ($ok)
  {
    echo "La ligue a été correctement ajoutée";
  }
  else
  {
    echo "L'ajout de la ligue a échoué";
  }
}
else
{
  echo "probleme de connexion <br>";
}
mysql_close($connexion);
?>
<div class=blocaccueil>
<br>
<a href=index.html> Retour à l'accueil</a><br><br>
<div>
</body></html>