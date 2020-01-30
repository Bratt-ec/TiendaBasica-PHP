<?php

 require_once("class/class.php");
 $obj=new Trabajo();

?>

 <div id="prin_tabla" class="producto">
        <div id="tabla">
             <?php $obj->carro(); ?>
                <?php
                  if (isset($_SESSION["carro"])) {
                        $totalcoste=0;
                        $Total=0;
                ?>
              <table border="0">
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Peticion Normal</th>
                            <th>Ajax</th>
                            <th>&nbsp;</th>
                            <th>Total</th>
                        </tr>

                        <?php
                            foreach ($_SESSION["carro"] as $key=>$valor) {
                                   $fi=$obj->getProductosPorId($key);
                                    foreach($fi as $fila){

                                         $id=$fila["id"];
                                         $producto=$fila["producto"];
                                         $precio=$fila["precio"];

                                    }

                                    $coste=$precio*$valor;
                                    $totalcoste=$totalcoste+$coste;
                                    $Total=$Total+$valor;
                        ?>

                            <tr>
                              <td><?php echo $producto; ?></td>
                              <td><?php echo $valor; ?></td>
                              <td>
                                  <a href="?id=<?php echo $id ?>&action=add"><img src="img/aumentar.png" alt="aumentar" title="aumentar"></a>
                                  <a href="?id=<?php echo $id ?>&action=remove"><img src="img/restar.png" alt="restar" title="restar"></a>
                                  <a href="?id=<?php echo $id ?>&action=removeProd"><img src="img/eliminar.png" alt="eliminar" title="eliminar"></a>
                              </td>
                              <td>
                                 <input onchange="add3(<?php echo $id ?>,'sum',$(this).val());" type="text" value="<?php echo $valor; ?>" class="input">
                                 <img onclick="add(<?php echo $id ?>,'add');" src="img/aumentar.png" alt="aumentar" title="aumentar">
                                 <img onclick="add(<?php echo $id ?>,'remove');" src="img/restar.png" alt="restar" title="restar">
                                 <img onclick="add(<?php echo $id ?>,'removeProd');" src="img/eliminar.png" alt="eliminar" title="eliminar">
                              </td>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;=</td>
                              <td style="width: 10px"><?php echo $coste ?></td>
                            </tr>

                        <?php } ?>

                           <tr>
                             <td colspan="5">Total</td>
                             <td><?php echo $totalcoste ?></td>
                           </tr>
              </table>
                     </div>
                         <?php
                              }
                             $_SESSION['totalcoste']=$totalcoste;
                             $_SESSION['cantidadTotal']=$Total;
                         ?>
                      </div>




