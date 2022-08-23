<?php
include "includes/verificacion.php";
include "includes/conectarbd.php";

$id = $_GET['perfil'];

if ($_POST['accion'] == "eliminar") {
  $cod = $_POST['codArt'];

  $delete = "DELETE FROM Post WHERE id=$cod";
  mysqli_query($conbd, $delete) or die("ERROR: al eliminar el artículo");
  header("Location:perfil.php?perfil=" . $_POST['codUser']);
}

$select = "SELECT Foto,Nombre,Biografia,Pais,Ciudad FROM Usuarios WHERE id= $id;";

$user = mysqli_query($conbd, $select) or die("ERROR!");

$r = $user->fetch_assoc();

if ($r['Foto'] != null) {
  $foto = "imagenes/perfil/" . $r['Foto'];
} else {
  $foto = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAPFBMVEXk5ueutLepsLPo6uursbXJzc/p6+zj5ea2u76orrKvtbi0ubzZ3N3O0dPAxcfg4uPMz9HU19i8wcPDx8qKXtGiAAAFTElEQVR4nO2d3XqzIAyAhUD916L3f6+f1m7tVvtNINFg8x5tZ32fQAIoMcsEQRAEQRAEQRAEQRAEQRAEQRAEQRAEQRAEQRAEQTghAJD1jWtnXJPP/54IgNzZQulSmxvTH6oYXX4WS+ivhTbqBa1r26cvCdCu6i0YXbdZ0o4A1rzV+5IcE3YE+z58T45lqo7g1Aa/JY5tgoqQF3qb382x7lNzBLcxft+O17QUYfQI4IIeklKsPSN4i6LKj/7Zm8n99RbHJpEw9gEBXNBpKIYLJqKYRwjOikf//r+J8ZsVuacbqCMNleI9TqGLGqMzhnVdBOdd6F/RlrFijiCoVMk320CBIahUxTWI0KKEcJqKbMdpdJb5QvdHq6wCI5qhKlgGMS/RBHkubWDAE+QZxB4xhCyDiDkLZxgGEVdQldzSKbTIhmZkFkSEPcVvmBn2SMuZB9od7fQDsMiDdKJjFUSCQarM5WirZ3C2TT/htYnyPcPfgrFHWz0BI74gr6J/IZiGUxAZGQLqmvQLTrtE/Go4YxhVRIpEw+sww1IIcqr5NKmUUzLF3d4/qPkYIp2T/obPuemlojFUR4t9Q2Vojhb7BmgElWHzLPH8hucfpefPNFTVgs9h1AdU/Pin96vwWbWdf+X9Absn3OdO34aMdsDnP8WgKYisTqI6CkNGqZQo1XA6Ef6AU32SJzOcBukHPF07/xNSgmHKa5BOhtezv6mA/rYJpwXNAnbRZ1XuF3BzDcO3vpA3+ny2909gbqE4hhD3LIPhLLyBNhPZvbZ3B+3tPYa18A7auSlXQayKwTPNLKDcuOB0xPYKDPFTkWsevQPRZ1J8Hji9I1KQ34r7hZhrwNwOZ97QxNx0drwn4QI0wQk1DcEsfKCWKdxVvxPSNUIp/knmAXT+nT+Ko3+0H96rcNb3m1fx7MBTJdeBJ7uFcWsc0wvgAsC4pROW0l2inbAmIBv/7GZmuhQH6API2rr8T0e6yuZJ+80A9LZeG62T3tik31XwxtwZcizKuTHkMjB1WdZde4Kmic/A5ZI3rr1ae21d08PlVHYfAaxw9G9CYRbJ+8ZdbTcMRV1XM3VdF0M32vtoTdZ0+u29s0OttJ5bz64UwinjaFMVY9vkqc3KKSxN21Xl+0L4Q3Vuv1tYl0pqnX6ms4XetFz7gdZVAgUEoJntfOUe4ZwsHd9FzqQ3Vv6xe41l0XJcqcKl6TZvlv7ClAW3BsqQW4X7ypApB8dmTgK4IX5wvqIVj33HtD2qSG4BqznxdIefL27Y4sahi0MdIdvUsDva8agGGbCtITmCY31MHD2O0uIdh/0rJDQ1VX5Zdxz3rR2QDbv6qXl9vudzqQtGm1Jv9LDXOsfvvB7VcZ8PDKD0mQ1VHPYQ9O+Yj4hR1IUD8rBnn3ho2m8oQMxbCFiKlL2ioSW5heeJqegED52CzxCtcGD3Kv8Wms9EYLyUhwaFIhSMBClevWEmiK/Iaogu4H7sg6ppQhQG8RUqivuTGOAJOg6FfgW0q0M0PQMRMEgXaeNf3SYDZ8PIMI0+wHgr/MgN7wYwpiLjCCqM6ydUDZLQiB6nDdNC8SDyig3jPPpFXGcC9O8BUBDVmgBY59E7Md/35Loe/UVEECEJwYggJjELZ4J71SaQSBeC02n4Da29CayJNA28SAhd2CQyC1Xw6pSmGSINQVuMhAZp4DClan9MgmkDDNmezqwS8sgtlXK/EPBhoaSmYVC/F7IO1jQEdHOlabpKh3+jzLQSTUiq4X2I+Ip/zU8rlaqAvkS21ElR+gqu3zbjjL+hIAiCIAiCIAiCIAiCsCf/AKrfVhSbvA+DAAAAAElFTkSuQmCC";
}
$misPost = "SELECT *FROM Post WHERE idUser=$id ORDER BY Fecha ASC;";

