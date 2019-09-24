$(document).ready(function() {
    var char_valid = new RegExp(/^[0-9A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ\-\s]*$/); 

 $('.nomError').hide();
 $('.nomValide').hide();
$('#login').blur(function() {
 if($('#login').val() == '')
 {
     $('#nomMiss').show();
     $('#nomNull').hide();
     $('#nomSucess').hide();
     $('#nomMiss').addClass('alert alert-danger');
 }
else if(char_valid.test($('#login').val()) == false)
{
    $('#nomNull').show();                          
            $('#nomMiss').hide();
            $('#nomSucess').hide();
            $('#nomNull').addClass('alert alert-warning');
}
else
{
    $('#nomNull').hide();
            $('#nomMiss').hide();
            $('#nomSucess').show();
            $('#nomSucess').addClass('alert alert-success');
}

});



$('.mdpError').hide();
$('.mdpValide').hide();
$('#mdp').blur(function() {
if($('#mdp').val() == '')
{
    $('#mdpMiss').show();
    $('#mdpNull').hide();
    $('#mdpSucess').hide();
    $('#mdpMiss').addClass('alert alert-danger');
}
else if(char_valid.test($('#mdp').val()) == false)
{
   $('#mdpNull').show();                          
           $('#mdpMiss').hide();
           $('#mdpSucess').hide();
           $('#mdpNull').addClass('alert alert-warning');
}
else
{
   $('#mdpNull').hide();
           $('#mdpMiss').hide();
           $('#mdpSucess').show();
           $('#mdpSucess').addClass('alert alert-success');
}

});





});