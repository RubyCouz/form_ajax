$(document).ready(function() {
    var char_valid = new RegExp(/^[0-9A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ\-\s]*$/); 
    var mail_valid = new RegExp(/^([A-Za-z0-9_-]+[.]*[éA-Za-z0-9_-]*\@[éA-Za-z0-9_-]+[.]*[éA-Za-z0-9_-]*\.[a-zA-Z]{2,4})*$/);

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


$('.mdp_bisError').hide();
$('.mdp_bisValide').hide();
$('#mdp_bis').blur(function() {
if($('#mdp_bis').val() == '')
{
    $('#mdp_bisMiss').show();
    $('#mdp_bisNull').hide();
    $('#mdp_bisSucess').hide();
    $('#mdp_bisMiss').addClass('alert alert-danger');
}
else if(char_valid.test($('#mdp_bis').val()) == false)
{
   $('#mdp_bisNull').show();                          
           $('#mdp_bisMiss').hide();
           $('#mdp_bisSucess').hide();
           $('#mdp_bisNull').addClass('alert alert-warning');
}
else
{
   $('#mdp_bisNull').hide();
           $('#mdp_bisMiss').hide();
           $('#mdp_bisSucess').show();
           $('#mdp_bisSucess').addClass('alert alert-success');
}

});


$('.emailError').hide();
$('.emailValide').hide();
$('#email').blur(function() {
if($('#email').val() == '')
{
    $('#emailMiss').show();
    $('#emailNull').hide();
    $('#emailSucess').hide();
    $('#emailMiss').addClass('alert alert-danger');
}
else if(mail_valid.test($('#email').val()) == false)
{
   $('#emailNull').show();                          
           $('#emailMiss').hide();
           $('#emailSucess').hide();
           $('#emailNull').addClass('alert alert-warning');
}
else
{
   $('#emailNull').hide();
           $('#emailMiss').hide();
           $('#emailSucess').show();
           $('#emailSucess').addClass('alert alert-success');
}

});




});