<html><head><title>Saisie d'une facture</title></head><body>
<link rel="stylesheet" type="text/css" href="form.css"/>
<?php
$connexion = mysql_connect("localhost","root","");
$date = date("Y-m-d");
if (date("m") == 1 OR date("m") == 3 OR date("m") == 5 OR date("m") == 7 OR date("m") == 8 OR date("m") == 10 OR date("m") == 12)
	$echeance = date("Y-m-31");
else if (date("m") == 4 OR date("m") == 6 OR date("m") == 9 OR date("m") == 11)
	$echeance = date("Y-m-30");
else
{
	$test = checkdate(2,29,date("Y"));
	if (test)
		$echeance = date("Y-m-29");
	else
		$echeance = date("Y-m-28");
}
if ($connexion) 
{
  // connexion réussie
  mysql_select_db("m2l",$connexion);
  $requete="select * from ligue;";
  echo "<h1>Saisie d'une facture</h1>";
  echo "<h2>Liste des ligues</h2>";
  echo '<p /><table border="4" width="75%">';
  echo "<tr><th>numero compte</th><th>intitule</th><th>numero tresorier</th><th>envoi tresorier</th></tr>";
  $resultat= mysql_query($requete,$connexion);
  $ligne=mysql_fetch_assoc($resultat);
  while($ligne) 
  {
    echo "<tr><td>".$ligne["num_compte"]."</td><td>".$ligne["intitule"]."</td><td>".$ligne["num_tresorier"]."</td><td>".$ligne["Envoi_Tres"]."</td></tr>";
    $ligne=mysql_fetch_assoc($resultat);
  }
  echo "</table><p />";
  $requete="select * from facture;";
  $resultat= mysql_query($requete,$connexion);
  $ligne=mysql_fetch_assoc($resultat);
  while($ligne) 
  {
	 $last = $ligne["num_facture"];
	 $ligne=mysql_fetch_assoc($resultat);
  }
  echo '<form action="saisiefacture.php" method=post>';
  echo 'Numero de la facture :';
  echo '<select name="numfacture" size="1">';
  echo '<option selected value = "'.($last+1).'">'.($last+1).'</option>"';
  echo "</select>";
  echo '<br>';
  echo '<br>';
  echo 'Date de la facture :';
  echo '<select name="datefacture" size="1">';
  echo '<option selected value = "'.$date.'">'.$date.'</option>"';
  echo "</select>";
  echo '<br>';
  echo 'Date échéance de la facture :';
  echo '<select name="echeance" size="1">';
  echo '<option selected value = "'.$echeance.'">'.$echeance.'</option>"';
  echo "</select>";
  echo '<br><br>';
  echo 'Num compte de la ligue: <br>';
  echo '<select name="numcompte" size="5">';
  $requete="select * from ligue;";
  $resultat= mysql_query($requete,$connexion);
  $ligne=mysql_fetch_assoc($resultat);
  while($ligne) 
  {
     echo '<option selected value = "'.$ligne["num_compte"].'">'.$ligne["num_compte"].' </option>"';
	 $ligne=mysql_fetch_assoc($resultat);
  }
  echo "</select>";
  echo '<br><br>';
  mysql_select_db("m2l",$connexion);
  $requete="select * from prestation;";
  echo "<h2>Liste des prestations</h2>";
  echo '<p /><table border="3" width="75%">';
  echo "<tr><th>code prestation</th><th>libelle prestation</th><th>prix unitaire</th></tr>";
  $resultat= mysql_query($requete,$connexion);
  $ligne=mysql_fetch_assoc($resultat);
  while($ligne) 
  {
    echo "<tr><td>".$ligne["code_prestation"]."</td><td>".$ligne["libelle"]."</td><td>".$ligne["pu"]."</td></tr>";
    $ligne=mysql_fetch_assoc($resultat);
  }
  echo "</table><p />";
  echo 'Code prestation : <br>';
  echo '<select name="affran" size="1">';
  $requete="select * from prestation;";
  $resultat= mysql_query($requete,$connexion);
  $ligne=mysql_fetch_assoc($resultat);
  $nb= 0;
  while($ligne && $nb != 1) 
  {
     echo '<option selected value = "'.$ligne["code_prestation"].'">'.$ligne["code_prestation"].' </option>"';
	 $ligne=mysql_fetch_assoc($resultat);
	 $nb++;
  }
  echo "</select>";
  echo '<br><br>';
  echo 'Quantité :<input type="text" name="qte1" size="10" /><br><br>';
  echo 'Code prestation : <br>';
  echo '<select name="photocouleur" size="1">';
  $requete="select * from prestation;";
  $resultat= mysql_query($requete,$connexion);
  $ligne=mysql_fetch_assoc($resultat);
  $nb= 0;
  while($ligne && $nb != 2) 
  {
     echo '<option selected value = "'.$ligne["code_prestation"].'">'.$ligne["code_prestation"].' </option>"';
	 $ligne=mysql_fetch_assoc($resultat);
	 $nb++;
  }
  echo "</select>";
  echo '<br><br>';
  echo 'Quantité :<input type="text" name="qte2" size="10" /><br><br>';
  echo 'Code prestation : <br>';
  echo '<select name="photon" size="1">';
  $requete="select * from prestation;";
  $resultat= mysql_query($requete,$connexion);
  $ligne=mysql_fetch_assoc($resultat);
  $nb= 0;
  while($ligne && $nb != 3) 
  {
     echo '<option selected value = "'.$ligne["code_prestation"].'">'.$ligne["code_prestation"].' </option>"';
	 $ligne=mysql_fetch_assoc($resultat);
	 $nb++;
  }
  echo "</select>";
  echo '<br><br>';
  echo 'Quantité :<input type="text" name="qte3" size="10" /><br><br>';
  echo 'Code prestation : <br>';
  echo '<select name="traceur" size="1">';
  $requete="select * from prestation;";
  $resultat= mysql_query($requete,$connexion);
  $ligne=mysql_fetch_assoc($resultat);
  $nb= 0;
  while($ligne && $nb != 4) 
  {
     echo '<option selected value = "'.$ligne["code_prestation"].'">'.$ligne["code_prestation"].' </option>"';
	 $ligne=mysql_fetch_assoc($resultat);
	 $nb++;
  }
  echo "</select>";
  echo '<br><br>';
  echo 'Quantité :<input type="text" name="qte4" size="10" /><br>';
  echo '<p /><input type="submit" value = "Enregistrer" /> 
			 <input type="reset" value="Annuler" /><p />';
  echo '</form>';
}
else
{
  echo "probleme de connexion <br>";
}
mysql_close($connexion);
?>
</body></html>