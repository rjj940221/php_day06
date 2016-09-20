<?php
require_once 'Vertex.class.php';
class Vector
{
    static $verbose = false;
    private $_x;
    private $_y;
    private $_z;
    private $_w = 0;


    public function __construct(array $args)
    {
        if (array_key_exists('dest', $args) && !array_key_exists('orig', $args)){
            $temp = new Vertex(array('x'=> 0, 'y'=>0, 'z'=>0));
            $this->_x = $args['dest']->getX() - $temp->getX();
            $this->_y = $args['dest']->getY() - $temp->getY();
            $this->_z = $args['dest']->getZ() - $temp->getZ();
            $this->_w = $args['dest']->getW() - $temp->getW();
        }
        if (array_key_exists('dest', $args) && array_key_exists('orig', $args)){
            $this->_x = $args['dest']->getX() - $args['orig']->getX();
            $this->_y = $args['dest']->getY() - $args['orig']->getY();
            $this->_z = $args['dest']->getZ() - $args['orig']->getZ();
            $this->_w = $args['dest']->getW() - $args['orig']->getW();
        }
        if (array_key_exists('x', $args)){
            $this->_x = $args['x'];
        }
        if (array_key_exists('y', $args)){
            $this->_y = $args['y'];
        }
        if (array_key_exists('z', $args)){
            $this->_z = $args['z'];
        }
        if (array_key_exists('w', $args)){
            $this->_w = $args['w'];
        }
        if($this::$verbose==true)
            echo $this . "constructed.". PHP_EOL;
    }

    public function getX()
    {
        return $this->_x;
    }

    public function getY()
    {
        return $this->_y;
    }

    public function getZ()
    {
        return $this->_z;
    }

    public function getW()
    {
        return $this->_w;
    }

    static function doc(){
        return (file_get_contents('Vector.doc.txt') . PHP_EOL);
    }

    public function magnitude()
    {
        return (float)(sqrt($this->_x * $this->_x + $this->_y * $this->_y + $this->_z * $this->_z));
    }

    public function normalize()
    {
        $norm = $this->magnitude();
        return(new Vector(array('x'=> $this->_x/$norm, 'y'=> $this->_y/$norm, 'z'=>$this->_z/$norm)));
    }

    public function add(Vector $rhs)
    {
        return(new Vector(array('x'=> $this->_x + $rhs->getX(),'y'=> $this->_y + $rhs->getY(),'z'=> $this->_z + $rhs->getZ())));
    }

    public function sub(Vector $rhs)
    {
        return(new Vector(array('x'=> $this->_x - $rhs->getX(),'y'=> $this->_y - $rhs->getY(),'z'=> $this->_z - $rhs->getZ())));
    }

    public function opposite()
    {
        return(new Vector(array('x'=> 0- $this->_x, 'y'=> 0 - $this->_y ,'z'=> 0 - $this->_z )));
    }

    public function scalarProduct($k)
    {
        return (new Vector(array('x' => $this->_x * $k, 'y'=> $this->_y * $k, 'z' => $this->_z * $k)));
    }

    public function dotProduct(Vector $rhs)
    {
        return ((float)($this->_x * $rhs->getX() + $this->_y * $rhs->getY() + $this->_z * $rhs->getZ()));
    }

    public function cos(Vector $rhs){
        $v1 = $rhs->normalize();
        $v2 = $this->normalize();
        return ((float)($v1->getX() * $v2->getX() + $v1->getY() * $v2->getY() + $v1->getZ() * $v2->getZ()));
    }

    public function crossProduct(Vector $rhs)
{
    $x = $this->_y * $rhs->getZ() - $this->_z * $rhs->getY();
    $y = $this->_z * $rhs->getX() - $this->_x * $rhs->getZ();
    $z = $this->_x * $rhs->getY() - $this->_y * $rhs->getX();
    return(new Vector(array('x'=>$x, 'y'=>$y, 'z'=>$z)));
}

    public function __destruct()
    {
        if($this::$verbose==true)
            echo $this . "destructed." .  PHP_EOL;
    }

    public function __toString()
    {
            $re = sprintf("Vector( x: %.2f, y: %.2f, z: %.2f, w: %.2f )", $this->_x, $this->_y, $this->_z, $this->_w);
        return($re);
    }
}