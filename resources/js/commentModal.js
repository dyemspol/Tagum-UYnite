const commentModal = document.getElementById("commentModal");
const commentModalBtn = document.getElementById("commentModalBtn");
const commentModalX = document.getElementById("commentModalX");

commentModalBtn.addEventListener("click", () => {
    commentModal.classList.remove("hidden");
    commentModal.classList.add("flex");
});
commentModalX.addEventListener("click", () => {
    commentModal.classList.add("hidden");
    commentModal.classList.remove("flex");
});
commentModal.addEventListener("click", (e) => {
    if (e.target === commentModal) {
        commentModal.classList.add("hidden");
        commentModal.classList.remove("flex");
    }
});
