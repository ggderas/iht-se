$(function()
{
  $("#rowPlayas").hide();
  $("#rowRestaurantes").hide();
  
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

  $("#" + id).hide();
  $("#" + id).show('slow');

}
