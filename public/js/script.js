$('.nav-link').on('.nav-item', 'click', function(){
    $('.nav-link').removeClass('active');
    $(this).addClass('active');

    let kategori = $(this).html();
    $('#judul').html(kategori);


    
});
