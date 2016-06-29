<?php


class Fruit {

  public $name;
  protected $shape;

  /**
   * Fruit constructor.
   * @param $name
   * @param $shape
   */
  public function __construct($name, $shape) {
    $this->name = $name;
    $this->shape = $shape;
  }

  /**
   * @param mixed $shape
   */
  public function setShape($shape) {
    $this->shape = $shape;
  }
}

class Apple extends Fruit {
  public function sayHello(){
    $this->shape = 'mrkva';
    return $this->shape;
  }
}

$apple = new Apple('apple', 'triangle');

var_dump($apple);

$apple->name = 'jablcko';

$apple->setShape('hovnocuc');


var_dump($apple);