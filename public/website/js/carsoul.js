
const swiper = new Swiper('.swiper-container1', {
    // slidesPerView: 3, // Set the default number of images to be shown
    spaceBetween: 20,
     // Adjust the spacing between images (in pixels)
     // Set to true to enable continuous loop mode
    navigation: {
      nextEl: '#swiper-button-next1',
      prevEl: '#swiper-button-prev1',
    },
    breakpoints: {
        640: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 40,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 50,
        },
      },
    autoplay: {
      delay: 3000, // Set the delay between slides (in milliseconds)
    },
  });
  const swiper2 = new Swiper('.swiper-container2', {
    // slidesPerView: 3, // Set the default number of images to be shown
    spaceBetween: 10, // Adjust the spacing between images (in pixels)
    // Set to true to enable continuous loop mode
    navigation: {
      nextEl: '#swiper-button-next2',
      prevEl: '#swiper-button-prev2',
    },
    breakpoints: {
        640: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 40,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 50,
        },
      },
    autoplay: {
      delay: 3000, // Set the delay between slides (in milliseconds)
    },
  });

  const swiper3 = new Swiper('.swiper-container3', {
    slidesPerView:1 , // Set the default number of images to be shown
    spaceBetween: 10, // Adjust the spacing between images (in pixels)
    // Set to true to enable continuous loop mode
    navigation: {
      nextEl: '#swiper-button-next2',
      prevEl: '#swiper-button-prev2',
    },

    autoplay: {
      delay: 3000, // Set the delay between slides (in milliseconds)
    },
  });
