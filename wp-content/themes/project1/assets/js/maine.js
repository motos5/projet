$(function(){
// Реализация TABS============================
$('.archive-content__buttons-link').on('click', function(e){
    e.preventDefault();
    $('.archive-content__buttons-link').removeClass('is-active');
    $(this).addClass('is-active');
    $('.archive-content__list').removeClass('is-active');
    $($(this).attr('href')).addClass('is-active');
    
  });
// Реализация TABS============================
});
