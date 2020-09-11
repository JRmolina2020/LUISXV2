<?php
require "config/conexion.php";
class IndexAll
{
  public function categorie($categorie)
  {
    $sql = "SELECT id,name,image as image,categorie,route 
    FROM categories 
    WHERE categorie='$categorie' AND status=1";
    return ejecutarConsulta($sql);
  }

  public function banner()
  {
    $sql = "SELECT id,image,active,link
    FROM banners";
    return ejecutarConsulta($sql);
  }

  public function brands($name)
  {
    $sql = " SELECT  DISTINCT b.id ,b.name,b.image,b.id as brand_id,c.name as categorie
    FROM products p
    INNER JOIN categories c ON c.id = p.category_id
    INNER JOIN brands b ON b.id =p.brand_id
    WHERE c.name = '$name' AND b.status=1
    ORDER BY b.id DESC";
    return ejecutarConsulta($sql);
  }

  public function product($categorie, $brand)
  {
    $sql = "SELECT p.id,ref,p.name as product,brand_id,price,discount,description,p.image,p.status,
    c.name as categorie,b.name as brand,c.name as categorie
    FROM products p
    INNER JOIN categories c ON c.id = p.category_id
    INNER JOIN brands b ON b.id = p.brand_id
    WHERE c.name ='$categorie'AND b.name='$brand' AND p.status=1
    ORDER BY p.id DESC";
    return ejecutarConsulta($sql);
  }
  public function productx($categorie)
  {
    $sql = "SELECT p.id,ref,p.name as product,brand_id,price,discount,description,p.image,p.status,
    c.name as categorie,b.name as brand,c.name as categorie
    FROM products p
    INNER JOIN categories c ON c.id = p.category_id
    INNER JOIN brands b ON b.id = p.brand_id
    WHERE c.name ='$categorie'AND p.status=1
    ORDER BY p.id DESC";
    return ejecutarConsulta($sql);
  }
  public function productsale()
  {
    $sql = "SELECT p.id,ref,p.name as product,brand_id,price,discount,description,p.image,p.status,
    c.name as categorie,b.name as brand,c.name as categorie
    FROM products p
    INNER JOIN categories c ON c.id = p.category_id
    INNER JOIN brands b ON b.id = p.brand_id
    WHERE  p.discount >0 AND p.status=1
    ORDER BY p.id DESC";
    return ejecutarConsulta($sql);
  }
  public function productall($name)
  {
    $sql = "SELECT p.id,ref,p.name as product,brand_id,price,discount,description,specs,embed,p.image,p.image2,p.image3,p.status,
    c.name as categorie,p.price_e
    FROM products p
    INNER JOIN categories c ON c.id = p.category_id
    WHERE p.name='$name'AND p.status=1";
    return ejecutarConsulta($sql);
  }
}