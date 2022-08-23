<?php
    include "includes/conectarbd.php";
if ($_POST['accion'] == "contactar") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];
    $fecha = date("y/n/j");
    $hora = date("H:i:s");

    $ins = "INSERT INTO Contacto(nombre,email,mensaje,fecha,hora) 
                VALUES('" . $nombre . "','" . $email . "','" . $mensaje . "','" . $fecha . "','" . $hora . "')";

    mysqli_query($conbd, $ins) or die("ERROR: al enviar mensaje");
    header('Location:index.php');
}
?>

<? include "includes/menu.php"; ?>

<div class="container mt-5 ">
    <div class="row">
        <div class="col"></div>
        <div class="col">
            <h3 class="fs-3">Contacto:</h3>
            <form method="post" acction="footer.php">
                <input type="hidden" name="accion" value="contactar">
                <table>
                    <tr>
                        <td>
                            <input type="text" name="nombre" placeholder="Nombre" maxlength="12">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="email" name="email" placeholder="Email" class="mt-2">
                        </td>
                    </tr>
                    </tr>
                    <tr>
                        <td><textarea name="mensaje" class="mt-2 " rows="6" cols="45" placeholder="Mensaje"></textarea></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="text-end"><button type="submit" class="btn bg-info text-light "> Enviar mensaje </button></div>
                        </td>
                    </tr>
                </table>
            </form>


        </div>
        <div class="col"></div>
    </div>
</div>
<? include "includes/footer.php"; ?>