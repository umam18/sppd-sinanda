$(document).ready(function() {

$(".next_btn").click(function() { // Function Runs On NEXT Button Click
    $(this).parent().next().fadeIn('slow');
    $(this).parent().css({
    'display': 'none'
});

// Adding Class Active To Show Steps Forward;
$('.active').next().addClass('active');
});

$(".pre_btn").click(function() { // Function Runs On PREVIOUS Button Click
    $(this).parent().prev().fadeIn('slow');
    $(this).parent().css({
    'display': 'none'
});
// Removing Class Active To Show Steps Backward;
$('.active:last').removeClass('active');
});

});