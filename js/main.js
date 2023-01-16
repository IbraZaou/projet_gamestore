// Slider 

var swiper = new Swiper(".mySwiper", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});


// onclick for controller color

const xbox = document.querySelector('.xbox-controller');

function xboxController(controller){
    xbox.src = controller;
}


const ps = document.querySelector('.ps-controller');

function psController(controller){
    ps.src = controller;
}


// Accordeon 


const background = document.querySelectorAll('.background');

background.forEach((item) => {
    
    item.addEventListener('click', function(){
        const next = item.nextElementSibling
        next.classList.toggle('visible');

    })
});


// Pop up echo set timeout

const echoBtn = document.querySelectorAll('.modif-btn');
const echoWin = document.querySelectorAll('.echo');


echoBtn.addEventListener('click', function(){
    setTimeout(() => {
        echoWin.style.display('none');
        console.log('ca marche');
    }, 1000);
});