<head>
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
<button class="stopButton" onclick="location.reload();"></button>
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
              echo '<div class="checkbox-container">';
              echo '<input class="tgl tgl-skewed" data="'.str_replace('/','-',$dir.'-'.$ff).'" id="cb'.$inputCheckboxCounter.'" type="checkbox">';
              echo '<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="cb'.$inputCheckboxCounter.'"></label>';
              echo '</div>';
              echo '</header></div>';
              echo '<div class="groupcontainer"><div class="group">';
              listFolderFiles($dir.'/'.$ff);
              echo '</div></div>';
              $inputCheckboxCounter++;

            }else{
              $audioIdCounter++;
              $htmlString =  '<audio id="'.str_replace('/','-',$dir).'-'.$audioIdCounter .'" ';
              $htmlString .= 'src="'. $dir.'/'.$ff .'"></audio>';
              $htmlString .= '<button class="myButton" data-group="'.str_replace('/','-',$dir).'" data-id="'.str_replace('/','-',$dir).'-'.$audioIdCounter.'" >';
              $htmlString .= str_replace('.mp3','',$ff);
              $htmlString .= '</button>';

              echo $htmlString;
            }
        }
    }
    $path = '/your/path';

}

listFolderFiles('sounds');

?>
<script src="js/ohyeah.js"></script>
