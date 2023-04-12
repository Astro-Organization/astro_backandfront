// const navLinks = document.querySelectorAll('.nav-link');

// // Add click event listener to each link
// navLinks.forEach(link => {
//   link.addEventListener('click', e => {
//     e.preventDefault(); // prevent default link behavior
//     const href = link.getAttribute('href'); // get link href attribute
//     const target = document.querySelector(href); // find the target element by its ID

//     // remove 'active' class from all links
//     navLinks.forEach(link => {
//       link.classList.remove('active');
//     });

//     // add 'active' class to clicked link
//     link.classList.add('active');

//     // scroll to target element
//     target.scrollIntoView({
//       behavior: 'smooth'
//     });
//   });
// });