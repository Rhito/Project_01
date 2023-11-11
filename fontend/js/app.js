let list = document.querySelector('.slider .list-slider')
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
