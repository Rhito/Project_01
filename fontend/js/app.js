// login 
const loginBtn = document.querySelector('.login-select');
const loginModal = document.querySelector('.login-modal')
const closeModal = document.querySelector('.modal-close')

function showLogin (){
    loginModal.classList.add('visible');
};
function closeLogin (){
    loginModal.classList.remove('visible');
};

loginBtn.addEventListener('click', showLogin);
closeModal.addEventListener('click', closeLogin);

// sign in
const signInBtn = document.querySelector('.sign-in');
const signInModal = document.querySelector('.signin-modal')
const closeSignInModal = document.querySelector('.modal-signin-close')
function showSignIn (){
    signInModal.classList.add('visible');
    loginModal.classList.remove('visible'); 
};
function closeSignIn (){
    signInModal.classList.remove('visible');
};

signInBtn.addEventListener('click', showSignIn);
closeSignInModal.addEventListener('click', closeSignIn);

// slider
let list = document.querySelector('.slider .list-slider');
let items = document.querySelectorAll('.slider .list-slider .item-slider');
let dots =  document.querySelectorAll('.slider .dots-slider li');
let leftBtn = document.getElementById('btns-slider-left');
let rightBtn = document.getElementById('btns-slider-right');

let active = 0;
let lenghtItems = items.length - 1;

rightBtn.onclick = function () {
    if (active + 1 > lenghtItems) {
        active = 0;
    }else {
        active ++;
    }
    reloadSlider();
}

let refreshSlider = setInterval(()=> {rightBtn.click()},5000);

leftBtn.onclick = function () {
    if (active - 1 < 0) {
        active = lenghtItems;
    }else {
        active--;
    }
    reloadSlider();
}
function reloadSlider() {
    let checkLeft = items[active].offsetLeft;
    list.style.left = -checkLeft + 'px';

    let lastActiveDot = document.querySelector('.slider .dots-slider li.active');
    lastActiveDot.classList.remove('active');
    dots[active].classList.add('active');

    clearInterval(refreshSlider);
    refreshSlider = setInterval(()=> {rightBtn.click()},5000);
}

document.querySelectorAll(".nav-item").forEach(function (element) {
    element.addEventListener("click", function () {
        document.querySelectorAll(".nav-item").forEach(function (el) {
            el.classList.remove("active-blocktitle");
        });

        element.classList.add("active-blocktitle");
    });
});


let coverProducts = document.querySelector('.cover-singleday-product');
let arrowBtns = document.querySelectorAll('.singleday-warapper .arrow i');
let fistCardWith = coverProducts.querySelector('.singleday-product').offsetWidth 
console.log(fistCardWith)

arrowBtns.forEach(btn => {
    btn.addEventListener('click',() => {
        coverProducts.scrollLeft += btn.id === 'arrow-left' ? -fistCardWith : fistCardWith;
    })
});

const coverProductsChildrens = [...coverProducts.children];
let cardPerView = Math.round(coverProducts.offsetWidth / fistCardWith)

coverProductsChildrens.slice(-cardPerView).reverse().forEach(card => {
    coverProducts.insertAdjacentHTML("afterbegin", card.outerHTML);
});
coverProductsChildrens.slice(0, cardPerView).forEach(card => {
    coverProducts.insertAdjacentHTML("beforeend", card.outerHTML);
});

const infiniteScroll = () => {
    if(coverProducts.scrollLeft === 0){
        coverProducts.classList.add('no-transition')
        coverProducts.scrollLeft = coverProducts.scrollWidth - (2 * coverProducts.offsetWidth);
        coverProducts.classList.remove('no-transition')
    } else if(coverProducts.scrollLeft === coverProducts.scrollWidth - coverProducts.offsetWidth){
        coverProducts.classList.add('no-transition')
        coverProducts.scrollLeft = coverProducts.offsetWidth;
        coverProducts.classList.remove('no-transition')
    }
}

coverProducts.addEventListener('scroll',infiniteScroll)
