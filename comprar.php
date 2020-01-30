<?php

 require_once("class/class.php");
 $obj=new Trabajo();

?>

<html>
   <head>
		<title>..::Mi carrito::..</title>
       <link rel="stylesheet" type="text/css" href="css/estilos.css">
       <link rel="stylesheet" type="text/css" href="css/detalle.css">
       <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
       <script type="text/javascript" src="js/funciones.js"></script>
   </head>
        <body>
          <div class="cabez">
            <div id="header">
               <div id="logo">
                  <a class="brand" href="index.php">Carro de compras</a>
               </div>
            </div>

          </div>
             <div id="principal">
                <div id="content">
                   <div id="contenedor">
                    <br>
                    <form name='formTpv' method='post' action='https://www.sandbox.paypal.com/cgi-bin/webscr' style="border: 1px solid #CECECE;padding-left: 10px;">
                        <input name="cmd" type="hidden" value="_cart">
                        <input name="upload" type="hidden" value="1">
                        <input name="business" type="hidden" value="vender@hotmail.com">
                        <input name="shopping_url" type="hidden" value="http://localhost/mitienda/productos.php">
                        <input name="currency_code" type="hidden" value="EUR">
                        <input name="return" type="hidden" value="http://localhost/mi_carrito/exito.php">
                        <input type='hidden' name='cancel_return' value='http://localhost/mi_carrito/errorPaypal.php'>
                        <input name="notify_url" type="hidden" value="http://localhost/mi_carrito/paypalipn.php">
                        <input name="rm" type="hidden" value="2">

                        <?php
                            $contador = 0;
                            foreach($_SESSION['carro'] as $key=>$valor){
                                    $contador ++;
                                    $fi=$obj->getProductosPorId($key);
                                    foreach($fi as $fila){
                                    $id=$fila['id'];
                                    $producto=$fila['producto'];
                                    $precio=$fila['precio'];
                            }
                       ?>

                      <input name="item_number_<?php echo $contador; ?>" type="hidden" value="<?php echo $id; ?>">
                      <input name="item_name_<?php echo $contador; ?>" type="hidden" value="<?php echo $producto; ?>">
                      <input name="amount_<?php echo $contador; ?>" type="hidden" value="<?php echo $precio; ?>">
                      <input name="quantity_<?php echo $contador; ?>" type="hidden" value="<?php echo $valor; ?>">

                      <?php
                          }
                      ?>
                      <input type="submit" value="PayPal SandBox">-
                    </form>
              </div>
   <!--********************contenedor****************************************-->
              <footer id="footer">pie de pagina</footer>
         </div>
     </body>
</html>