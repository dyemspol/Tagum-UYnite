import "./bootstrap";
import Glide from "@glidejs/glide";

document.addEventListener("DOMContentLoaded", () => {
    // Wait a bit for any dynamic content
    setTimeout(() => {
        if (document.querySelector(".glide")) {
            const glide = new Glide(".glide", {
                type: "carousel",
                perView: 1,
                gap: 20,
            });
            glide.mount();
        }
    }, 100);
});
