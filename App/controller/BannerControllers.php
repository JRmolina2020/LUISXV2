<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
  require_once "../model/Banner.php";
  $banners = new Banner();
  $id = isset($_POST["id"]) ? limpiarCadena($_POST["id"]) : "";
  $active = isset($_POST["active"]) ? limpiarCadena($_POST["active"]) : "";
  $image = isset($_POST["image"]) ? limpiarCadena($_POST["image"]) : "";
  $link = isset($_POST["link"]) ? limpiarCadena($_POST["link"]) : "";
  switch ($_GET["op"]) {
    case 'store':
      if (!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {
        $image = $_POST["imagenactual"];
      } else {
        $ext = explode(".", $_FILES["image"]["name"]);
        if ($_FILES['image']['type'] == "image/jpg" || $_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png") {
          $image = round(microtime(true)) . '.' . end($ext);
          move_uploaded_file($_FILES["image"]["tmp_name"], "../files/banner/" . $image);
          $image2 = $_POST["imagenactual"];
          if ($image2) {
            $dir = '../files/banner/' . $image2;
            if (file_exists($dir)) {
              unlink($dir);
            }
          }
        }
      }
      if (empty($id)) {
        $rspta = $banners->store($image, $active, $link);
        echo $rspta ? "La imagen ha sido registrada" : "La imagen no se pudo registrar";
      } else {
        $rspta = $banners->update($id, $image, $active, $link);
        echo $rspta ? "La imagen ha sido actualizada" : "La imagen no se pudo actualizar";
      }
      break;

    case 'destroy':
      $rspta = $banners->destroy($id);
      echo $rspta ? "La imagen ha sido eliminada" : "La imagen no se pudo eliminar";
      break;
    case 'show':
      $rspta = $banners->show($id);
      echo json_encode($rspta);
      break;
    case 'index':
      $rspta = $banners->index();
      $data = array();
      while ($reg = $rspta->fetch_object()) {
        $data[] = array(
          "0" =>
          '<button class="btn btn-success btn-xs" onclick="show(' . $reg->id . ')">
	 				<i class="fa fa-pencil"></i></button>' .
            ' <button class="btn btn-danger btn-xs"  onclick="destroy(' . $reg->id . ')">
	                <i class="fa fa-trash"></i></button>',
          "1" => ($reg->active == 'active') ?
            '<span class="label label-success">Activo</span>' :
            '<span class="label label-danger">No activo</span>',
          "2" => "<img src='../files/banner/" . $reg->image . "' height='50px' width='50px' >",
          "3" => $reg->link

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