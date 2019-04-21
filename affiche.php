<?php 
session_start();
require_once __DIR__ . '/vendor/autoload.php';

use factcli\modele\client as client;
use factcli\modele\facture as facture;
use Illuminate\Database\Capsule\Manager as DB;

$db = new DB();

$db->addConnection(parse_ini_file('src/conf/conf.ini'));

$db->setAsGlobal();
$db->bootEloquent();
$id = client::select('id')->where('nomcli','=',$_POST["nomcli"])->first();
$factures = facture::select('id','montant')->where("client_id", "=", $id->id)->get();
?>
<link href="css/style.css" rel="stylesheet" type="text/css">
<h2>La session contient le client : <?php echo $_POST['nomcli'] ?></h2>
<table>
	<thead>
		<th><strong>Numéro<strong></th>
			<th><strong>Facture<strong></th>

			</thead>
			<tbody>
				<?php  foreach ($factures as $facture) {
					echo "<tr>";
					echo"<td>$facture->id</td>";
					echo "<td>$facture->montant €</td>";
					echo "</tr>";
				}
				?>
			</tbody>
</table>

		<p>Si changement de nom, <a href="index.php">cliquez ici</a> pour revenir à la page index</p>