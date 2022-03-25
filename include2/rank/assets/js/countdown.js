setInterval(function time(){
  var d = new Date();
  var horaa = d.getHours();
  var hours = 20 - d.getHours();
  var min = 60 - d.getMinutes();
  if((min + '').length == 1){
    min = '0' + min;
  }
  var sec = 60 - d.getSeconds();
  if((sec + '').length == 1){
        sec = '0' + sec;
  }
    if(horaa == 20){
		hours = 24;}
		
	else if(horaa == 21){
		 hours = 23;}
		
	else if(horaa == 22){
		 hours = 22;}
		
	else if(horaa == 23){
		 hours = 21;}

  
  jQuery('#battlearena p').html('Inicia em: '+hours+'hrs, '+min+'min, '+sec+'seg')
}, 1000);

setInterval(function time(){
  var d = new Date();
  var horaa = d.getHours();
  var hours = 19 - d.getHours();
  var min = 60 - d.getMinutes();
  if((min + '').length == 1){
    min = '0' + min;
  }
  var sec = 60 - d.getSeconds();
  if((sec + '').length == 1){
        sec = '0' + sec;
  }
	if(horaa == 19){
		hours = 24;}
		
	else if(horaa == 20){
		hours = 23;}
		
	else if(horaa == 21){
		hours = 22;}
		
	else if(horaa == 22){
		hours = 21;}
		
	else if(horaa == 23){
		hours = 20;}
		
  jQuery('#bossmundo p').html('Nasce em: '+hours+'hrs, '+min+'min, '+sec+'seg')
}, 1000);