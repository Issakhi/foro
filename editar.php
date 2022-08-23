<?php
    include "includes/verificacion.php";
    include "includes/menu.php";
    include "includes/conectarbd.php";
    
    $id=$_GET['articulo'];
    $codPerfil=$_GET['perfil'];

    if($_POST['accion']=="guardar"){
       
        $cd= $_POST['codigo'];
        $titulo = $_POST['titulo'];
        $articulo = $_POST['articulo'];

        echo $update = "UPDATE Post SET Titulo='".escape_string($titulo)."', Descripcion='".escape_string($articulo)."' WHERE id=$cd ";
        mysqli_query($conbd,$update) or die("ERROR: al actualizar el post");

        header("Location:perfil.php?perfil=$codPerfil");
    }

    $slcPost= "SELECT * FROM Post WHERE id=$id";
    $post = mysqli_query($conbd,$slcPost) or die("ERROR: al accder al post $id");
    $dt = $post -> fetch_array();

?>

<div class="container mt-3">
    <div class="row">
        <div class="col-2"></div>
        <div class="col">
            <form method="post" acction="editar.php">
                <input type="hidden" name="accion" value="guardar">
                <input type="hidden" name="codigo" value="<?echo $id;?>">
                <table>
                    <tr>
                        <td> <input type="text" name="titulo" value="<?echo $dt['Titulo'];?>" size="60" maxlength="53"></td>
                    </tr>
                    <tr>
                        <td>
                            <textarea name="articulo" class="mt-2" cols="80" rows="15" maxlength="1000"><?echo $dt['Descripcion'];?>
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group mt-3">
                                <input type="file" name="imagen" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="container">
                                <div class="row">
                                <div class="col-7">
                                    </div>
                                    <div class="col">
                                        <a href="perfil.php?perfil=<?echo $codPerfil;?>" class="btn bg-danger text-warning mt-2">Cancelar</a>
                                    </div>
                                    <div class="col">
                                        <button href="#" class="btn bg-info text-light mt-2">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>

            </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>