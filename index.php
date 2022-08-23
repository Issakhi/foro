 <?php 
      include "includes/conectarbd.php";
      if($_POST['accion']=="buscar"){
        $busqueda = $_POST['busqueda'];

        $q = "SELECT *FROM Post WHERE lenguaje ='".$busqueda."'";

        $consulta = mysqli_query($conbd,$q);

        $ar = $consulta -> fetch_array();

        header('Location:index.php');
      }
      

      $select = "SELECT * FROM Post ORDER BY Fecha DESC";
      
      $posts = mysqli_query($conbd,$select) or die("Error al cargar pagina");
 ?>
 <? include "includes/menu.php";?>
<div class="container mt-5">
  <div class="row ">
    <div class="col-0 ">
        </div>
        <div class="col-10 ">
        <h3 class="monospace">Bienvenido al foro</h3>
        <div class="container"> 
        <div class='card-columns mt-3'>  
<?
       while($r = $posts-> fetch_assoc()){
            
             if($r['imagen']!=""){
              $foto= "imagenes/post/".$r['imagen'];
             }else{
              $foto="";
             }

             if($ar['lenguaje']==$r['lenguaje']){

              if($ar['imagen']!=""){
                $foto= "imagenes/post/".$ar['imagen'];
               }else{
                $foto="";
               }
              echo "
              <div class='card text-center border-warning mt-3'>
              <div class='container'>
              <div class='row'>
              <div class='col-10'></div>
              <div class='col'>
              <h3 class='text-center text-warning'>".$ar['lenguaje']."</h3>
              </div>
              </div>
              </div>
              <div class='card-body'>
              <div class='card-header'>
              <img src='".$foto."' width='100'>
              </div>
              <h4 class='card-title'>".$ar['Titulo']."</h4>
              <p class='card-text'>".$ar['Descripcion']." </p>
              <a href='post.php?articulo=".$ar['id']."' class='btn btn-info'>Leer</a>
              <p class='text-end small'>Fecha: ".fomatofecha($ar['Fecha'])."</p>
              </div>
              </div>";
             }else{

            echo "
            <div class='card text-center border-warning mt-3'>
            <div class='container'>
            <div class='row'>
            <div class='col-10'></div>
            <div class='col bg-warning'>
            <h3 class='text-center text-primary'>".$r['lenguaje']."</h3>
            </div>
            </div>
            </div>
            <div class='card-body'>
            <div class='card-header'>
            <img src='".$foto."' width='100'>
            </div>
            <h4 class='card-title'>".$r['Titulo']."</h4>
            <p class='card-text'>".$r['Descripcion']." </p>
            <a href='post.php?articulo=".$r['id']."' class='btn bg-info'>Leer</a>
            <p class='text-end small'>Fecha: ".fomatofecha($r['Fecha'])."</p>
            </div>
            </div>";}
       }
?>
        </div>
        </div>
        </div>
    <div class="col-2 ">
        <a href="login.php" class="btn fs-3 btnfondo ">LOGIN</a>
    </div>
  </div>
</div>
<div class="mt-5"></div>
<? include "includes/footer.php";?>