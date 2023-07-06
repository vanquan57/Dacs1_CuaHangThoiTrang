function showMenu(menuId, iconId) {
  var menu = document.getElementById(menuId);
  menu.classList.toggle("show");

  var chevronIcon = document.getElementById(iconId);
  chevronIcon.classList.toggle("rotate");
}
function showMenuGirls() {
  var menuGirls = document.getElementById("menu-girls");
  var chevronIconGirls = document.getElementById("chevron-icon-girls");

  menuGirls.classList.toggle("showgirl");
  chevronIconGirls.classList.toggle("rotategirl");
}
// End Header
var swiper = new Swiper(".mySwiper", {
  spaceBetween: 30,
  centeredSlides: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
// End Swiper
var swiper = new Swiper(".mySwiper_", {
  spaceBetween: 30,
  slidesPerView: 3,
  breakpoints: {
    1024: {
      slidesPerView: 3
    },
    576: {
      slidesPerView: 2
    },
    320: {
      slidesPerView: 1
    }
  }
});
// End Swiper selling
var swiper = new Swiper(".mySwiper_news", {
  slidesPerView: 1,
  spaceBetween: 30,
  keyboard: {
    enabled: true,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
// Boys
function toggleDiv(divId) {
  var div = document.getElementById(divId);
  var icon = div.previousElementSibling.querySelector("i");

  if (div.style.display === "none") {
    div.style.display = "block";
    setTimeout(function () {
      div.style.opacity = "1";
      div.style.transform = "translateY(0)";
      icon.style.transform = "rotate(180deg)";
    }, 10);
  } else {
    div.style.opacity = "0";
    div.style.transform = "translateY(-10px)";
    icon.style.transform = "rotate(0)";

    setTimeout(function () {
      div.style.display = "none";
    }, 300);
  }
}
// RangeInput

// outletsale
var swiper = new Swiper(".mySwiper__1", {
  spaceBetween: 20,
  centeredSlides: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
function displayEnlarged(imageSrc, enlargedImageId) {
  var enlargedImageDiv = document.getElementById(enlargedImageId);
  enlargedImageDiv.innerHTML = '<img src="' + imageSrc + '" alt="" style="width: 100%; height: 100%;"> ';
  enlargedImageDiv.style.display = 'block';
  
  var images = document.querySelectorAll('.swiper-slide img');
  images.forEach(function (image) {
    image.addEventListener('click', function () {
      images.forEach(function (img) {
        img.classList.remove('active-image');
      });
      this.classList.add('active-image');
    });
  });
}
