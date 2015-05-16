<html><head><title>Modification d'une prestation</title></head><body>
<link rel="stylesheet" type="text/css" href="form.css"/>
<?php
$connexion = mysql_connect("localhost","root","");
if ($connexion) 
{
  // connexion réussie
  mysql_select_db("m2l",$connexion);
  $requete="update prestation set libelle = '".$_POST["libelle"]."', pu = '".$_POST["pu"]."' where code_prestation = '".$_POST["codeprestation"]."';";
  $ok= mysql_query($requete,$connexion);
  if ($ok)
  {
    echo "La prestation a été correctement modifiée";
  }
  else
  {
    echo "La modification de la prestation a échoué";
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