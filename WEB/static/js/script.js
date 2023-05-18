const allSlides = document.querySelectorAll(".about__screenshots__slider__items__item");
const slider = document.querySelector(".about__screenshots__slider");

const ArrowLeft = document.querySelector("#SliderArrowLeft");
const ArrowRigth = document.querySelector("#SliderArrowRigth");

var currentIndex = 0;

let sliderElems = new Array();

for(let i = 0; i < allSlides.length; i++){
    var div = document.createElement('div');
    div.className = "about__screenshots__slider__elem";
    sliderElems[i] = div;
    slider.appendChild(div);
    
    if(i != 0)
    {
        allSlides[i].style.display = "none";
    }
    else
    {
        div.className = div.className + '--active';
    }
}

ArrowLeft.addEventListener('click', e => {
    if(currentIndex - 1 >= 0)
    {
        currentIndex -= 1;
        
        sliderElems[currentIndex].className = sliderElems[currentIndex].className + '--active';
        sliderElems[currentIndex + 1].className = "about__screenshots__slider__elem";
    
        allSlides[currentIndex].style.display = "block";
        allSlides[currentIndex + 1].style.display = "none";
    }

});
ArrowRigth.addEventListener('click', e => {
    if(currentIndex + 1 < allSlides.length)
    {
        currentIndex += 1;

        sliderElems[currentIndex].className = sliderElems[currentIndex].className + '--active';
        sliderElems[currentIndex - 1].className = "about__screenshots__slider__elem";
    
        allSlides[currentIndex].style.display = "block";
        allSlides[currentIndex - 1].style.display = "none";
    } 
});

//text color change
var element = document.getElementsByClassName('.header__left__nav__elem');

element[0].addEventListener('mouseover', function() {
    this.style.color = 'blue';
});

element[0].addEventListener('mouseout', function() {
    this.style.color = 'white';
});

var element = document.getElementsByClassName('.header__menu__button');

element[0].addEventListener('mouseover', function() {
    this.style.color = 'blue';
});

element[0].addEventListener('mouseout', function() {
    this.style.color = 'white';
});

var element = document.getElementsByClassName('.header__menu__login__button');

element[0].addEventListener('mouseover', function() {
    this.style.color = 'blue';
});

element[0].addEventListener('mouseout', function() {
    this.style.color = 'white';
});

//poput show/hide
function showPopup() {
    var popup = document.getElementsByClassName('popup');
    popup[0].style.display = 'flex'; 
}

function hidePopup() {
    var popup = document.getElementsByClassName('popup');
    popup[0].style.display = 'none';
}