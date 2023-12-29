// SLIDE DAS IMAGENS A CIMA
let count = 1;
document.getElementById("radio1").checked = true;
/*CONTADOR*/
setInterval(function () {
    nextImage();
}, 2000)

function nextImage() {
    count++;
    if (count > 4) {
        count = 1;
    }
    document.getElementById("radio" + count).checked = true;
}

$('#carousel-modafeminina').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    prevArrow: $('#modafeminina-prev'),
    nextArrow: $('#modafeminina-next'),
    responsive: [
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1
            }
        }
    ]
});

$('#carousel-modamasculina').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    prevArrow: $('#modamasculina-prev'),
    nextArrow: $('#modamasculina-next'),
    responsive: [
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1
            }
        }
    ]
});


$('#carousel-higiene').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    prevArrow: $('#higiene-prev'),
    nextArrow: $('#higiene-next'),
    responsive: [
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1
            }
        }
    ]
});

$('#carousel-eletronicos').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    prevArrow: $('#eletronicos-prev'),
    nextArrow: $('#eletronicos-next'),
    responsive: [
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1
            }
        }
    ]
});

$('.swiper-button-next').click(function () {
    var carouselId = $(this).closest('.product-carousel').attr('id');
    $('#' + carouselId).slick('slickNext');
});

$('.swiper-button-prev').click(function () {
    var carouselId = $(this).closest('.product-carousel').attr('id');
    $('#' + carouselId).slick('slickPrev');
});