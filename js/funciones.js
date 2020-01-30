function add(valor,valor2){

   $.get('add.php',{id:valor,action:valor2},function(data){
              $('.producto').html(data);
   })

}

function add2(valor,valor2){

  $.get('add.php',{id:valor,action:valor2},function(data){
       window.location='carrito.php';
  })

}

function add3(valor,valor2,valor3){

       $.get('add.php',{id:valor,action:valor2,su:valor3},function(data){
            $('.producto').html(data);
       })

}