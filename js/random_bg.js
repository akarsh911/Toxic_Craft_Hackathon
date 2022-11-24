function randomIntFromInterval(min, max) { // min and max included 
    return Math.floor(Math.random() * (max - min + 1) + min)
}

window.addEventListener('load', (event) => {
    var rndInt = randomIntFromInterval(0, 9);
    document.getElementById("content").style.backgroundImage = "url('../media/bg_" + rndInt + ".svg')";
});