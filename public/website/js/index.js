
function addScriptToHeadOnce() {
    // Check if the script has already been loaded
    if (!localStorage.getItem('scriptLoaded')) {
      // Create the script element
      var scriptTag = document.createElement('script');
      scriptTag.src = 'https://cdn.tailwindcss.com';

      // Add the script element to the <head> section
      document.head.appendChild(scriptTag);

      // Set an item in localStorage to indicate that the script has been loaded
      localStorage.setItem('scriptLoaded', 'true');
    }
  }

  // Call the function to add the script on the first page load
  addScriptToHeadOnce();








  function hideSearch_dialoag() {

    document.getElementById('search_dialoag').style.display = 'none'

  }
  function toggleSearchDialog(mood) {

    const sell = document.getElementById('sell')
    const rent = document.getElementById('rent')
  if (mood == "sell") {
    rent.style.background='white'
    rent.style.color='black'
    sell.style.background = '#6f10a2'
    sell.style.color='white'
    document.getElementById('search_dialoag').style.display = 'flex'
  }else{
    sell.style.background='white'
    sell.style.color='black'
    rent.style.background = '#6f10a2'
    rent.style.color='white'
    document.getElementById('search_dialoag').style.display = 'flex'
  }

  }

  function makeCall(phoneNum) {
    window.open(`tel:${phoneNum}`)

  }


  function toggleMenuSM() {
    const menuSm =document.getElementById('menuSm')
    .classList.toggle("hidden");

  }


  function toggleDropdown(container) {
    const dropdownContainer = document.querySelector(container);
    dropdownContainer.classList.toggle("hidden");
  }


  // ________________Nav bar end________________________



  function loadComponent(path,container) {
    fetch(path) // Replace 'path/to/header.html' with the actual path to your header component
      .then(response => response.text())
      .then(data => {
        let divContainer = document.getElementById(container);

        divContainer.innerHTML = data;
      })
      .catch(error => console.error('Error loading header component:', error));

  }
  function loadSlider(path,container,items) {
    fetch(path) // Replace 'path/to/header.html' with the actual path to your header component
      .then(response => response.text())
      .then(data => {
        let divContainer = document.getElementById(container);
        divContainer.innerHTML = data;
        items.map((item)=>{
          const temp = document.createElement('li')
          temp.classList.add('card')
          temp.innerHTML = `
          <div class="hover:scale-125 transition-all rounded-lg "><img src="${item.img}" alt="img" draggable="false"></div>
            <h2>${item.title}   <i class="fa-solid fa-location"></i></h2>
          `
          document.querySelector('ul.carousel').appendChild(temp)
        })


      })
      .catch(error => console.error('Error loading header component:', error));


  }



  /* scroll animiton */
  function isElementInViewport(element) {
    var rect = element.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  }

  // Function to handle the scroll event
  function handleScroll() {
    var elementsToAnimate = document.querySelectorAll('.fade-in');

    for (var i = 0; i < elementsToAnimate.length; i++) {
      if (isElementInViewport(elementsToAnimate[i])) {
        elementsToAnimate[i].classList.add('keep-visible');
      }
    }
  }

  // Attach the scroll event listener
  window.addEventListener('scroll', handleScroll);


  function goToLink(link) {
    window.open(link)
    console.log(link)

  }




  function togglePopUp(popUpId) {
    document.getElementById('popUp').classList.toggle('hidden')
    document.getElementById(popUpId).classList.toggle('hidden')
    console.log('test')

  }

