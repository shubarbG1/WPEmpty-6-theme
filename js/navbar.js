// MOBILE MENU
// Open Mobile Menu from hamburger
document.addEventListener("DOMContentLoaded", function () {
    const hamburger = document.querySelector(".hamburger");
    const navLinks = document.querySelector(".nav-links");
    const header = document.querySelector("header");

    function toggleClasses() {
        hamburger.classList.toggle("active");
        navLinks.classList.toggle("show-menu");
        header.classList.toggle("show-overlay");
    }

    hamburger.addEventListener("click", toggleClasses);

    document.addEventListener("click", (event) => {
        if (!navLinks.contains(event.target) && !hamburger.contains(event.target) && navLinks.classList.contains("show-menu")) {
            toggleClasses();
        }
    });
});

// Open Dropdown in Mobile version
document.addEventListener("DOMContentLoaded", function () {
    // Get elements
    const mobileMenuToggle = document.querySelector(".mobile-menu-toggle");
    const primaryMenu = document.querySelector(".primary-menu");
    const subMenuParents = document.querySelectorAll(".menu-item-has-children");

    // Function to toggle sub-menu visibility
    function toggleSubMenu(subMenu) {
        subMenu.classList.toggle("toggle");
    }

    // Click event for mobile menu toggle button
    if (mobileMenuToggle && primaryMenu) {
        mobileMenuToggle.addEventListener("click", function (event) {
            event.preventDefault();
            toggleSubMenu(primaryMenu);
        });
    }

    // Click event for menu items with children
    subMenuParents.forEach((subMenuParent) => {
        const subMenu = subMenuParent.querySelector(".sub-menu");
        if (subMenu) {
            subMenuParent.addEventListener("click", function (event) {
                toggleSubMenu(subMenu);
                event.stopPropagation();
            });
        }
    });
});


// DESKTOP NAVBAR MENU
// ACCESSIBILITY ("Tab key + Enter" anvigation)

// Target Dropdown (add tabindex to li.menu-item-has-children)
var menuItems = document.querySelectorAll('.nav-links > div > ul.menu li.menu-item-has-children');

menuItems.forEach(function(item) {
  item.setAttribute('tabindex', '0');
});

// Open Dropdown
document.addEventListener("DOMContentLoaded", function () {
    const subMenuParents = document.querySelectorAll(".menu-item-has-children");

    function toggleSubMenu(subMenu) {
        subMenu.classList.toggle("access");
    }

    subMenuParents.forEach((subMenuParent) => {
        subMenuParent.addEventListener("keydown", (event) => {
            if (event.key === "Enter") {
                const subMenu = subMenuParent.querySelector(".sub-menu");
                if (subMenu) {
                    toggleSubMenu(subMenu);
                    event.stopPropagation();
                }
            }
        });
    });
});