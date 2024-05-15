window.addEventListener("load", function () {
  const imgPosition = document.querySelectorAll(".img-item");
  const imgWrap = document.querySelector(".wrap-images");
  const dotItem = document.querySelectorAll(".dot");
  let imgNumber = imgPosition.length;
  let index = 0;
  function slider(index) {
    imgWrap.style.left = "-" + index * 100 + "%";
    const dotActive = document.querySelector(".active");
    dotActive.classList.remove("active");
    dotItem[index].classList.add("active");
  }
  imgPosition.forEach(function (image, index) {
    image.style.left = index * 100 + "%";
    dotItem[index].addEventListener("click", function () {
      slider(index);
    });
  });

  function imgSlider() {
    index++;
    if (index >= imgNumber) {
      index = 0;
    }
    slider(index);
  }
  setInterval(imgSlider, 3000);
});
