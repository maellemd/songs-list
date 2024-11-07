let jacquettes = document.querySelectorAll(".jacquette");
let sounds = document.querySelectorAll("audio");

jacquettes.forEach((jacquette, index) => {
  jacquette.addEventListener("mouseover", function () {
    let sound = sounds[index]; 

    if (sound.paused) {
      sound.play();
    } else {
      sound.pause();
    }
  });

  jacquette.addEventListener("mouseleave", function () {
    sounds[index].pause();
  });
});

console.log(jacquettes);