<?php
    
     define('DB','foro');
     define('HOST',"127.0.0.1");
     define('USER',"root");
     define('PASS',"");

     $conbd = new mysqli(HOST,USER,PASS,DB) or die("Error");

     function escape_string($string){
          global $conbd;
          return mysqli_real_escape_string($conbd,$string);
     }

     function fomatofecha($fecha){
         $fch= explode("-",$fecha);
         $fechaFinal= $fch['2']."-".$fch['1']."-".$fch['0'];
         return $fechaFinal;
     }

?>