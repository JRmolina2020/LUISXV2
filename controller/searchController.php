<?php
require "../config/conexion.php";

function search()
{
  $search = isset($_POST["search"]) ? limpiarCadena($_POST["search"]) : "";

  $sql = "SELECT p.name,p.image,p.link as link
  FROM products p
  INNER JOIN categories c
  ON c.id = p.category_id
  INNER JOIN brands b
  ON b.id = p.brand_id
  WHERE p.name LIKE '%$search%' OR c.name LIKE '%$search%' OR b.name LIKE '%$search%' ";
  $res = ejecutarConsulta($sql);
  while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
    $name = strtolower($row['name']);
    $image = $row['image'];
    if ($image) {
      $image = $row['image'];
    } else {
      $image = 'notproduct.jpg';
    }
    echo "
  <div class='col-md-6 col-xs-6 col-sm-6'>
        <img src='files/products/$image' height='40' width='40px' >
          <a class='search' href='$row[link]'>$name</a>
      </a>
  </div>
    ";
  }
}
search();