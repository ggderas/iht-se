$(function()
{
  setInterval(animacionTarjeta, 2000);
});

function animacionTarjeta()
{
  //Obtener un numero random en base a las tarjetas
  var randomNumber = Math.floor(Math.random() *  $(".tarjeta").length);
  $(".tarjeta").eq(randomNumber).addClass('tada').siblings().removeClass('tada');
}
