window.addEventListener("load", function () {
    const loadingScreen = document.querySelector(".loading-screen");
    const mainContent = document.querySelector("main");

    setTimeout(() => {
        loadingScreen.style.display = "none";
        mainContent.style.filter = "blur(0)";
    }, 700);
});
