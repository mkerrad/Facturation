<html><head><title>Saisie d'une prestation</title></head><body>
<link rel="stylesheet" type="text/css" href="form.css"/>
<?php
$connexion = mysql_connect("localhost","root","");
if ($connexion) 
{
  // connexion réussie
  mysql_select_db("m2l",$connexion);
  echo '<form action="saisieprestation.php" method=post>';
  echo "<h2>Saisie d'une prestation</h2>";
  echo 'Code de la prestation : <input type="text" name="code" size="20" /><br><br>';
  echo 'Libelle prestation : <input type="text" name="libelle" size="50" /><br><br>';
  echo 'Prix unitaire prestation : <input type="text" name="pu" size="5" /><br><br>';
  $requete="select * from prestation;";
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