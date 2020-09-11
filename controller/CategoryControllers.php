<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
  require_once "../model/Categorie.php";
  $categories = new Categorie();
  $id = isset($_POST["id"]) ? limpiarCadena($_POST["id"]) : "";
  $name = isset($_POST["name"]) ? limpiarCadena($_POST["name"]) : "";
  $categorie = isset($_POST["categorie"]) ? limpiarCadena($_POST["categorie"]) : "";
  $image = isset($_POST["image"]) ? limpiarCadena($_POST["image"]) : "";
  switch ($_GET["op"]) {
    case 'store':
      if (!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {
        $image = $_POST["imagenactual"];
      } else {
        $ext = explode(".", $_FILES["image"]["name"]);
        if ($_FILES['image']['type'] == "image/jpg" || $_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png" || $_FILES['image']['type'] == "image/gif") {
          $image = round(microtime(true)) . '.' . end($ext);
          move_uploaded_file($_FILES["image"]["tmp_name"], "../files/categories/" . $image);
          $image2 = $_POST["imagenactual"];
          if ($image2) {
            $dir = '../files/categories/' . $image2;
            if (file_exists($dir)) {
              unlink($dir);
            }
          }
        }
      }
      if (empty($id)) {
        $rspta = $categories->store($name, $image, $categorie);
        echo $rspta ? "La categoria ha sido registrada" : "La categoria no se pudo registrar";
      } else {
        $rspta = $categories->update($id, $name, $image, $categorie);
        echo $rspta ? "La categoria ha sido actualizada" : "La categoria no se pudo actualizar";
      }
      break;

    case 'destroy':
      $rspta = $categories->destroy($id);
      echo $rspta ? "La categoria ha sido eliminada" : "La categoria no se pudo eliminar";
      break;

    case 'status':
      $status = $_POST["status"];
      $rspta = $categories->statu($id, $status);
      echo $rspta ? "El estado se ha cambiado" : "El estado no se pudo cambiar";
      break;
    case 'statusroute':
      $route = $_POST["route"];
      $rspta = $categories->statusroute($id, $route);
      echo $rspta ? "El estado de la sección ha cambiado" : "La sección no ha cambiado el estado";
      break;
    case 'show':
      $rspta = $categories->show($id);
      echo json_encode($rspta);
      break;
    case 'index':
      $rspta = $categories->index();
      $data = array();
      while ($reg = $rspta->fetch_object()) {
        $data[] = array(
          "0" =>
          '<button class="btn btn-success btn-xs" onclick="show(' . $reg->id . ')">
	 				<i class="fa fa-pencil"></i></button>' .
            ' <button class="btn btn-danger btn-xs"  onclick="destroy(' . $reg->id . ')">
	                <i class="fa fa-trash"></i></button>',
          "1" => $reg->name,
          "2" => $reg->categorie,
          "3" => "<img src='../files/categories/" . $reg->image . "' height='50px' width='50px' >",
          "4" => ($reg->route == 1) ?
            '<span onclick="statusroute(' . $reg->id . ',' . $reg->route . ')"class="label label-success">Si</span>' :
            '<span onclick="statusroute(' . $reg->id . ',' . $reg->route . ')"class="label label-danger">No</span>',
          "5" => ($reg->status == 1) ?
            '<span onclick="statu(' . $reg->id . ',' . $reg->status . ')"class="label label-success">Activo</span>' :
            '<span onclick="statu(' . $reg->id . ',' . $reg->status . ')"class="label label-danger">bloqueado</span>'
        );
      }
      $results = array(
        "sEcho" => 1,
        "iTotalRecords" => count($data),
        "iTotalDisplayRecords" => count($data),
        "aaData" => $data
      );
      echo json_encode($results);
      break;

      exit;
  }
} else {
  header("HTTP/1.0 403 Forbidden");
  exit;
}