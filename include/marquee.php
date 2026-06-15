<?php 
$ads=$Ad->all(['sh'=>1]);
    foreach($ads as $ad){
    echo "&nbsp;&nbsp;";
    echo $ad['text'];
    echo "&nbsp;&nbsp;";
      }
?>