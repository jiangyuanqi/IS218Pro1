<?php
echo '1. Strategy, Factory, and Singleton';
echo '<br>';
class StrategyContext {
    public $strategy = NULL; 
    public function __construct($strategy_ind_id) {
        switch ($strategy_ind_id) {
            case 'a': 
                $this->strategy = new StrategyCaps();
            break;
            case 'b': 
                $this->strategy = new StrategyExclaim();
            break;
            case 'c': 
                $this->strategy = new StrategyStars();
            break;
        }
    }
    public function showIcecreamTitle($Icecream) {
      return $this->strategy->showTitle($Icecream);
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

class Icecream {
    private $color;
    private $title;
    function __construct($title_in, $color_in) {
        $this->color = $color_in;
        $this->title  = $title_in;
    }
    function getcolor() {
        return $this->color;
    }
    function getTitle() {
        return $this->title;
    }
    function getcolorAndTitle() {
        return $this->getTitle() . ' by ' . $this->getcolor();
    }
}
class Main
{
    private $IcecreamMake;
    private $IcecreamModel;

    public function __construct($make, $model)
    {
        $this->IcecreamMake = $make;
        $this->IcecreamModel = $model;
    }

    public function getMakeAndModel()
    {
        return $this->IcecreamMake . ' ' . $this->IcecreamModel;
    }
}

class MainFactory
{
    public static function create($make, $model)
    {
        return new Main($make, $model);
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
$Icecream = new Icecream('123','234');
 
  $strategyContexta = new StrategyContext('a');
  $strategyContextb = new StrategyContext('b');
  $strategyContextc = new StrategyContext('c');

  print_r($Icecream);
  function writeln($line_in) {
    echo $line_in."<br/>";
  }

?>