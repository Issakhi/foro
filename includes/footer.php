<?php
       
if($_POST['accion']=="suscribir"){
    $email = $_POST['email'];

    if($email !=""){
        $introducir ="INSERT INTO Suscribciones (correo) VALUES('".escape_string($email)."')";
       mysqli_query($conbd, $introducir) or die("Error.");
       header("Location:index.php");
    }
}
?>
<footer class="n">
    <div class="container mt-5 p-2">
        <div class="row">
            <div class="col-3 ">
                <h4 class="text-light">Redes sociales:</h4>
                <ul class="navbar-nav">
                    <li>
                        <a href="https://twitter.com/?lang=es" ><img class="mt-2" width="50" height="30" 
                        src="https://w7.pngwing.com/pngs/202/248/png-transparent-twitter-logo-computer-icons-encapsulated-postscript-tweeter-blue-logo-computer-program.png"></a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/" ><img src="http://assets.stickpng.com/images/580b57fcd9996e24bc43c521.png" width="50" height="30"></a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/"><img width="50" height="30" 
                        src="https://cdn-icons-png.flaticon.com/512/355/355994.png"></a>
                    </li>
                </ul>
            </div>
            <div class="col-4">
                <table>
                        <tr>
                            <td>
                                <a href="index.php" class="text-decoration-none text-light fs-4 ">Inicio</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="login.php" class="text-decoration-none text-light fs-4">Iniciar session</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="contacto.php" class="text-decoration-none text-light fs-4">Contacto</a>
                            </td>
                        </tr>
                        
                </table>
            </div>
            <div class="col border p-2">
                <p class="text-light">Recibir últimas novedades:
                </p>
                <form method="post" acction="footer.php" >
                    <input type="hidden" name="accion" value="suscribir">
                    <table>
                        <tr>
                            <td>                     
                            <input type="email" name="email" placeholder="Email" >
                            </td>
                            <td><button type="submit" class="btn bg-info text-light  m-3"> Enviar</button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</footer>
</body>
</html>

