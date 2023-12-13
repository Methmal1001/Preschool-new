const header = document.querySelector("header");

window.addEventListener("scroll",function() {
    header.classList.toggle("sticky", window.scrollY > 60)
});

let menu = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

menu.onclick = () => {
    menu.classList.toggle('bx-x');
    navbar.classList.toggle('open');
};


// pdf downloader
// window.onload = function () {
//     document.getElementById("download").addEventListener("click", () => {
//         const invoice = document.getElementById("invoice");
//         console.log(invoice.innerHTML); // Log the content to the console
//         var opt = {
//             margin: 1,
//             filename: 'myfile.pdf',
//             image: { type: 'jpeg', quality: 0.98 },
//             html2canvas: { scale: 2 },
//             jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
//         };
//         html2pdf().from(invoice).set(opt).save();
//     });
// }


// popup images
document.querySelectorAll('.image-container img').forEach(image =>{
    image.onclick = () =>{
        document.querySelector('.popup-image').style.display = 'block';
        document.querySelector('.popup-image img').src = image.getAttribute('src');
    }
});

document.querySelector('.popup-image span').onclick = () =>{
    document.querySelector('.popup-image').style.display = 'none';
}
