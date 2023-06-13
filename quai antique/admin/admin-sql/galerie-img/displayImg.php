<?php

include('../../../mySQL/cnx.php');

$sqlSlider = "SELECT `url` FROM `img` ORDER BY `id` DESC LIMIT 5";

$reqSliderImg = $db->query($sqlSlider);

while($imgSlide = $reqSliderImg->fetch())
{
    echo ('<img src ="'.$imgSlide['url'].'"');
}