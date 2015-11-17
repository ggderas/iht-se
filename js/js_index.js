$(function()
{
  $("#rowPlayas").hide();
  $("#rowRestaurantes").hide();
  $("#rowMundoColonial").hide();
  $("#rowHoteles").hide();

  setInterval(animacionTarjeta, 5000);
  
});

function animacionTarjeta()
{
    try
    {
        //Obtener un numero random en base a las tarjetas
        var randomNumber = Math.floor(Math.random() *  $(".tarjeta").length);

        //Asegurarse que todas las tarjetas no tengan la animacion
        $(".tarjeta").each(function(index){
          $(this).removeClass('tada');
        });

        $(".tarjeta").eq(randomNumber).addClass('tada');

    }
    catch (e)
    {
      console.log(e);
    }
}

function mostrarDiv(id)
{
  //Ocultar el div que esta activo antes de mostrar el nuevo
  $(".contenido").each(function(){
    $(this).hide();
  });

  $("#" + id).show('slow');

}
      //en estos eventos se cargaran las pantallas 
      $("#restaurante").click(function(){  
        alert("playa");
        //$("#caja").load('content/Administracion/administracionPlaya.php');
      })

      $("#playa").click(function(){
        alert("Playa");
        //$("#caja").load('content/index/na.php');
      })

      $("#mundoColonial").click(function(){
        alert("Mundo Colonial");
        //$("#caja").load('content/index/na.php');
      })

      $("#hotel").click(function(){
        alert("Hoteles");
        //$("#caja").load('content/index/na.php');
      })

      $("#administracion").click(function()
      {
        
        $("#contenedor").load("content/administracion/administracion.php");
      })

      $("#inicio").click(function()
      {
        
        $("#contenedor").load("content/inicio/inicio.php");
      })