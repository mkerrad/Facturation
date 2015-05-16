<html><head><title>Facture</title></head><body>
<link rel="stylesheet" type="text/css" href="form.css"/>
<?php
$connexion = mysql_connect("localhost","root","");
if ($connexion) 
{
  // connexion réussie
  mysql_select_db("m2l",$connexion);
  $requete ="select intitule,nomtresorier from ligue,tresorier,facture where ligue.num_compte = facture.num_compte AND ligue.num_tresorier = tresorier.num_tresorier";
  $resultat= mysql_query($requete,$connexion);
  $ligne=mysql_fetch_assoc($resultat);
  echo "".$ligne["intitule"]."<br><br>A l'attention de :".$ligne["nomtresorier"]."<br> Maison Régionale des Sports de Lorraine<br> 13 rue Jean Moulin<br> 54150 TOMBLAINE";
  $requete="select * from facture,ligne_facture,prestation where facture.num_facture = ".$_POST["codefacture"]." AND ligne_facture.num_facture = ".$_POST["codefacture"]." AND ligne_facture.code_prestation = prestation.code_prestation;";
  echo '<p /><table border="5" width="75%">';
  echo "<tr><th>num facture</th><th>date facture</th><th>échéance</th><th>num compte ligue</th><th>code prestation</th><th>quantite</th><th>prix ttc</th></tr>";
  $resultat= mysql_query($requete,$connexion);
  $ligne=mysql_fetch_assoc($resultat);
  $total = 0;
  while($ligne) 
  {
    $pttc = $ligne["pu"] * $ligne["quantite"];
    echo "<tr><td>".$ligne["num_facture"]."</td><td>".$ligne["date_facture"]."</td><td>".$ligne["echeance"]."</td><td>".$ligne["num_compte"]."</td><td>".$ligne["code_prestation"]."</td><td>".$ligne["quantite"]."</td><td>".$pttc."</td></tr>";
    $ligne=mysql_fetch_assoc($resultat);
  }
  echo "</table><p />";
  $requete ="select somme from facture where facture.num_facture = ".$_POST["codefacture"].";";
  $resultat= mysql_query($requete,$connexion);
  $ligne=mysql_fetch_assoc($resultat);
  echo "<b>Total</b> : ".$ligne["somme"]." euros";
}
else
{
  echo "probleme de connexion <br>";
}
mysql_close($connexion);
?>
<form>
<input type="button" value="Imprimer" onClick="window.print()">
</form>
<div class=blocaccueil>
<br>
<a href=index.html> Retour à l'accueil</a><br><br>
<div>
</body></html>