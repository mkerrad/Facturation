<html><head><title>Ajout d'une prestation</title></head><body>
<link rel="stylesheet" type="text/css" href="form.css"/>
<?php
$connexion = mysql_connect("localhost","root","");
if ($connexion) 
{
  // connexion réussie
  mysql_select_db("m2l",$connexion);
  $requete="insert into prestation values ('".$_POST["code"]."','".$_POST["libelle"]."','"
.$_POST["pu"]."');";
  $ok= mysql_query($requete,$connexion);
  if ($ok)
  {
    echo "La prestation a été correctement ajoutée";
  }
  else
  {
    echo "L'ajout de la prestation a échoué";
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