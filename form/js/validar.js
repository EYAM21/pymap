$(document).ready(function(){


$('#validar').click(function(){

alert("prueba");

});

$('#email').blur(function(){

    $.ajax({
        type: "POST",
        url: 'consultas.php',
        data: "email="+$('#email').val(),
        success: function(response)
        {

            if(response==0){

                document.frm.email.value = "EL"

           

       }
});


});

});