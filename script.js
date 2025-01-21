document.addEventListener('DOMContentLoaded', () => {
  // Toggle search bar visibility
  const searchIcon = document.getElementById('searchIcon');
  const searchBar = document.getElementById('searchForm');
  const searchInput = document.getElementById('searchInput');

  if (searchIcon && searchBar) {
      searchIcon.addEventListener('click', (event) => {
          searchBar.classList.toggle('active');
          event.stopPropagation();
      });

      document.addEventListener('click', (event) => {
          if (!searchBar.contains(event.target) && searchBar.classList.contains('active')) {
              searchBar.classList.remove('active');
              if (searchInput) searchInput.value = '';
          }
      });
  }

  // Initialize Swiper
  new Swiper('.card-wrapper', {
      loop: true,
      spaceBetween: 30,
      pagination: {
          el: '.swiper-pagination',
          clickable: true,
          dynamicBullets: true,
      },
      navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
      },
      breakpoints: {
          0: { slidesPerView: 1 },
          768: { slidesPerView: 2 },
          1024: { slidesPerView: 3 },
      },
  });

  // Add keyboard navigation for Swiper
  document.addEventListener('keydown', (event) => {
      const swiper = document.querySelector('.swiper').swiper;
      if (swiper) {
          if (event.key === 'ArrowLeft') swiper.slidePrev();
          else if (event.key === 'ArrowRight') swiper.slideNext();
      }

      // Prevent page scrolling for arrow keys
      if (['ArrowLeft', 'ArrowRight'].includes(event.key)) {
          event.preventDefault();
      }
  });

  // Select and filter functionality
  const selectBox = document.querySelector('.select-box');
  const selectOption = document.querySelector('.select-option');
  const soValue = document.querySelector('#soValue');
  const optionSearch = document.querySelector('#optionSearch');
  const options = document.querySelector('.options');
  const optionsList = document.querySelectorAll('.options li');

  if (selectOption && optionsList && selectBox) {
      selectOption.addEventListener('click', () => {
          selectBox.classList.toggle('active');
      });

      optionsList.forEach((option) => {
          option.addEventListener('click', function () {
              const text = this.textContent;
              if (soValue) soValue.value = text;
              selectBox.classList.remove('active');
          });
      });

      if (optionSearch && options) {
          optionSearch.addEventListener('keyup', function () {
              const filter = optionSearch.value.toUpperCase();
              const li = options.getElementsByTagName('li');
              for (let i = 0; i < li.length; i++) {
                  const textValue = li[i].textContent || li[i].innerText;
                  li[i].style.display = textValue.toUpperCase().includes(filter) ? '' : 'none';
              }
          });
      }
  }

  // Heart button toggle
  const heartButtons = document.querySelectorAll('.heart-button');
  heartButtons.forEach((button) => {
      button.addEventListener('click', () => {
          const icon = button.querySelector('i');
          if (icon) {
              icon.classList.toggle('bx-heart');
              icon.classList.toggle('bxs-heart');
          }
      });
  });
});
