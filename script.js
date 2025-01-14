

document.getElementById('searchIcon').addEventListener('click',function(){
    const searchBar = document.getElementById('searchForm');
    searchBar.classList.toggle('active');
    event.stopPropagation(); 
});
document.addEventListener('click',function(event){
    const searchBar =document.getElementById('searchForm');
    const searInput = document.getElementById('searchInput');

    if(!searchBar.contains(event.target) && searchBar.classList.contains('active')){
        searchBar.classList.remove('active');
        searInput.value = '';
    }
});

// Get necessary elements
const prevBtn = document.querySelector('.swiper-button-prev');
const nextBtn = document.querySelector('.swiper-button-next');

new Swiper('.card-wrapper', {
    
    loop: true,
    spaceBetween: 30,
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
      dynamicBullets:true
    },
  
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  
    breakpoints:{
        0:{
            slidesPerView:1
        },
        768:{
            slidesPerView:2
        },
        1024:{
            slidesPerView:3
        },

    }
  });

// Add keyboard event listeners
document.addEventListener('keydown', (event) => {
    if (event.key === 'ArrowLeft') {
      swiper.slidePrev();
    } else if (event.key === 'ArrowRight') {
      swiper.slideNext();
    }
  });
  
  // Prevent default behavior for arrow keys to avoid page scrolling
  document.addEventListener('keydown', (event) => {
    if (['ArrowLeft', 'ArrowRight'].includes(event.key)) {
      event.preventDefault();
    }
  });

//   let Games = {


//     data:[
//       {
//       NameOfTheGame:"Call Of Duty: Warzone",
//       genre:"action",
//       image:"images/CallOfDutyW.jpg",
//     },
//    {
//       NameOfTheGame:"The Sims4",
//       genre:"Social simulation",
//       image:"images/Sims4.jpg",
//     },
//     {
//       NameOfTheGame:"Team Fortres",
//       genre:"action",
//       image:"images/tf2.jpg",
     
//     },
//     {
//       NameOfTheGame:"Call Of Duty: Warzone",
//       genre:"multiplayer",
//       image:"images/CallOfDutyW.jpg",
//     },
//     {
//       NameOfTheGame:"Team Fortres",
//       genre:"multiplayer",
//       image:"images/tf2.jpg",
     
//     },

//   ],
// };

// for(let i of Games.data){
//   //create card
//   let card = document.createElement("div");
//   card.classList.add("card",i.genre,"hide");
//   //image div
//   let imgContainer = document.createElement("div");
//   imgContainer.classList.add("image-container");

//   //img tag
//   let image = document.createElement("img");
//   image.setAttribute("src", i.image);
//   imgContainer.appendChild(image);
//   card.appendChild(imgContainer);

//   //container
//   let container = document.createElement("div");
//   container.classList.add("container");

//   //product name

//   let name = document.createElement("h5");
//   name.classList.add("Game-name");
//   name.innerText = i.NameOfTheGame.toUpperCase();
//   container.appendChild(name);
//   card.appendChild(container);
//   document.getElementById("games").appendChild(card);
// }


// function filterGames(value){
//   let buttons = document.querySelectorAll(".button-value");
//   buttons.forEach((button) =>{
//     //check if value equals innerText
//     if(value.toUpperCase() == button.innerText.toUpperCase()){
//       button.classList.add("active");
//     }
//     else{
//       button.classList.remove("active");
//     }
//   });


// let elements = document.querySelectorAll(".card");
// elements.forEach((element) =>{
//   if(value == "all"){
//     element.classList.remove("hide");
//   } else{
//     if(element.classList.contains(value)){
//       element.classList.remove("hide");
//     } else{
//     //hide other
//     element.classList.add("hide");
//   }
// }
// });
// }
// //intially display all products

// window.onload = () =>{
//   filterGames("all");
// };

const selectBox = document.querySelector('.select-box');
const selectOption = document.querySelector('.select-option');
const soValue = document.querySelector('#soValue');
const optionSearch = document.querySelector('#optionSearch');
const options = document.querySelector('.options');
const optionsList = document.querySelectorAll('.options li');


selectOption.addEventListener('click',function(){
  selectBox.classList.toggle('active');
});

optionsList.forEach(function(optionsListSingle){
  optionsListSingle.addEventListener('click',function(){
    text = this.textContent;
    soValue.value = text;
    selectBox.classList.remove('active');
  })
});

optionSearch.addEventListener('keyup',function(){
  var filter, li, i, textvalue;
  filter = optionSearch.value.toUpperCase();
  li = options.getElementsByTagName('li');
  for(i=0; i<li.length; i++){
    liCount = li[i];
    textvalue = liCount.textContent || liCount.innerText;
    if(textvalue.toUpperCase().indexOf(filter) > -1){
      li[i].style.display = '';
    }else{
      li[i].style.display = 'none';
    }
  }
});


// Select all heart buttons
const heartButtons = document.querySelectorAll('.heart-button');

// Add event listeners to each heart button
heartButtons.forEach((button) => {
    button.addEventListener('click', () => {
        // Get the <i> icon inside the button
        const icon = button.querySelector('i');

        // Toggle between unfilled and filled heart classes
        if (icon.classList.contains('bx-heart')) {
            icon.classList.remove('bx-heart');        // Remove unfilled heart
            icon.classList.add('bxs-heart');          // Add filled heart
        } else {
            icon.classList.remove('bxs-heart');       // Remove filled heart
            icon.classList.add('bx-heart');           // Add unfilled heart
        }
    });
});

/****Profile***/


