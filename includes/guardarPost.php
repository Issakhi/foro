<?php
    include "conectarbd.php";
     
    //
    
        $cod = $_POST['codigo'];
        $titulo = $_POST['titulo'];
        $articulo = $_POST['articulo'];
        $imagen = $_POST['imagen'];
        $fecha = getdate();


        $insertar ="INSERT INTO Post SET Imagen= '".$imagen."', Titulo='".$titulo."', Descripcion='".$articulo."' , Fecha='".$fecha."' idUser=$id; ";
        mysqli_query($conbd,$insertar) or dir("Error");
       
        //header("Location:perfil.php?perfil=$id");
    //}
?>