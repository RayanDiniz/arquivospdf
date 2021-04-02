function mascara(i){
   
    var v = i.value;
    
    if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
       i.value = v.substring(0, v.length-1);
       return;
    }
    
    i.setAttribute("maxlength", "14");
    if (v.length == 3 || v.length == 7) i.value += ".";
    if (v.length == 11) i.value += "-";
 
};

 /*/Menu Toggle Script
$("#menu-toggle").click(function(e) {
   e.preventDefault();
   $("#wrapper").toggleClass("toggled");
});*/

$('#myCarousel').carousel({
   interval: 10000
 })
 
 $('.carousel .item').each(function(){
   var next = $(this).next();
   if (!next.length) {
     next = $(this).siblings(':first');
   }
   next.children(':first-child').clone().appendTo($(this));
   
   if (next.next().length>0) {
     next.next().children(':first-child').clone().appendTo($(this));
   }
   else {
       $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
   }
 });