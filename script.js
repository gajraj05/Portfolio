/**===================== toggle icon navbar =======================*/

let menuIcon = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

menuIcon.onclick = () => {
    menuIcon.classList.toggle('fa-xmark');
    navbar.classList.toggle('active');
}


/**===================== scroll section active link =======================*/

let sections = document.querySelectorAll('section');
let navLinks = document.querySelectorAll('header nav a');

window.onscroll = () => {
    sections.forEach(sec => {
        let top = window.scrollY;
        let offset = sec.offsetTop - 150;
        let height = sec.offsetHeight;
        let id = sec.getAttribute('id');

        if (top >= offset && top < offset + height) {
            navLinks.forEach.apply(links => {
                links.classList.remove('active');
                document.querySelector('header nav a[href*=' + id + ']').classList.add('active');
            });
        };
    });

    /**===================== stickey nav =======================*/

    let header = document.querySelector('header');
    header.classList.toggle('sticky', window.scrollY > 100);

    /**===================== remove toggle icon and navbar =======================*/

    menuIcon.classList.remove('fa-xmark');
    navbar.classList.remove('active');

};

/**===================== scroll to top =======================*/

ScrollReveal({
    distance: '800px',
    duration: 2000,
    delay: 200,
});

ScrollReveal().reveal('.home-content, heading', { origin: 'top' });
ScrollReveal().reveal('.home-img, .services-container, .Portfolio-box, .contact form', { origin: 'button' });
ScrollReveal().reveal('.home-contact h1, .about-img', { origin: 'left' });
ScrollReveal().reveal('.home-contact p, .about-content', { origin: 'right' });


/**===================== typed js =======================*/

const typed = new Typed('.multiple-text',{
    strings: ['Software Developer', 'Data Scientist', 'Web Developer'],
    typeSpeed: 70,
    backSpeed: 70,
    backdelay: 1000,
    loop: true,
});