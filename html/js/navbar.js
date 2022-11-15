const show = document.getElementById("show");
const close = document.getElementById("close");
const container = document.getElementById("mobile_size");



show.addEventListener("click", () => {
    container.lastElementChild.classList.add("show");
});

close.addEventListener("click", () => {
    container.lastElementChild.classList.remove("show");
});