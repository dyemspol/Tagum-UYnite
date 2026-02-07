import "./bootstrap";
import Glide from "@glidejs/glide";

document.addEventListener("DOMContentLoaded", () => {
    const glide = new Glide(".glide", {
        type: "carousel",
        perView: 1,
        gap: 20,
        breakpoints: {
            1024: { perView: 2 },
            640: { perView: 1 },
        },
    });

    if (document.querySelector(".glide")) {
        glide.mount();
    }
});
