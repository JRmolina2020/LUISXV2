<?php
include 'header.php';
if (empty($_GET["nameurl"]) && empty($_GET["nameurl2"])) {
  header("Location: index.php");
  die();
}
$categorie = $_GET["nameurl"];
$nameurl = strtr($categorie, "_", " ");
$nameurl = strtoupper($nameurl);
$rproduct = $index->productx($nameurl);
include './components/productsComponent.php';