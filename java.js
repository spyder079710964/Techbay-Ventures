const header = document.querySelector("header");

window.addEventListener(
    "scroll", function() {
        header.classList.toggle("sticky", this.window.scrollY > 0);
    }
);

let menu = document.querySelector("#menu-icon");
let navmenu = document.querySelector(".navmenu");

menu.onclick = () => {
    menu.classList.toggle("bx-x");
    navmenu.classList.toggle("open");
};

document.querySelectorAll('.rating').forEach(rating => {
    const stars = rating.querySelectorAll('.bx.bxs-star');

    stars.forEach(star => {
        star.addEventListener('click', () => {
            const index = parseInt(star.getAttribute('data-index'));
            const ratingValue = rating.getAttribute('data-rating');

            // Toggle the selected state of the stars
            for (let i = 0; i < stars.length; i++) {
                if (i < index) {
                    stars[i].classList.add('selected');
                } else {
                    stars[i].classList.remove('selected');
                }
            }
            // Update the rating value
            rating.setAttribute('data-rating', index);

            // Here you can perform further actions like sending the rating to the server
            console.log('Rated:', index);
        });
    });
});

