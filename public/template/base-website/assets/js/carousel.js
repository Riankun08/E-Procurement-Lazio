const carousel = document.querySelector("#carousel");
const cards = carousel.getElementsByClassName("card");

carousel.addEventListener('scroll', (e)=>{
  var active = e.currentTarget.getElementsByClassName("active");
  for(let c=0;c<cards.length;c++){
    var card = cards[c];
    if(active[0] != card){
      const left = card.getBoundingClientRect().left;
      const right = card.getBoundingClientRect().right;
      if(left>0 && right>0 && left<(document.getElementById("carousel").offsetWidth/2) && right>(document.getElementById("carousel").offsetWidth/2)){
        if(active[0] != null)
          active[0].classList.toggle('active');
        card.classList.toggle('active');
      }
    }
  }
});

for(let i = 0; i<cards.length;i++){
  cards[i].addEventListener('click',(e)=>{
    let nowcard = e.currentTarget;
    let active = document.getElementsByClassName("active")[0];
    if(nowcard != active){
      if(nowcard.getBoundingClientRect().left< active.getBoundingClientRect().left){
        //backscroll
        carousel.scroll(carousel.scrollLeft - (carousel.clientWidth - nowcard.getBoundingClientRect().right - parseFloat(getComputedStyle(cards[cards.length-1]).marginRight)),0, "smooth");
      }else{
        //Nextscroll
        carousel.scroll(carousel.scrollLeft + nowcard.getBoundingClientRect().left - parseFloat(getComputedStyle(cards[0]).marginLeft),0, "smooth");
      }
    }
  });
}
