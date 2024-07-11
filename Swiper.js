

const swiper = new Swiper('.swiper-container', {
    slidesPerView: 3,
    spaceBetween: 25,
    centeredSlides: true,
    scroll: true,
    loop:true,
    freemode: true,
    navigation: {
        prevEl: ".swiper-button-prev",
        nextEl: ".swiper-button-next",
      },
      autoplay:{
        delay:1000,
        disableOnInteraction: false,
      },
      
    freeMode: true,
    freeModeMomentum: true,
    on: {
        slideChangeTransitionEnd: function () {
            let slides = document.querySelectorAll('.swiper-slide');
            slides.forEach(slide => slide.style.transform = 'scale(1)');
            slides.forEach(slide => slide.style.filter = '');

            let iteminfo = document.querySelectorAll('.iteminfo');
            iteminfo.forEach(item => item.style.display = 'none');


            let activeSlide = document.querySelector('.swiper-slide-active');
            activeSlide.style.transform = 'scale(2.5)';
            activeSlide.style.filter = 'drop-shadow(0px 0px 10px black)'
            // activeSlide.style.transform = 'translateY(10px)'
           
            let activeiteminfo = activeSlide.querySelector('.iteminfo')
                activeiteminfo.style.display = 'block';
            // let activeItemInfo = document.getElementById('active-item-info');
            // let activeItemName = document.getElementById('active-item-name');
            // let activeItemPrice = document.getElementById('active-item-price');

            // activeItemName.textContent = name;
            // activeItemPrice.textContent = price;

            // activeItemInfo.style.display = 'block';
        }
    }
});

////////////////////////////////////////////////////
