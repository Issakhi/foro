<?php 
     //include "includes/verificacion.php";
     include "includes/conectarbd.php";

     
     if($_POST['accion']=="comentar"){
        
            $codart= $_POST['codPost'];
            $nombre=$_POST['nombre'];
            $email=$_POST['email'];
            $comentario =$_POST['comentario'];
            $fecha =date("y/n/j");

            $insertar = "INSERT INTO Comentarios SET Fecha='".$fecha."',idPost='".$codart."',Autor='".escape_string($nombre)."', Comentario='".escape_string($comentario)."', emailAutor='".escape_string($email)."' ";
            mysqli_query($conbd, $insertar) or die("Error:en insertar datos");
         header("Location:post.php?articulo=$codart");
     }

    $id =$_GET['articulo'];

    $select = "SELECT * FROM Post WHERE id=$id;";

    $post = mysqli_query($conbd,$select) or die("ERROR");
    $dt= $post ->fetch_array();
    
    $sql = "SELECT *FROM Comentarios WHERE idPost=$id ORDER BY Fecha ASC;";
    $comentarios = mysqli_query($conbd,$sql) or die("Error: comentarios");

    $selectAutor =" SELECT *FROM Usuarios WHERE id=".$dt['idUser'].";";
    $datosAutor = mysqli_query($conbd,$selectAutor) or die("ERROR: autor");
    $autor = $datosAutor -> fetch_array();

    $imgUser = $autor['Foto'];

    if($imgUser== ""){
       $imgUser ="https://i.pinimg.com/474x/bc/df/1d/bcdf1dc5c5f2d1b6665f7f3ea8740ec7.jpg";
    }else{
        $imgUser="imagenes/perfil/".$autor['Foto'];
    }


?>
<? include "includes/menu.php";?>

<div class="container mt-3">
  <div class="row">
    <div class="col-1">
    </div>
    <div class="col">
        <table>
            <tr>
            <div class="container">
                <div class="row">
                    <div class="col-2 "></div>
                    <div class="col-8">
                        <? if($dt['imagen']!=""){
                echo "<image src='imagenes/post/". $dt['imagen']."' height='200px' width='350px'>";}?>
                <div class="col-2">
                    </div>
                </div>
                </div>
             <td><h3 class='mt-5'><?echo $dt['Titulo'];?>
               </h3></td>
            </tr>
            <tr>
               <td><p class="mt-3 text-center"><?echo $dt['Descripcion'];?></p></td>
            </tr>
            <tr>
                <td><hr size='2px' color='black'></td>
                <table>
                    <tr>
                        <td></td>
                    </tr>
                    <?
                    while($cm = $comentarios -> fetch_assoc()){   
                        $fecha = fomatofecha($cm['Fecha']);
                        
                        echo "
                               
                                <table>
                                <tr>
                                    <td><b>".$cm['autor']."</b> a comentado:</td>
                                    </tr>
                                    <tr>
                                    <td class='p-2'>
                                    ".$cm['Comentario']."
                                     <br>
                                    <p class='fecha'>".$fecha."</p>
                                    </td>
                                </tr>
                                </table>
                                <hr style='width:75%;'>
                        ";
                        
                    }
                    ?>
                </table>
            </tr>
            <tr>
                <table>
                    <tr>
                    <form method="post" action="post.php">
                        <input type="hidden" name="accion" value="comentar"> 
                        <input type="hidden" name="codPost" value="<?echo $id;?>">
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="nombre" placeholder="Nombre" required="required">
                        </td>
                    </tr>
                        <td><input type="email" name="email" placeholder="Email" class="mt-1" required="required"></td>
                </tr>
               <tr>
                    <td>
                        <textarea name="comentario" rows="4" cols="50" class="mt-1" maxlength="160" minlength="10" ></textarea>
                    </td>
                    <td>
                            <button class="btn mt-2 bg-warning" type="submit">Comentar</button>
                    </td>
                    </tr>
                    </form>
                    </table>
                </tr>
                
            </tr>
        </table>
    </div>
    <div class="col-2">
      <h5>Autor:</h5>
      <image src="<?echo $imgUser;?>" width="150px" heigth="60px">
      <h4><?echo $autor['Nombre'];?></h4>
      <p><?echo $autor['Biografia'];?></p>
      <h6><?echo $autor['Ciudad'].", ".$autor['Pais'];?></h6>
    </div>
  </div>
</div>
<? include "includes/footer.php";?>


