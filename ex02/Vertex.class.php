<?php

/**
 * Created by PhpStorm.
 * User: rojones
 * Date: 9/20/16
 * Time: 11:08 AM
 */
require_once 'Color.class.php';
class Vertex
{
    static $verbose = false;
    private $_x;
    private $_y;
    private $_z;
    private $_w = 1.0;
    private $_color;


    public function __construct(array $args)
    {
        if (array_key_exists('x', $args)){
            $this->_x = $args['x'];
        }
        else
            throw new ErrorException('argument x not specified!');
        if (array_key_exists('y', $args)){
            $this->_y = $args['y'];
        }
        else
            throw new ErrorException('argument y not specified!');
        if (array_key_exists('z', $args)){
            $this->_z = $args['z'];
        }
        else
            throw new ErrorException('argument z not specified!');
        if (array_key_exists('w', $args)){
            $this->_w = $args['w'];
        }
        if (array_key_exists('color', $args)){
            $this->_color= $args['color'];
        }
        else
            $this->_color  =  new Color( array( 'red'=>255, 'green'=>255, 'blue'=>255));
        if($this::$verbose==true)
            echo $this . "constructed.". PHP_EOL;
    }

    public function getX()
    {
        return $this->_x;
    }


    public function setX($x)
    {
        $this->_x = $x;
    }


    public function getY()
    {
        return $this->_y;
    }


    public function setY($y)
    {
        $this->_y = $y;
    }


    public function getZ()
    {
        return $this->_z;
    }


    public function setZ($z)
    {
        $this->_z = $z;
    }


    public function getW()
    {
        return $this->_w;
    }


    public function setW($w)
    {
        $this->_w = $w;
    }


    public function getColor()
    {
        return $this->_color;
    }


    public function setColor($color)
    {
        $this->_color = $color;
    }

    static function doc(){
        return (file_get_contents('Vertex.doc.txt') . PHP_EOL);
    }

    public function __destruct()
    {
        if($this::$verbose==true)
            echo $this . "destructed." .  PHP_EOL;
    }

    public function __toString()
    {
        if ($this::$verbose==true)
            $re = sprintf("Vertex( x: %.2f, y: %.2f, z: %.2f, w: %.2f, %s)", $this->_x, $this->_y, $this->_z, $this->_w,
                $this->_color);
        else
            $re = sprintf("Vertex( x: %.2f, y: %.2f, z: %.2f, w: %.2f)", $this->_x, $this->_y, $this->_z, $this->_w);
        return($re);
    }
}