<html><head><title>Saisie d'une ligue</title></head><body>
<link rel="stylesheet" type="text/css" href="form.css"/>
<?php
$connexion = mysql_connect("localhost","root","");
if ($connexion) 
{
  // connexion réussie
  mysql_select_db("m2l",$connexion);
  $requete="select * from ligue;";
  $resultat= mysql_query($requete,$connexion);
  $ligne=mysql_fetch_assoc($resultat);
  while($ligne) 
  {
	 $last = $ligne["num_compte"];
	 $ligne=mysql_fetch_assoc($resultat);
  }
  echo '<form action="saisieligue.php" method=post>';
  echo "<h2>Saisie d'une ligue</h2>";
  echo 'Numero de compte de la ligue : ';
  echo '<select name="numcompte" size="1">';
  echo '<option selected value = "'.($last+1).'">'.($last+1).' </option>"';
  echo "</select>";
  echo '<br><br>';
  echo 'Intitule de la ligue : <input type="text" name="intitule" size="100" /><br><br>';
  echo 'Tresorier (sélectionnez parmi la liste ou insérez en un nouveau)<br><br>';
  echo '<select name="numtresorier" size="1">';
  $requete="select * from tresorier where num_tresorier != 0 order by num_tresorier;";
  $resultat= mysql_query($requete,$connexion);
  $ligne=mysql_fetch_assoc($resultat);
  if ($ligne) 
  {
    echo '<option selected value = "'.$ligne["num_tresorier"].'">'.$ligne["num_tresorier"].' '.$ligne["nomtresorier"];
echo "</option>";
    $ligne=mysql_fetch_assoc($resultat);
    while ($ligne) 
    {
      echo '<option value = "'.$ligne["num_tresorier"].'">'.$ligne["num_tresorier"].' '.$ligne["nomtresorier"] . '</option>';
      $ligne=mysql_fetch_assoc($resultat);
    }
  }
  echo "</select>";
  echo "<br><br>";
  echo 'Numéro trésorier : <input type="text" name="numtresorier" size="2" /><br><br>';
  echo 'Nom, prénom trésorier : <input type="text" name="nomtresorier" size="50" /><br><br>';
  echo 'Rue où habite le trésorier : <input type="text" name="adrue" size="100" /><br><br>';
  echo 'Code postal de sa ville : <input type="text" name="cp" size="5" /><br><br>';
  echo 'Ville : <input type="text" name="ville" size="25" /><br><br>';
  echo 'Envoi tresorier <input type="checkbox" name="EnvoiTres" /><br>';
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
  echo "problème de connexion <br>";
}
mysql_close($connexion);
?>
</body></html>