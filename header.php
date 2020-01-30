 <div id="cart">
        <img src="img/cart.png">
           <?php
             if (isset($_SESSION["cantidadTotal"]))
                 {
             ?>
                <p>&nbsp; total: <?php echo $_SESSION["cantidadTotal"]; ?></p>
                <p>&nbsp; $     <?php echo $_SESSION["totalcoste"]; ?></p>
             <?php
                }else{
             ?>
                <p>&nbsp; total: 0</p>
                <p>&nbsp; $     0</p>
          <?php } ?>
</div>