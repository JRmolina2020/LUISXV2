<?php
require "../config/conexion.php";
class Banner
{

  public function store($image, $active, $link)
  {
    $sql = "INSERT INTO banners(image,active,link)
		VALUES ('$image','$active','$link')";
    return ejecutarConsulta($sql);
  }

  public function update($id, $image, $active, $link)
  {
    $sql = "UPDATE banners
		SET id='$id',
    image='$image',
    active='$active',
    link='$link' 
		WHERE id='$id'";
    return ejecutarConsulta($sql);
  }

  public function destroy($id)
  {
    $sql = "DELETE FROM banners WHERE id='$id'";
    return ejecutarConsulta($sql);
  }

  public function show($id)
  {
    $sql = "SELECT id,image,active,link
		FROM banners
		WHERE id='$id'";
    return ejecutarConsultaSimpleFila($sql);
  }
  public function index()
  {
    $sql = "SELECT * FROM banners
      ORDER BY id DESC";
    return ejecutarConsulta($sql);
  }
}