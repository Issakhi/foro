<?php
session_start();
    include "includes/conectarbd.php";
    
     
     if($_POST['accion']=="iniciar"){
         $email = $_POST['email'];
         $pass = $_POST['pass'];

        $q= " SELECT id FROM Usuarios where Email='".$email."' AND Pass='".$pass."'";
        
        $consulta = mysqli_query($conbd,$q) or die("ERROR!");
        $usuario = $consulta-> fetch_assoc();
        echo "*********************".$cuenta = count($usuario);
        $id = $usuario['id'];
        
        if($email !="" && $pass !=""){

        if($cuenta == 1 ){
        
           $_SESSION['verifi'] = "true";
           $_SESSION['id']= $id;
           header("Location:perfil.php?perfil=".$id);
        }else{
            echo "Error: Este correo electronico pose más de una cuenta";
        }
    }else{
        $ms= "<p class='text-danger'>Complete todos los campos</p>";
    }
    }

     
?>
<? include "includes/menu.php";?>
<div class="container">
<div class="abs-center">
        <form method="post" action="login.php" class="border p-3 form" id="formLogin">
        <input type="hidden" name="accion" value="iniciar">
        <?echo $ms;?>
         <p class="text-danger" id="errorLogin"></p>
            <table>
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="correo" class="form-control">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="pass" id="cont" class="form-control">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <a href="registro.php">
                            <button type="button" class="btn bg-primary text-light fs-5 mt-3">Registrarse</button>
                        </a>
                    </td>
                    <td>
                        <button class="btn text-light fs-5 mt-3 btnfondo" type="submit"> LOGIN</button>
                    </td>
                </tr>
        </table>
        </form>
    </div>
</div>
<? include "includes/footer.php";?>