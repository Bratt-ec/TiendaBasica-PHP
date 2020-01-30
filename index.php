<?php

 require_once("class/class.php");
 $obj=new Trabajo();
 $productos=$obj->getProductos();

?>

<html>
   <head>
		<title>..::Mi carrito::..</title>
       <link rel="stylesheet" type="text/css" href="css/estilos.css">
   </head>
         <body>
           <div class="cabez">
            <div id="header">
                <?php require_once("header.php") ?>
               <div id="logo">
                  <a class="brand" href="index.php">Carro de compras</a>
               </div>
            </div>
          </div>
              <div id="principal">
                <div id="content">
                    <?php

                     foreach ($productos as $pro):
                    ?>
                      <div class="fotos">
                           <h3><?php echo $pro['producto']; ?></h3>
            						   <img src="fotos/<?php echo $pro['name'].".jpg"; ?>">
                           <p><?php echo $pro["vig"]; ?></p>
                           <p><?php echo $pro["precio"]; ?></p>
                           <a class="btn" href="pro.php?id=<?php echo $pro['id']; ?>">detalle</a>
                      </div>
				          	 <?php
                          endforeach
                    ?>
                </div>
                  <!--********************contenedor****************************************-->
                <footer id="footer">pie de pagina</footer>
              </div>
    </body>
</html>