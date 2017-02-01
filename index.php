<?php
require './DvdQuery.php';

use Database\Query\DvdQuery;
// $artist = new \Models\Artist();
// or
$dvdQuery = new DvdQuery();
$dvdQuery->titleContains('Die');
$dvdQuery->orderByTitle();
$dvds = $dvdQuery->find();

 ?>
 <?php foreach($dvds as $dvd):
      echo "<p> Title: $dvd->title </p>";
      echo "<p> ID: $dvd->id  </p>";
      echo "<p> Rating: $dvd->rating_name </p>";
      echo "<hr>";
    endforeach  ?>
