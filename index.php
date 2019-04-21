<?php
require_once __DIR__ . '/vendor/autoload.php';

use factcli\modele\client as client;
use factcli\modele\facture as facture;
use Illuminate\Database\Capsule\Manager as DB;

$db = new DB();

$db->addConnection(parse_ini_file('src/conf/conf.ini'));

$db->setAsGlobal();
$db->bootEloquent();

$nomclients = client::select('nomcli')->get();
?>
<link href="css/style.css" rel="stylesheet" type="text/css">
<?php 
echo '<title>Le choix des clients</title>';


echo "<form action='affiche.php' method='post'>
<h1>Recherchez le nom du client</h1>
<SELECT name='nomcli' id='nomcli'>";

foreach ($nomclients as $nomclient) {
	echo "<OPTION value = '$nomclient->nomcli'>$nomclient->nomcli";
}

echo "</SELECT><br><br>
<button type='submit'>Valider</button>
</form> 
<p id='feedback'></p>";






?>