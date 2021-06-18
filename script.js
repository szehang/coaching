$("div #card1").hover(function(){
    $(this).css("width", "21rem");
    $(this).css("cursor", "pointer");
});
$("div #card1").mouseout(function(){
    $(this).css("width", "18rem");
});

$("div #card2").hover(function(){
    $(this).css("width", "21rem");
    $(this).css("cursor", "pointer");
});
$("div #card2").mouseout(function(){
    $(this).css("width", "18rem");
});

$("div #card3").hover(function(){
    $(this).css("width", "21rem");
    $(this).css("cursor", "pointer");
});
$("div #card3").mouseout(function(){
    $(this).css("width", "18rem");
});

$("#logoutBtn").hover(function(){
	$(this).css("color", "red");
});

$("#logoutBtn").mouseout(function(){
	$(this).css("color", "white");
});


// $(document).ready(() => {
//   $('.carousel').carousel({
//      interval: 3000
//   });
// });

$(document).ready(function() {
    
    /* Every time the window is scrolled ... */
    $(window).scroll( function(){
    
        /* Check the location of each desired element */
        $('.hideme').each( function(i){
            
            var bottom_of_object = $(this).position().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();

            /* If the object is completely visible in the window, fade it it */
            if( bottom_of_window > bottom_of_object ){
                
                $(this).animate({'opacity':'1'},500);
                    
            }
            
        }); 
    
    });
    
});

$("#courseBtn").click(function(){
  window.location = "createCourseForm.php";
});

$(".createCourseForm #courseCategory").change(function(){
  var selected = $(".createCourseForm #courseCategory");

  if (selected.val() == "other"){
    $(".otherCate").css("display", "block");
  }else{
    $(".otherCate").css("display", "none");
  }
});

$("#otherCateValue").blur(function(){
  var otherValue = $("#otherCateValue").val();
  $("#otherCate").attr("value", otherValue);
});

$(".discoverAnchor img").hover(function(){
  $(this).css("box-shadow", "0px 0px 0px 6px #565656");
  $(this).css("transition", "0.5s ease");
});

$(".discoverAnchor img").mouseout(function(){
  $(this).css("transition", "0.5s ease");
  $(this).css("box-shadow", "none");
});


function classToggle() {
  var el = document.querySelector('.icon-cards__content');
  el.classList.toggle('step-animation');
}

