<head>
<title>Den bijstand</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<link rel="stylesheet" href="css/styles.css"/>
</head>

<div class="content">
  <div class="beat-selector-container">
    <div class="play-pause-button" id="btnPlayPause">
      <div class="c-pp is-play">
        <div class="c-pp__icon"></div>
      </div>
    </div>
    <div class="volume-control-container">
      <i class="icono-volumeMedium"></i>
      <input type="range" id="volumeSlider" onchange="app.setBeatVolume(this.value);" value="50"/>
    </div>
    <ul>
      <li>
        <input type="radio" id="beat-option-1" class="rbt-beat" data-val="0" name="beatselector" checked="checked">
        <label for="beat-option-1">Beat 1</label>
        <div class="check"></div>
      </li>
      <li>
        <input type="radio" id="beat-option-2" class="rbt-beat" data-val="1" name="beatselector">
        <label for="beat-option-2">Beat 2</label>
        <div class="check"><div class="inside"></div></div>
      </li>
      <li>
        <input type="radio" id="beat-option-3" class="rbt-beat" data-val="2" name="beatselector">
        <label for="beat-option-3">Beat 3</label>
        <div class="check"><div class="inside"></div></div>
      </li>
      <li>
        <input type="radio" id="beat-option-4" class="rbt-beat" data-val="3" name="beatselector">
        <label for="beat-option-4">Beat 4</label>
        <div class="check"><div class="inside"></div></div>
      </li>
      <li>
        <input type="radio" id="beat-option-5" class="rbt-beat" data-val="4" name="beatselector">
        <label for="beat-option-5">Beat 5</label>
        <div class="check"><div class="inside"></div></div>
      </li>
    </ul>
  </div>
  <div class="sample-selector-container">
  <?php

  $audioIdCounter = 0;
  $inputCheckboxCounter = 0;
  function listFolderFiles($dir){

      global $audioIdCounter;
      global $inputCheckboxCounter;

      $ffs = preg_grep('/^([^.])/', scandir($dir));

      foreach($ffs as $ff){
          if($ff != '.' && $ff != '..'){

              if(is_dir($dir.'/'.$ff)){
                echo '<div class="header-container"><header>';
                echo '<h2>'.str_replace('-',' ',$ff).'</h2>';
                echo '<div class="sample-group-container-toggle">';
                echo '<input class="tgl tgl-skewed" data="'.str_replace('/','-',$dir.'-'.$ff).'" id="cb'.$inputCheckboxCounter.'" type="checkbox">';
                echo '<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="cb'.$inputCheckboxCounter.'"></label>';
                echo '</div>';
                echo '</header></div>';
                echo '<div class="sample-group-container" id="'.str_replace('/','-',$dir.'-'.$ff).'"><div class="sample-group">';
                listFolderFiles($dir.'/'.$ff);
                echo '</div></div>';
                $inputCheckboxCounter++;

              }else{
                $audioIdCounter++;
                $htmlString =  '<audio id="'.str_replace('/','-',$dir).'-'.$audioIdCounter .'" ';
                $htmlString .= 'src="'. $dir.'/'.$ff .'"></audio>';
                $htmlString .= '<button class="myButton" data-sample-group="'.str_replace('/','-',$dir).'" data-id="'.str_replace('/','-',$dir).'-'.$audioIdCounter.'" >';
                $htmlString .= str_replace('.mp3','',$ff);
                $htmlString .= '</button>';

                echo $htmlString;
              }
          }
      }
      $path = '/your/path';

  }

  listFolderFiles('sounds/samples');

  ?>
  </div>
  <div class="playpause-selector-container">


  </div>
</div>

<script src="js/libs/howler.min.js"></script>
<script src="js/script.js"></script>
<?php include_once("ga_tracking.php") ?>
