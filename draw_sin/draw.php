<?php
    header('Content-Type: image/jpeg');

    // rozmiar obrazu
    $width = 1000;
    $height = 500;
    
    // tworzenie nowego obrazu
    $obraz = imagecreatetruecolor($width, $height);
    
    // kolory do rysowania
    $bg = imagecolorallocate($obraz, 255, 255, 255);
    $black = imagecolorallocate($obraz, 0, 0, 0);
    
    // wypełnienie obrazu kolorem tła
    imagefill($obraz, 0, 0, $bg);
    
    // rysowanie os x i y
    imageline($obraz, 0, $height/2, $width, $height/2, $black);
   
    imageline($obraz, $width/2, 0, $width/2, $height, $black);
    

    // parametry funkcji
    $amplituda = 100;
    $okres = 500;
    $xoffset = $width/2;
    $yoffset = $height/2;

    for ($x = 0; $x < $width; $x++) {
        // obliczanie wartości na osi y na podstawie x
        $y = $amplituda * sin((2 * M_PI * $x) / $okres) + $yoffset;
        
        // rysowanie punktu na wykresie
        imagesetpixel($obraz, $x + $xoffset, $y, $black);
    }

    imagejpeg($obraz);
    imagedestroy($obraz);
?>