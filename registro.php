<?php
include "includes/menu.php";
include "includes/conectarbd.php";

if ($_POST['registro'] == "ok") {

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $passConfi = $_POST['passConfi'];
    $pais = $_POST['pais'];
    $ciudad = $_POST['ciudad'];

    if ( !empty($pass) && !empty($passConfi)) {

        $select = "SELECT * FROM Usuarios where Email='" . $email . "' limit 1;";

        $emails = mysqli_query($conbd, $select) or die("Error");
        $dt = $emails->fetch_row();
        
        if (count($dt) > 1) {

                echo "Este correo ya esta registrado";
            } else {

            if( $pass == $passConfi ){

                $insert = "INSERT INTO Usuarios (Nombre,Email,Pass,Pais,Ciudad,PassConfi) 
                            VALUES('" . $nombre . "','" . $email . "','" . $pass . "','".$pais."','".$ciudad."','".$passConfi."');";

                if (mysqli_query($conbd, $insert)) {

                    header('Location:login.php');
                }
        }else{
        }
        }
    }{

    }
}
?>

<div class="container ">
    <div class="abs-center">
        <form method="post" action="registro.php" class="border p-3 form " id="formRegistro">
            <input type="hidden" name="registro" value="ok">
            
            <p id="textoer" class="text-danger"></p>
            <table>
                <tr>
                    <div class="reg">
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre *">

                    </div>
                </tr>
                <tr>
                    <div class="reg">
                        <input type="text" name="email" id="email" class="form-control"  placeholder="Email *">
                    </div>
                </tr>
            
                <tr>
                    <div class="reg">
                        <input type="password" name="password" id="pass" class="form-control" placeholder="Contraseña">
                    </div>
                </tr>
                <tr>
                    <div class="reg">
                        <input id="passConfi" type="password" name="passConfi" id="passConfi" class="form-control" placeholder="Confirmar contraseña">
                    </div>
                </tr>
                <tr>
                    <div class="reg">
                        <input type="text" name="pais" id="pais"  class="form-control" placeholder="País *">
                    </div>
                </tr>
                <tr>
                    <div class="reg">
                        <input type="text" name="ciudad" id="ciudad" class="form-control" placeholder="Ciudad *">
                    </div>
                </tr>
                <tr>
                    <div class="conatainer mt-3">
                        <div class="row">
                            <div class="col"> <a href="login.php" class="aa">
                            <p class="btn text-light btnfondo fs-5">LOGIN</p>
                        </a></div>
                            <div class="col"></div>
                            <div class="col"> <a href="registro.php">
                           <a href='javascript:checkRegistro();' class="btn bg-primary fs-5 text-light">Registrarse</a>
                        </a></div>
                        </div>
                    </div>
                </tr>
            </table>
        </form>
    </div>
</div>
<?echo include "includes/footer.php";?>