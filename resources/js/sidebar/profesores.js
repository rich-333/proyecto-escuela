
document.addEventListener("DOMContentLoaded", function () {
const toggles = document.querySelectorAll(".accordion-toggle");

toggles.forEach(function (toggle) {
    toggle.addEventListener("click", function () {
    const content = this.nextElementSibling;

    document.querySelectorAll(".accordion-content").forEach((el) => {
        if (el !== content) {
        el.style.maxHeight = null;
        }
    });

    if (content.style.maxHeight) {
        content.style.maxHeight = null;
    } else {
        content.style.maxHeight = content.scrollHeight + "px";
    }
    });
});
});
