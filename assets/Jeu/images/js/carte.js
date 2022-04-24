
shuffle()

//recuperer le bouton avec l'identifiant "btn"//
let btn = document.getElementById('btn')
btn.addEventListener('click', shuffle)

function shuffle() {
let allcards = document.getElementsByClassName("card-img")
let random = Math.floor(Math.random() * allcards.length)
let card = allcards[random]
card.setAttribute('src', "images/red.png")
console.log(card)
}

function flip(event){
     let element = event.currentTarget;
     if (element.className === "card"){
         if(element.style.transform == "rotateY(180deg)"){
             element.style.transform = "rotateY(0deg)";
         }
         else{
             element.style.transform = "rotateY(180deg)";
         }
    }
}