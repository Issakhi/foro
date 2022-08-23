<?php
    include "includes/verificacion.php";
    include "includes/menu.php";
    include "includes/conectarbd.php";
    
    $id = $_GET['id'];
     if($_POST['accion']=="guardar"){
        
         $cod= $_POST['idUser'];
         $titulo= $_POST['titulo'];
         $articulo = $_POST['articulo'];
         $fecha= date("y/n/j");
         $lenguaje = $_POST['lenguaje'];
         $foto= $_FILES['foto']['name'];
         $temp = $_FILES['foto']['tmp_name'];
         $carpeta="imagenes/post/".$foto;
         $tipo =$_FILES['foto']['type'];
         $tamaño = $_FILES['foto']['type'];
           $guardar = "";
         
         $insert= "INSERT INTO Post (imagen,Titulo,Descripcion,lenguaje,Fecha,idUser)
         VALUES ('".$foto."','".escape_string($titulo)."','".escape_string($articulo)."','".escape_string($lenguaje)."','".$fecha."',".$cod.")";
        if($titulo =="" || $articulo ==""){
            header("Location:nuevoPost.php?perfil=$cod");

           }else{
           if($foto != ""){
                  if( strpos($tipo,"png")||strpos($tipo,"jpeg")||strpos($tipo,"jpg")||strpos($tipo,"gif")){
                    
                      if(move_uploaded_file($temp,$carpeta)){
                        mysqli_query($conbd,$insert) or die("ERROR");

    
                        header("Location: perfil.php?perfil=".$cod);  
                      }
                  }else{
                      echo "El formato no es valido, formatos validos: png,jpeg,jpg,gif";
                      
                  } 
         }else{
                    mysqli_query($conbd,$insert) or die("ERROR");

    }}
}
?>
<div class="contener">
    <div class="row mt-3">
        <div class="col-2">
        </div>
        <div class="col">
            
            <form method="post" action="nuevoPost.php?id=<?echo $id;?>" enctype="multipart/form-data" id="formPublicar">
                <input type="hidden" name="accion" value="guardar">
                <input type="hidden" name="idUser" value="<? echo $id;?>">
                 Titulo:<br> <input type="text" name="titulo" id="titulo" size="70" minlength="5">
                    Lenguaje: <select name="lenguaje" id="selector">
                    <option value="...">...</option>
                    <option value="Php">php</option>
                    <option value="Javascript" selected>javascript</option>
                    <option value="C">C</option>
                    <option value="Java">Java</option>
                    <option value="Kotlin">Kotlin</option>
                    <option value="Csharp">C#</option>
                </select>
                <br>
                <textarea id="textoArticulo" name="articulo" class="wmd-input s-input bar0 js-post-body-field mt-3" data-post-type-id="2" cols="92" rows="15" tabindex="101" minlength="25">
                </textarea>

                <div class="input-group mt-3">
                    <input type="file" name="foto" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" >
                    <button type="submit" class="btn bg-warning">Publicar</button>
                </div>
            </form>
            </div>
        <div class="col-2">
        </div>
    </div>
</div>