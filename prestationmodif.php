<html><head><title>Choisissez la prestation a modifier</title></head><body>
<link rel="stylesheet" type="text/css" href="form.css"/>
<?php
$connexion = mysql_connect("localhost","root","");
if ($connexion) 
{
  // connexion réussie
  mysql_select_db("m2l",$connexion);
  $requete="select * from prestation;";
  echo "<h1>Liste des prestations</h1>";
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
  echo '<form action="modifprestation.php" method=post>';
  echo "<h2>Prestation a modifier</h2>";
  echo 'Code de la prestation : <br><br>';
  echo '<select name="codeprestation" size="5">';
  $requete="select * from prestation;";
  $resultat= mysql_query($requete,$connexion);
  $ligne=mysql_fetch_assoc($resultat);
  while($ligne) 
  {
     echo '<option selected value = "'.$ligne["code_prestation"].'">'.$ligne["code_prestation"].' </option>"';
	 $ligne=mysql_fetch_assoc($resultat);
  }
  echo "</select>";
  echo '<br><br>';
  echo "<h3>Nouvelles informations :</h3>";
  echo 'Libelle de la prestation : <input type="text" name="libelle" size="50" /><br><br>';
  echo 'Prix unitaire prestation : <input type="text" name="pu" size="5" /><br>';
  $requete="select * from ligue;";
  $resultat= mysql_query($requete,$connexion);
  $ligne=mysql_fetch_assoc($resultat);
  echo "</select>";
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