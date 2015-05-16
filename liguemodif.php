<html><head><title>Choisissez la ligue a modifier</title></head><body>
<link rel="stylesheet" type="text/css" href="form.css"/>
<?php
$connexion = mysql_connect("localhost","root","");
if ($connexion) 
{
  // connexion réussie
  mysql_select_db("m2l",$connexion);
  $requete="select * from ligue;";
  echo "<h1>Liste des ligues</h1>";
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
  echo '<form action="modifligue.php" method=post>';
  echo "<h2>Ligue à modifier</h2>";
  echo 'Numero de compte de la ligue : ';
  echo '<select name="numcompte" size="1">';
  $requete="select * from ligue order by num_compte;";
  $resultat= mysql_query($requete,$connexion);
  $ligne=mysql_fetch_assoc($resultat);
  if ($ligne) 
  {
    echo '<option selected value = "'.$ligne["num_compte"].'">'.$ligne["num_compte"].'';
echo "</option>";
    $ligne=mysql_fetch_assoc($resultat);
    while ($ligne) 
    {
      echo '<option value = "'.$ligne["num_compte"].'">'.$ligne["num_compte"].'</option>';
      $ligne=mysql_fetch_assoc($resultat);
    }
  }
  echo "</select>";
  echo "<br><br>";
  echo "<h3>Nouvelles informations :</h3>";
  echo 'Intitule de la ligue : <input type="text" name="intitule" size="100" /><br><br>';
  echo 'Tresorier :<br><br>';
  echo '<select name="tresorier" size="1">';
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
  echo '<br><br>Envoi tresorier <input type="checkbox" name="EnvoiTres" /><br>';
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