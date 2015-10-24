$(function(){

  //Animacion de los rows de Mision y VIsion
  $("#rowMision").hide();
  $("#rowMision").removeClass('hidden', function(){
      $("#rowMision").fadeIn('slow');
  });
  $("#rowMision").show('slow');



  $("#rowVision").hide();
  $("#rowVision").removeClass('hidden', function(){
      $("#rowVision").fadeIn('slow');
  });
  $("#rowVision").show('slow');

});
