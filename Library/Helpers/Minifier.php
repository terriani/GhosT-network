<?php

namespace Helpers;

use \MatthiasMullie\Minify;

class Minifier
{
    public static function minify($path, $minifyName, $type)
    {
        if ($type == "css") {
            $sourcePath = $path."/".$minifyName.".css";
            $minifier = new Minify\CSS();
            $minifier->add($sourcePath);
            $minifiedPath = $path."/".$minifyName.".min.css";
            $minifier->minify($minifiedPath);
            return true;
        }
        if ($type == "js") {
            $sourcePath = $path."/".$minifyName.".js";
            $minifier = new Minify\JS();
            $minifier->add($sourcePath);
            $minifiedPath = $path."/".$minifyName.".min.js";
            $minifier->minify($minifiedPath);
            return true;
        }
        return "Arquivo inválido";
    }
}
