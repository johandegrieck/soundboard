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
  var arrMyBtns = document.getElementsByClassName('myButton');
  var arrToggleBtns = document.getElementsByClassName('tgl');

  arrMyBtns = [].slice.call(arrMyBtns); //I have converted the HTML Collection an array
  arrMyBtns.forEach(function(v,i,a) {
      //console.log(document.getElementById(v.getAttribute("data-id")));
      v.addEventListener('click', function(){
        document.getElementById(v.getAttribute("data-id")).pause();
        document.getElementById(v.getAttribute("data-id")).currentTime = 0;
        document.getElementById(v.getAttribute("data-id")).play();
      });
  });

  arrToggleBtns = [].slice.call(arrToggleBtns); //I have converted the HTML Collection an array
  arrToggleBtns.forEach(function(v,i,a) {
      //toggle element by adding an 'act' class
      v.addEventListener('click', function(){
        var elem = document.getElementById(v.getAttribute("data"));
        console.log('---',elem.className.includes(" act"));
        //check if act is already there, else add it
        if(elem.className.includes(" act")){
          var newClassName = elem.className.replace(" act", "");
          elem.className = newClassName;
        }else{
          elem.className += " act";
        }

      });
  });



})();
