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
  function togglePlayPauseButton(){

    var elem = document.getElementById('btnPlayPause').firstElementChild;
    if(elem.className.includes(" is-play")){ //check if act is already there, else add it
      elem.className = elem.className.replace(" is-play", "");
      gimmeTheBiets(arrBeatUrls[activeBeatIndex]);
    }else{
      elem.className += " is-play";
      stopTheBiets();
    }


  }

  function gimmeTheBiets(soundUrl){
    beat = new Howl({
      src: soundUrl,
      autoplay: false,
      loop: true,
      volume: 0.5,
      onend: function() {
        //console.log('Finished!');
      }
    });
    beat.play();
  }

  function stopTheBiets(){
    beat.pause();
  }

  function createCookie(name,value,days) {
   if (days) {
       var date = new Date();
       date.setTime(date.getTime() + (days*24*60*60*1000));
       var expires = "; expires=" + date.toUTCString();
   }
   else var expires = "";
   document.cookie = name + "=" + value + expires + "; path=/";
  }

  function readCookie(name) {
   var nameEQ = name + "=";
   var ca = document.cookie.split(';');
   for(var i=0;i < ca.length;i++) {
       var c = ca[i];
       while (c.charAt(0)==' ') c = c.substring(1,c.length);
       if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
   }
   return null;
  }

  function eraseCookie(name) {
   createCookie(name,"",-1);
  }

  function openActiveSections(){
    var arrGroupContainers = document.getElementsByClassName('sample-group-container');
    arrGroupContainers = [].slice.call(arrGroupContainers); // convert the HTML Collection to an array
    arrGroupContainers.forEach(function(v,i,a) {
      var x = readCookie(v.getAttribute("id"));
      if (x) {
          v.className += " act";
          document.querySelectorAll('[data="'+v.getAttribute("id")+'"]')[0].checked = true;
      }
    });


  }

  function setActiveBeatIndex(){
    activeBeatIndex = document.querySelector('input[name="beatselector"]:checked').getAttribute('data-val');
  }


  function init(){
    //var beat = new Audio('sounds/drumloops/beat01.mp3');

    arrBeatUrls = new Array();
    arrBeatUrls[0] = ['sounds/drumloops/beat01.mp3', 'sounds/drumloops/beat01.ogg'];
    arrBeatUrls[1] = ['sounds/drumloops/beat02.mp3', 'sounds/drumloops/beat02.ogg'];
    arrBeatUrls[2] = ['sounds/drumloops/beat03.mp3', 'sounds/drumloops/beat03.ogg'];
    arrBeatUrls[3] = ['sounds/drumloops/beat04.mp3', 'sounds/drumloops/beat04.ogg'];

    playPauseBtn = document.getElementById('btnPlayPause');
    playPauseBtn.addEventListener('click',function(){
      //get value of radio buttons
      setActiveBeatIndex();
      togglePlayPauseButton();

    });
    openActiveSections();
  }


  var beat, activeBeatIndex, arrMyBtns, arrToggleBtns, arrBeatUrls, arrRadioBtns, playPauseBtn;

  arrMyBtns = document.getElementsByClassName('myButton');
  arrMyBtns = [].slice.call(arrMyBtns); // convert the HTML Collection to an array
  arrMyBtns.forEach(function(v,i,a) {
      v.addEventListener('click', function(){
        var elem = document.getElementById(v.getAttribute("data-id"));
        elem.pause();
        elem.currentTime = 0;
        elem.play();
      });
  });


  arrToggleBtns = document.getElementsByClassName('tgl');
  arrToggleBtns = [].slice.call(arrToggleBtns); // convert the HTML Collection to an array
  arrToggleBtns.forEach(function(v,i,a) { //add the handlers used for toggling elements by adding an 'act' class
      v.addEventListener('click', function(){
        var elem = document.getElementById(v.getAttribute("data"));

        if(elem.className.includes(" act")){ //check if act is already there, else add it
          elem.className = elem.className.replace(" act", "");
          eraseCookie(elem.getAttribute("id"));
        }else{
          elem.className += " act";
          createCookie(elem.getAttribute("id"),'act',7);
        }

      });
  });

  // add change listeners for beatselector radiobuttons
  // on change the current beat stops and starts the selected beat
  arrRadioBtns = document.getElementsByClassName('rbt-beat');
  arrRadioBtns = [].slice.call(arrRadioBtns); // convert the HTML Collection to an array
  arrRadioBtns.forEach(function(v,i,a) {
    v.addEventListener('click', function(){
      //console.log(document.getElementById('btnPlayPause').firstElementChild.className);
      //stopTheBiets();
      setActiveBeatIndex();
      if(document.getElementById('btnPlayPause').firstElementChild.className.indexOf("is-play")<0){
        stopTheBiets();
        //console.log(activeBeatIndex);
        gimmeTheBiets(arrBeatUrls[activeBeatIndex]);
      }
    });
  });


  init();



})();
