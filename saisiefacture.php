<html><head><title>Ajout d'une facture</title></head><body>
<link rel="stylesheet" type="text/css" href="form.css"/>
<?php
$connexion = mysql_connect("localhost","root","");
if ($connexion) 
{
  // connexion réussie
  mysql_select_db("m2l",$connexion);
  $requete="insert into facture(num_facture, date_facture, echeance, num_compte) values ('".$_POST["numfacture"]."','".$_POST["datefacture"]."','".$_POST["echeance"]."','".$_POST["numcompte"]."');";
  $ok= mysql_query($requete,$connexion);
  $requete="insert into ligne_facture values ('".$_POST["numfacture"]."','".$_POST["affran"]."','".$_POST["qte1"]."');";
  $ok= mysql_query($requete,$connexion);
  $requete="insert into ligne_facture values ('".$_POST["numfacture"]."','".$_POST["photocouleur"]."','".$_POST["qte2"]."');";
  $ok= mysql_query($requete,$connexion);
  $requete="insert into ligne_facture values ('".$_POST["numfacture"]."','".$_POST["photon"]."','".$_POST["qte3"]."');";
  $ok= mysql_query($requete,$connexion);
  $requete="insert into ligne_facture values ('".$_POST["numfacture"]."','".$_POST["traceur"]."','".$_POST["qte4"]."');";
  $ok= mysql_query($requete,$connexion);
  $requete = "call sommefacture();";
  $ok = mysql_query($requete,$connexion);
  if ($ok)
  {
    echo "La facture a été correctement ajoutée, vous pouvez la récupérer et l'imprimer par le biais du module rechercher facture";
  }
  else
  {
    echo "L'ajout de la facture a échoué";
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