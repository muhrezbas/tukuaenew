$(function(){
    $('.navbar').affix({
      offset: {
        /* Affix the navbar after scroll below header */
        top: $("header").outerHeight(true)}
    });
});