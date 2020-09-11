<?php
include 'header.php';
if (empty($_GET["nameurl"]) && empty($_GET["nameurl2"])) {
  header("Location: index.php");
  die();
}
$categorie = $_GET["nameurl"];
$namebrand = $_GET["nameurl2"];
$nameurl = strtr($categorie, "_", " ");
$nameurl = strtoupper($nameurl);
$nameurl2 = strtr($namebrand, "_", " ");
$nameurl2 = strtoupper($nameurl2);
$rproduct = $index->product($nameurl, $nameurl2);
include './components/productsComponent.php';