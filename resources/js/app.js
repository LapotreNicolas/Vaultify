// import './bootstrap';
// import.meta.glob([
//     '../images/**',
//     '../fonts/**',
// ]);


window.addEventListener("load", (event) => {
    setTimeout(() => {
        document.querySelector(".loader").remove();
        document.body.style.overflowY = 'visible';
    },500)
});