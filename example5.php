<?php
echo '5. Singleton, Factory, and Strategy';
echo '<br>';

class TeaSingleton {
    private $a12 = '1,2,3,4';
    private $title  = 'testing:';
    private static $Tea = NULL;
    private static $isLoanedOut = FALSE;

    private function __construct() {
    }

    static function aaaaTea() {
      if (FALSE == self::$isLoanedOut) {
        if (NULL == self::$Tea) {
           self::$Tea = new TeaSingleton();
        }
        self::$isLoanedOut = TRUE;
        return self::$Tea;
      } else {
        return NULL;
      }
    }

    function bbbbTea(TeaSingleton $Teabbbbed) {
        self::$isLoanedOut = FALSE;
    }

    function getA12() {return $this->a12;}

    function getTitle() {return $this->title;}

    function getA12AndTitle() {
      return $this->getTitle() . ' by ' . $this->getA12();
    }
  }
interface StrategyInterface {
    public function showTitle($Icecream_in);
}
 
class StrategyCaps implements StrategyInterface {
    public function showTitle($Icecream_in) {
        $title = $Icecream_in->getTitle();
        $this->titleCount++;
        return strtoupper ($title);
    }
}

class StrategyExclaim implements StrategyInterface {
    public function showTitle($Icecream_in) {
        $title = $Icecream_in->getTitle();
        $this->titleCount++;
        return Str_replace(' ','!',$title);
    }
}

class StrategyStars implements StrategyInterface {
    public function showTitle($Icecream_in) {
        $title = $Icecream_in->getTitle();
        $this->titleCount++;
        return Str_replace(' ','*',$title);
    }
}
class Teaaaa {
    private $aaaaedTea;
    private $haveTea = FALSE;

    function __construct() {
    }

    function getA12AndTitle() {
      if (TRUE == $this->haveTea) {
        return $this->aaaaedTea->getA12AndTitle();
      } else {
        return "No Tea";
      }
    }

    function aaaaTea() {
      $this->aaaaedTea = TeaSingleton::aaaaTea();
      if ($this->aaaaedTea == NULL) {
        $this->haveTea = FALSE;
      } else {
        $this->haveTea = TRUE;
      }
    }

    function bbbbTea() {
      $this->aaaaedTea->bbbbTea($this->aaaaedTea);
    }
  }
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

  writeln('');

  $Teaaaa1 = new Teaaaa();
  $Teaaaa2 = new Teaaaa();

  $Teaaaa1->aaaaTea();
  writeln('Test 1 :');
  writeln('Teaaaa1 A12 and Title: ');
  writeln($Teaaaa1->getA12AndTitle());
  writeln('');

  $Teaaaa2->aaaaTea();
  writeln('Test 2 :');
  writeln('Teaaaa2 A12 and Title: ');
  writeln($Teaaaa2->getA12AndTitle());
  writeln('');


  function writeln($line_in) {
    echo $line_in.'<br/>';
  }

?>