<?php
echo '3. Observe, example33, and Decorator';
echo '<br>';

abstract class AbstractObserver {
    abstract function update(AbstractSubject $subject_in);
}

abstract class AbstractSubject {
    abstract function attach(AbstractObserver $observer_in);
    abstract function detach(AbstractObserver $observer_in);
    abstract function notify();
}

function writeln($line_in) {
    echo $line_in."<br/>";
}

class PatternObserver extends AbstractObserver {
    public function __construct() {
    }
    public function update(AbstractSubject $subject) {
      writeln('Testing!');
      writeln(' new:  '.$subject->getFavorites());
      writeln('');      
    }
}

class PatternSubject extends AbstractSubject {
    private $favoritePatterns = NULL;
    private $observers = array();
    function __construct() {
    }
    function attach(AbstractObserver $observer_in) {
      $this->observers[] = $observer_in;
    }
    function detach(AbstractObserver $observer_in) {
      foreach($this->observers as $okey => $oval) {
        if ($oval == $observer_in) { 
          unset($this->observers[$okey]);
        }
      }
    }
    function notify() {
      foreach($this->observers as $obs) {
        $obs->update($this);
      }
    }
    function updateFavorites($newFavorites) {
      $this->favorites = $newFavorites;
      $this->notify();
    }
    function getFavorites() {
      return $this->favorites;
    }
}
class StrategyContext {
    private $strategy = NULL; 
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
    private $author;
    private $title;
    function __construct($title_in, $author_in) {
        $this->author = $author_in;
        $this->title  = $title_in;
    }
    function getAuthor() {
        return $this->author;
    }
    function getTitle() {
        return $this->title;
    }
    function getAuthorAndTitle() {
        return $this->getTitle() . ' by ' . $this->getAuthor();
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

class Mainexample33
{
    public static function create($make, $model)
    {
        return new Main($make, $model);
    }
}
class example3Singleton {
    private $a12 = '1,2,3,4';
    private $title  = 'testing:';
    private static $example3 = NULL;
    private static $isLoanedOut = FALSE;

    private function __construct() {
    }

    static function aaaaexample3() {
      if (FALSE == self::$isLoanedOut) {
        if (NULL == self::$example3) {
           self::$example3 = new example3Singleton();
        }
        self::$isLoanedOut = TRUE;
        return self::$example3;
      } else {
        return NULL;
      }
    }

    function bbbbexample3(example3Singleton $example3bbbbed) {
        self::$isLoanedOut = FALSE;
    }

    function getA12() {return $this->a12;}

    function getTitle() {return $this->title;}

    function getA12AndTitle() {
      return $this->getTitle() . ' by ' . $this->getA12();
    }
  }
 
class example3aaa {
    private $aaaaedexample3;
    private $haveexample3 = FALSE;

    function __construct() {
    }

    function getA12AndTitle() {
      if (TRUE == $this->haveexample3) {
        return $this->aaaaedexample3->getA12AndTitle();
      } else {
        return "No example3";
      }
    }

    function aaaaexample3() {
      $this->aaaaedexample3 = example3Singleton::aaaaexample3();
      if ($this->aaaaedexample3 == NULL) {
        $this->haveexample3 = FALSE;
      } else {
        $this->haveexample3 = TRUE;
      }
    }

    function bbbbexample3() {
      $this->aaaaedexample3->bbbbexample3($this->aaaaedexample3);
    }
  }
  writeln('Testing4');
  writeln('');

  $patternGossiper = new PatternSubject();
  $patternGossipFan = new PatternObserver();
  $patternGossiper->attach($patternGossipFan);
  $patternGossiper->updateFavorites('abstract example33, decorator, visitor');
  $patternGossiper->updateFavorites('abstract example33, observer, decorator');
  $patternGossiper->detach($patternGossipFan);
  $patternGossiper->updateFavorites('abstract example33, observer, paisley');



?>