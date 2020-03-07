$(function(){
    $("#menu").on("click" , function(){
      $(this).toggleClass("active");
      $("body").toggleClass("nav-open");
    });
  });