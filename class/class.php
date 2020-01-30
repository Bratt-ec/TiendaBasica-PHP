<?php

session_start();

class Trabajo
  {
     private $pdo;
     private $datos;

    public function __construct(){

                 $this->datos=array();
                 $host="localhost";
                 $db="carrito02";
                 $username="root";
                 $password="1234";
                 $dsn="mysql:host=$host;dbname=$db";

                 try{
                     $this->pdo=new PDO($dsn,$username,$password);
                     $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
                 }
                  catch (Exeption $e){
                      $this->pdo=null;
                      error_log("Error en la conexión a la bd". $e->getMessage());
                  }
    }


   //metodo para redireccionar cuando no se aga GET.
    private function _redirect(){

           return header("Location:index.php");

      }

    public function getProductos(){

       $sql="SELECT productos.id,productos.producto,productos.precio,
  				productos.vig,fotos.name FROM productos,fotos
  				WHERE productos.id=fotos.idpro
  				ORDER BY rand() LIMIT 0,10";

  	    $stm=$this->pdo->prepare($sql);
        $stm->execute();

         while ($row=$stm->fetch()) {
         	$this->datos[]=$row;
         }

         return $this->datos;
    }


    public function getProductosPorId($id=null){

            $id=(int)$id;
          //validacion para que solo se pueda entrar a alchivo pro.php via get sino se
           //redireciona llamanedo el metodo _redirect();.

            if (empty($id) OR !$id) {

                  $this->_redirect();
            }

            $stm=$this->pdo->prepare("SELECT productos.id,productos.producto,productos.precio,
                                             productos.vig,productos.empresa,productos.idioma,productos.edad,productos.video,
                                             fotos.name FROM productos,fotos WHERE productos.id=fotos.idpro
                                             AND productos.id='".$id."'");
            $stm->execute();

            while ($row=$stm->fetch())
            {
              $this->datos[]=$row;
            }

            //validacion de get para detos que sean superior a los id de db
           if (empty($this->datos)){
               $this->_redirect();
           }
           //***********************************************

            return $this->datos;
    }



    public function carro(){

            if (isset($_GET["id"])) {
                  $id=strip_tags($_GET["id"]);
            }else{
                  $id=1;
            }

            if (isset($_GET["action"])) {
                      $action=strip_tags($_GET["action"]);
            }else{
              $action="";
            }

            //*********************************
            if (isset($_GET["su"])) {

                  $valor=strip_tags($_GET["su"]);
                  $valor=(int)$valor;

                  if ($valor==0 OR $valor=='' OR !$valor) {

                        $action='removeProd';
                  }

            }else{
             $valor=0;
            }

            //**********************************
            switch ($action) {
                    case 'sum':
                         if (isset($_SESSION["carro"][$id])) {

                                $_SESSION["carro"][$id]=$valor;
                        }else{
                                $_SESSION["carro"][$id]=1;
                        }

                    break;

                    case 'add':
                        if(isset($_SESSION["carro"][$id]))

                                 $_SESSION["carro"][$id]++;
                        else
                                 $_SESSION["carro"][$id]=1;
                    break;

                    case 'remove':

                        if (isset($_SESSION["carro"][$id])) {

                                    $_SESSION["carro"][$id]--;

                                if ($_SESSION["carro"][$id]==0) {

                                          unset($_SESSION["carro"][$id]);
                                }
                        }

                    break;

                    case 'removeProd':
                        if (isset($_SESSION["carro"][$id])) {

                                  unset($_SESSION["carro"][$id]);
                        }

                    break;

                    case 'empty':
                           unset($_SESSION["carro"][$id]);

                    break;
            }
       }

    }//end class

?>