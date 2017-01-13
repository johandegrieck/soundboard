(function(){

  // TODO: create random button plays
  /*
  function selectRandomBtn(){
    var arrBtns = document.getElementsByClassName();
    arrBtns.push();
  }

  setTimeout(function() {
      var randomBtn = selectRandomBtn();
      randomBtn.click();
  }, 30*1000);
 */
  var arr = document.getElementsByClassName('myButton');

  arr = [].slice.call(arr); //I have converted the HTML Collection an array
  arr.forEach(function(v,i,a) {
      console.log(document.getElementById(v.getAttribute("data-id")));
      v.addEventListener('click', function(){
        document.getElementById(v.getAttribute("data-id")).pause();
        document.getElementById(v.getAttribute("data-id")).currentTime = 0;
        document.getElementById(v.getAttribute("data-id")).play();
      });
  });

})();
