$(document).ajaxStart(function() { Pace.restart(); });
$('body').tooltip({ selector: '[data-toggle=tooltip]' }); 
$(()=>{
    $('form').submit(function(){
        Pace.restart();
    });
});