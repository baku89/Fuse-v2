<?
require_once "./api/config.php";

//------------------------------------------------------------
// check specified post exists in DB

// attributes
$id = null;
$map = null;
$thumb = 'default_thumb.png';

$title = 'Fuse';
$url = SITEROOT;
$map_url = '';
$thumb_url = SITEROOT . "/img/ogp.jpg";

$type = 1;

//------------------------------------------------------------
// check specified post exists in DB

if ( isset($_GET['n']) ) {

	$id = $_GET['n'];
	$sql = new mysqli(HOST, USER, PASSWORD, DATABASE) or gotoBlankPage();

	$result = $sql->query("SELECT * FROM gallery WHERE id=${id}") or gotoBlankPage();

	if ( !( !empty($result) && $result->num_rows > 0 ) ) {
		gotoBlankPage();
	}

	$col = $result->fetch_assoc();

	$id 		= $col['id'];
	$type 	= $col['type'];
	$map 		= $col['map'];
	$thumb 	= $col['thumb'];

	$title			= "Fuse #${id}";
	$url 				= SITEROOT . "/?n=${id}";
	$map_url		= DATA_URL . "/${map}";
	$thumb_url	= DATA_URL . "/${thumb}";

}

function gotoBlankPage() {
	header('Location: .');
	exit;
}

?>