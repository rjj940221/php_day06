<?php

/**
 * Created by PhpStorm.
 * User: rojones
 * Date: 9/20/16
 * Time: 8:29 AM
 */
class Color
{
    public $red = 0;
    public $green = 0;
    public $blue = 0;
    static $verbose = false;



    function __construct(array $args)
    {
        if (array_key_exists('red', $args)) {
            $this->red = $args['red'];
        }
        if (array_key_exists('green', $args)){
            $this->green = $args['green'];
        }
        if (array_key_exists('blue', $args)){
            $this->blue = $args['blue'];
        }
        if (array_key_exists('rgb', $args)){
            $rgb = $args['rgb'];
            $this->red =   (0b111111110000000000000000 & $rgb) >> 16;
            $this->green = (0b000000001111111100000000 & $rgb) >> 8;
            $this->blue =  (0b000000000000000011111111 & $rgb);
        }
        if ($this::$verbose == true)
            echo ($this . " constructed." . PHP_EOL);
    }

    function add(Color $add){
        $re = new Color(array('red' => $this->red + $add->red, 'green' => $this->green + $add->green,
            'blue' => $this->blue + $add->blue));
        return ($re);
    }

    function sub(Color $sub){
        $re = new Color(array('red' => $this->red - $sub->red, 'green' => $this->green - $sub->green,
            'blue' => $this->blue - $sub->blue));
        return ($re);
    }

    function mult($factor){
        $re = new Color(array('red' => $this->red * $factor, 'green' => $this->green * $factor,
            'blue' => $this->blue * $factor));
        return ($re);
    }

    static function doc(){
        return (file_get_contents('Color.doc.txt') . PHP_EOL);
    }

    function __toString()
    {
        $re = sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue);
        return ($re);
    }

    function __destruct()
    {
        if ($this::$verbose == true)
        echo ($this . " destructed." . PHP_EOL);
    }
}