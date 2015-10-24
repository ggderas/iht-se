$(function()
{
  setInterval(animacionTarjeta, 2000);
});

function animacionTarjeta()
{
  //Obtener un numero random en base a las tarjetas
  var randomNumber = Math.floor(Math.random() *  $(".tarjeta").length);

  /*
  * //Generar animacion de la tarjeta con numero randomNumber
  * y asegurarse que los hermanos no tengan la animacion
  */
  $(".tarjeta").eq(randomNumber).addClass('tada').siblings().removeClass('tada');
}
