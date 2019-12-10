<?php

use MatthiasMullie\Minify;

/**
 * Minify Css
 */
$minifierCss = new Minify\CSS();
$cssDir = scandir(dirname(__DIR__, 2)."/Public/assets/css/");
foreach ($cssDir as $cssItem) {
    $cssFile = dirname(__DIR__, 2)."/Public/assets/css/$cssItem";
    if (is_file($cssFile) and pathinfo($cssFile)['extension'] == "css") {
        @unlink(dirname(__DIR__, 2)."/Public/assets/css/scooby.min.css");
        $minifierCss->add($cssFile);
    }
}
$minifiedPath = dirname(__DIR__, 2)."/Public/assets/css/scooby.min.css";
$minifierCss->minify($minifiedPath);

/**
 * Minify js
 */
$minifierJs = new Minify\JS();
$jsDir = scandir(dirname(__DIR__, 2)."/Public/assets/js/");
foreach ($jsDir as $jsItem) {
    $jsFile = dirname(__DIR__, 2)."/Public/assets/js/$jsItem";
    if (is_file($jsFile) and pathinfo($jsFile)['extension'] == "js") {
        @unlink(dirname(__DIR__, 2)."/Public/assets/js/scooby.min.js");
        $minifierJs->add($jsFile);
    }
}
$minifiedPath = dirname(__DIR__, 2)."/Public/assets/js/scooby.min.js";
$minifierJs->minify($minifiedPath);
