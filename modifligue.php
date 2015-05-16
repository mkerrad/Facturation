<html><head><title>Modification d'une ligue</title></head><body>
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
  $requete="update ligue set intitule = '".$_POST["intitule"]."', num_tresorier = '".$_POST["tresorier"]."', Envoi_Tres = '".$charEnvoiTres."' where num_compte = '".$_POST["numcompte"]."';";
  $ok= mysql_query($requete,$connexion);
  if ($ok)
  {
    echo "La ligue a été correctement modifiée";
  }
  else
  {
    echo "La modification de la ligue a échoué";
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