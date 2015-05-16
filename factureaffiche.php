<html><head><title>Choisissez la facture a afficher</title></head><body>
<link rel="stylesheet" type="text/css" href="form.css"/>
<?php
$connexion = mysql_connect("localhost","root","");
if ($connexion) 
{
  // connexion réussie
  mysql_select_db("m2l",$connexion);
  $requete="select DISTINCT facture.num_facture,date_facture,echeance,intitule from facture,ligne_facture,ligue where facture.num_facture = ligne_facture.num_facture AND facture.num_compte = ligue.num_compte;";
  echo "<h1>Liste des factures</h1>";
  echo '<p /><table border="4" width="75%">';
  echo "<tr><th>num facture</th><th>date facture</th><th>échéance</th><th>intitule ligue</th></tr>";
  $resultat= mysql_query($requete,$connexion);
  $ligne=mysql_fetch_assoc($resultat);
  while($ligne) 
  {
    echo "<tr><td>".$ligne["num_facture"]."</td><td>".$ligne["date_facture"]."</td><td>".$ligne["echeance"]."</td><td>".$ligne["intitule"]."</td></tr>";
    $ligne=mysql_fetch_assoc($resultat);
  }
  echo "</table><p />";
  echo '<form action="affichefacture.php" method=post>';
  echo "<h2>Facture à sélectionner</h2>";
  echo 'Code de la facture : <br>';
  echo '<select name="codefacture" size="1">';
  $requete="select * from facture;";
  $resultat= mysql_query($requete,$connexion);
  $ligne=mysql_fetch_assoc($resultat);
  while($ligne) 
  {
     echo '<option selected value = "'.$ligne["num_facture"].'">'.$ligne["num_facture"].' </option>"';
	 $ligne=mysql_fetch_assoc($resultat);
  }
  echo "</select>";
  echo '<p /><input type="submit" value = "Afficher" /><p />';
}
else
{
  echo "probleme de connexion <br>";
}
mysql_close($connexion);
?>
</body></html>