$listaPosts = mysqli_query($conbd, $misPost) or die("ERROR:en conexión para los posts");
?>

<? include "includes/menu.php"; ?>

<div class="container mt-5">
  <div class="row ">
    <div class="col-3 ">
      <h3 class="font-monospace">Perfil</h3>
      <image src="<? echo $foto; ?>" height="150px" width="250px"></image>
      <h4>Nombre: <? echo $r['Nombre']; ?> </h4>
      <h5>Biografía:</h5>
      <? echo $r['Biografia']; ?>
      <p><small>Ubicación: <? echo $r['Ciudad'] . ", " . $r['Pais']; ?></small></p>
      <a href="actualizarPerfil.php?perfil=<? echo $id; ?>" class="btn bg-info text-white">Actualizar</a>
    </div>
    <div class="col-7 ">
      <h3>Mis post:</h3>
      <div class="container">
        <div class='card-columns mt-3'>
          <?
          while ($pst = $listaPosts->fetch_assoc()) {
            $fecha = explode("-", $pst['Fecha']);
            $fechaFinal = $fecha['2'] . "-" . $fecha['1'] . "-" . $fecha['0'];
            echo "
            <div class='card text-center border-info mt-3'>
            <div class='card-body'>
            <h4 class='card-title'>" . $pst['Titulo'] . "</h4>
            <p class='card-text'>" . $pst['Descripcion'] . " </p>
            <div class='contener'>
              <div class='row'>
              <div class='col'>
              </div>
              <div class='col'>
              <form method='post' acction='perfil.php?perfil=" . $id . "'>
                  <input type='hidden' name='accion' value='eliminar'>
                  <input type='hidden' name='codArt' value='" . $pst['id'] . "'>
                  <input type='hidden' name='codUser' value='" . $id . "'>
                  <button type='submit' class='btn bg-danger text-light'>Borrar</button>
              </form>
              </div>
              <div class='col'>
              <a href='editar.php?articulo=" . $pst['id'] . "&perfil=" . $id . "'class='btn bg-info text-light' type='submit'>Editar</a>
              </div>
              <div class='col'>
              </div>
            </div>
            </div>
            <p class='text-end'>Fecha: " . $fechaFinal . "<p>
            </div>
            </div>";
          }
          ?>
        </div>
      </div>
    </div>
    <div class="col">
      <a href="nuevoPost.php?id=<? echo $id; ?> " class="btn bg-primary text-white fs-5">
        NUEVO POST
      </a>
    </div>
  </div>
</div>
<? include "includes/footer.php"; ?>