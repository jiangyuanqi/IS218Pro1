<?php
echo '2. Factory, Singleton, and Strategy';
echo '<br>';
class Main
{
    private $CoffeeMake;
    private $CoffeeModel;

    public function __construct($make, $model)
    {
        $this->CoffeeMake = $make;
        $this->CoffeeModel = $model;
    }

    public function getMakeAndModel()
    {
        return $this->CoffeeMake . ' ' . $this->CoffeeModel;
    }
}

class MainFactory
{
    public static function create($make, $model)
    {
        return new Main($make, $model);
    }
}
class IcecreamSingleton {
    private $a12 = '1,2,3,4';
    private $title  = 'testing:';
    private static $Icecream = NULL;
    private static $isLoanedOut = FALSE;

    private function __construct() {
    }

    static function aaaaIcecream() {
      if (FALSE == self::$isLoanedOut) {
        if (NULL == self::$Icecream) {
           self::$Icecream = new IcecreamSingleton();
        }
        self::$isLoanedOut = TRUE;
        return self::$Icecream;
      } else {
        return NULL;
      }
    }

    function bbbbIcecream(IcecreamSingleton $Icecreambbbbed) {
        self::$isLoanedOut = FALSE;
    }

    function getA12() {return $this->a12;}

    function getTitle() {return $this->title;}

    function getA12AndTitle() {
      return $this->getTitle() . ' by ' . $this->getA12();
    }
  }
 
class Icecreamaaa {
    private $aaaaedIcecream;
    private $haveIcecream = FALSE;

    function __construct() {
    }

    function getA12AndTitle() {
      if (TRUE == $this->haveIcecream) {
        return $this->aaaaedIcecream->getA12AndTitle();
      } else {
        return "No Icecream";
      }
    }

    function aaaaIcecream() {
      $this->aaaaedIcecream = IcecreamSingleton::aaaaIcecream();
      if ($this->aaaaedIcecream == NULL) {
        $this->haveIcecream = FALSE;
      } else {
        $this->haveIcecream = TRUE;
      }
    }

    function bbbbIcecream() {
      $this->aaaaedIcecream->bbbbIcecream($this->aaaaedIcecream);
    }
  }
class Singleton
{
    private static $instance;
    public static function getInstance()
    {
    }
    protected function __construct()
    {
    }
    private function __clone()
    {
    }
    private function __wakeup()
    {
    }
}
class SingletonChild extends Singleton
{
}
$c = MainFactory::create('Testing1', 'Testing2');

print_r($c->getMakeAndModel());


?>