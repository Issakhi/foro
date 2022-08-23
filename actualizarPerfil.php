<?php
include "includes/verifificacion.php";
include "includes/conectarbd.php";
include "includes/menu.php";
$id = $_GET['perfil'];

if ($_POST['accion'] == "actualizar") {
       $cod = $_POST['cod'];
       $nombre = $_POST['nombre'];
       $biografia = $_POST['biografia'];
       $pais = $_POST['pais'];
       $ciudad = $_POST['ciudad'];
       $foto = $_FILES['fotoPerfil']['name'];
       $temp = $_FILES['fotoPerfil']['tmp_name'];
       $carpeta ="imagenes/perfil/".$foto;
       $fgenerica = "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png";
       
       

       if(move_uploaded_file($temp,$carpeta)){
             
              echo $update = "UPDATE Usuarios SET Nombre='".escape_string($nombre) . "',Foto='".$foto."',Biografia='" . escape_string($biografia) . "',
                                   Pais='" . escape_string($pais) . "',Ciudad='" . escape_string($ciudad) . "' WHERE id=$cod";
              mysqli_query($conbd, $update) or die("ERROR: al actualizar datos.");
              
              header("Location:perfil.php?perfil=$cod");
       }else{
                  echo "error";
              header("Location:perfil.php?perfil=$cod");
       }
}


$id = $_GET['perfil'];
$selectUser = "SELECT * FROM Usuarios WHERE id=$id";
$usuario = mysqli_query($conbd, $selectUser) or die("ERROR:al hacer el select");
$dt = $usuario->fetch_assoc();
$imagen = $dt['foto'];
 
 if($imagen ==""){
       $imagen = $fgenerica;
 }
?>
<div class="contener mt-3">
       <div class="row">
              <div class="col">
              </div>
              <div class="col">
                     <form method="post" action="actualizarPerfil.php" enctype="multipart/form-data">
                            <input type="hidden" name="accion" value="actualizar">
                            <input type="hidden" name="cod" value="<? echo $id; ?>">
                            <table>
                                   <tr>
                                          <div class="container">
                                                 <div class="row">
                                                        <div class="col-2">
                                                        </div>
                                                        <div class="col">
                                                               <img src="<?echo $imagen; ?>" height="150" width="200">
                                                              <span class="btn"><input type="file" name="fotoPerfil" accept="jpg/png/jpg/jpeg/gif"></span>  
                                                        </div>
                                                        <div class="col-3">
                                                        </div>
                                                 </div>
                                          </div>
                                   </tr>
                                   <tr>

                                          <td>
                                                 <input type="text" name="nombre" value="<? echo $dt['Nombre']; ?>" class="mt-2">
                                          </td>
                                   </tr>
                                   <tr>
                                          <td>
                                                 <textarea name="biografia" class="mt-2" maxlength="180" cols="30" rows="6"><? echo $dt['Biografia']; ?></textarea>
                                          </td>
                                   </tr>
                                   <tr>
                                          <td>
                                                 <input type="text" name="pais" class="mt2" value="<? echo $dt['Pais']; ?>">
                                          </td>
                                   </tr>
                                   <tr>
                                          <td>
                                                 <input type="text" class="mt-2" name="ciudad" value="<? echo $dt['Ciudad']; ?>">
                                          </td>
                                   </tr>
                                   <tr>
                                          <td>
                                                 <a href="perfil.php?perfil=<? echo $id; ?>" class="btn bg-danger text-warning mt-2">Cancelar</a>
                                          </td>
                                          <td>
                                                 <button type="submit" class="btn bg-info text-white ">Actualizar</button>
                                          </td>
                                   </tr>
                            </table>
                     </form>
              </div>
              <div class="col">
              </div>
       </div>
</div>