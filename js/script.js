//Sreenshot slider
const allSlides = document.querySelectorAll(".about__screenshots__slider__items__item");
const slider = document.querySelector(".about__screenshots__slider");

const ArrowLeft = document.querySelector("#SliderArrowLeft");
const ArrowRigth = document.querySelector("#SliderArrowRigth");

//Buttons
const loginButton = document.getElementById('loginButton');
const registrationButton = document.getElementById('registrationButton');

//Popups
const loginPopup = document.getElementById('loginPopup');
const registrationPopup = document.getElementById('registrationPopup');

const popupCloseButtons = document.querySelectorAll('.popup__window__close');

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
if(loginButton != null){
    loginButton.onclick = function(event){
        TogglePopup(loginPopup);
    }    
}

if(registrationButton != null){
    registrationButton.onclick = function(event){
        TogglePopup(registrationPopup);
    }
}
popupCloseButtons.forEach(element => {
    element.onclick = function(event){
        let popup = GetParent(element, "popup");
        TogglePopup(popup);
    }
});

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
function TogglePopup(popup){
    if(popup.style.display == "block")
        popup.style.display = "none";
    else
        popup.style.display = "block";
}
function GetParent(element, parentClass){
    let currentElement = element;
    while(!currentElement.classList.contains(parentClass)){
        currentElement = currentElement.parentNode;
    }
    return currentElement;
    
}
//popup display/hide
function showPopup() {
    var popup = document.getElementsByClassName('popup');
    popup[0].style.display = 'flex'; 
}

function hidePopup() {
    var popup = document.getElementsByClassName('popup');
    popup[0].style.display = 'none';
}