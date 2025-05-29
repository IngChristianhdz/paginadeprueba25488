$(document).ready(function(){
   $('.menu_cta li:has(ul)').click(function(e){
       e.preventDefault();
       
       if($(this).hasClass('activado')){
          $(this).removeClass('activado');
          $(this).children('ul').slideUp();
       } else{
           $('.menu_cta li ul').slideUp();
           $('menu_cta li').removeClass('activado');
           $(this).addClass('activado');
           $(this).children('ul').slideDown();
       }
       

       
   }) 
});



    
