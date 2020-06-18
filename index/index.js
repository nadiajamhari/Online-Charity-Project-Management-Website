$(window).scroll(function(){
    $('nav').toggleClass('scrolled',$(this).scrollTop()>585)
});

$(window).scroll(function(){
    $('#register').toggleClass('scrolled',$(this).scrollTop()>585)
});

var data = document.getElementById("login");

data.addEventListener('click',change);

function change(){

    var data1 = document.getElementByTag("nav");
    data1.toggleClass('fixed-top.position');
    
}