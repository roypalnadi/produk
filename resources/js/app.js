import "./bootstrap";

// event will be executed when the toggle-button is clicked
document.getElementById("button-toggle").addEventListener("click", () => {
    document.getElementById("sidebar").classList.toggle("active-sidebar");
    document
        .getElementById("main-content")
        .classList.toggle("active-main-content");

    var elements = document.querySelectorAll(".logo-text");

    elements.forEach(function (element) {
        element.classList.toggle("d-none");
    });
});
