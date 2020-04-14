// https://www.youtube.com/watch?v=KcdBOoK3Pfw

const caruselSlide = document.querySelector('.carusel-slide');
const caruselImagenes = document.querySelectorAll('.carusel-slide img');

//botones
const anteriorBtn = document.querySelector('anteriorBtn');
const siguienteBtn = document.querySelector('siguienteBtn');

//contador
let contador = 1;
const tamano = caruselImagenes[0].clientWidth;

caruselSlide.style.transform = 'translateX(' + (tamano * contador)
                        + 'px)';

// listeners de botones

siguienteBtn.addEventListener('click',()=>{
    if(contador >= caruselImagenes.length -1) return;
    caruselSlide.style.transition = "transform 0.4s ease-in-out";
    contador++;
    // log para depurar
    console.log(contador);
    caruselSlide.style.transform = 'translateX(' + (tamano * contador) + 'px)';
});

anteriorBtn.addEventListener('click',()=>{
    if(contador <= 0) return;
    caruselSlide.style.transition = "transform 0.4s ease-in-out";
    contador--;
    // log para depurar
    console.log(contador);
    caruselSlide.style.transform = 'translateX(' + (tamano * contador) + 'px)';
});

caruselSlide.addEventListener('transitioned', () => {
    console.log(caruselImagenes[contador]);
     if (caruselImagenes[contador].id === 'ultimoClon'){
        caruselSlide.style.transition = "none";
        contador = caruselImagenes.length - contador;
        caruselSlide.style.transform = 'translateX(' + (tamano * contador) + 'px)';
     }
});