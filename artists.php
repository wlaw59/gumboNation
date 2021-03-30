<?php
require_once 'Dao.php';
$dao = new Dao();
$artists = $dao->getArtists();

foreach ($artists as $artist){
 // gallerySquare($artist['email'], $artist['name']);
  echo "<div>" . $artist['email'] . ", " . $artist['name'] . "</div>";

}
?>