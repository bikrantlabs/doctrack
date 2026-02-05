document.addEventListener("DOMContentLoaded", () => {
    const container = document.getElementById("toast-container");
    console.log("Javascript Running.,..");
    const flashes = window.__FLASH_MESSAGES__ || {};
    console.log(flashes);


    Object.values(flashes).forEach(flash => {
        createToast(flash.content, flash.type);
    });
});

function createToast(message, type = "info") {

    const toast = document.createElement("div");
    toast.className = `toast toast-${type}`;

    toast.innerHTML = `
        <div class="toast-content">
            ${message}
        </div>
    `;

    document.getElementById("toast-container").appendChild(toast);

    // trigger animation
    setTimeout(() => toast.classList.add("show"), 50);

    // auto remove
    setTimeout(() => {

        // trigger exit animation
        toast.classList.add("toast-exit");

        // remove AFTER animation ends
        toast.addEventListener("animationend", () => {
            toast.remove();
        }, {once: true});

    }, 3500);
}
