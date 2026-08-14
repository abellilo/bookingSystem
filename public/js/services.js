const menuButton = document.getElementById("menuButton");
const navLinks = document.getElementById("navLinks");

if (menuButton && navLinks) {

    menuButton.addEventListener("click", () => {

        navLinks.classList.toggle("active");

        const isOpen =
            navLinks.classList.contains("active");

        menuButton.setAttribute(
            "aria-label",
            isOpen ? "Close menu" : "Open menu"
        );

    });


    const navItems =
        navLinks.querySelectorAll("a");

    navItems.forEach((item) => {

        item.addEventListener("click", () => {

            navLinks.classList.remove("active");

            menuButton.setAttribute(
                "aria-label",
                "Open menu"
            );

        });

    });

}