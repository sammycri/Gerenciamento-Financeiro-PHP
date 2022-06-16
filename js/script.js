const mario = document.querySelector('.mario');
const pipe = document.querySelector('.pipe');
const clouds = document.querySelector('.clouds');
const box = document.querySelector('.box-2')

// tempo
var timeLeft = 0;
window.setInterval(
    function () {
        timeLeft += 1;
        document.getElementById("timeLeft").innerHTML = "00" + timeLeft;

    }, 1000);
/* */
var marioScore = 0;

const jump = () =>
{
    mario.classList.add('jump');
    setTimeout(() =>
    {
        mario.classList.remove('jump');
    }, 500);
}
const loop = setInterval(() =>
{
    console.log('loop')

    const pipePosition = pipe.offsetLeft;
    const marioPosition = +window.getComputedStyle(mario).bottom.replace('px', '');
    const cloudsPosition = clouds.offsetLeft;


    if (pipePosition <= 120 && pipePosition > 0 && marioPosition < 80)
    {
        pipe.style.animation = 'none'
        pipe.style.left = `${pipePosition}px`;

        mario.style.animation = 'none'
        mario.style.bottom = `${marioPosition}px`;

        clouds.style.animation = 'none'
        clouds.style.left = `${cloudsPosition}px`;

        mario.src = 'imagens/game-over.png';
        mario.style.width = '75px';
        mario.style.marginLeft = '50px';

        box.style.display = 'flex';

        clearInterval(loop);
    }
    if (pipePosition < 0 && pipePosition > -10)
    {
        marioScore += 10;
        document.getElementById("marioScore").innerHTML = "00" + marioScore;
    }



}, 10)
document.addEventListener('keydown', jump);

