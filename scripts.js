$(document).ready(function() {

 var div_box = "<div id='load-screen'><div id='loading'></div></div>";
$("body").prepend(div_box);

$('#load-screen').delay(10000).fadeOut(5000, function(){$(this).remove();
    

});
    
});