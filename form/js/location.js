$(document).ready(function(){


    if ($(window).width() < 1000)

    {

     $(window).attr('location','index-movil.php');
       
     }
     
     
     else 
     
     
     {

        $(window).attr('location','index-pc.php');



     }





})