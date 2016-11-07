<?php
echo '4. Decorator, Singleton, and Strategy';
echo '<br>';

class test4 {
    private $aa;
    private $bb;
    function __construct($bb_in, $aa_in) {
        $this->aa = $aa_in;
        $this->bb  = $bb_in;
    }
    function getaa() {
        return $this->aa;
    }
    function getbb() {
        return $this->bb;
    }
    function getaaAndbb() {
      return $this->getbb().' by '.$this->getaa();
    }
}

class test4bbDecorator {
    protected $test4;
    protected $bb;
    public function __construct(test4 $test4_in) {
        $this->test4 = $test4_in;
        $this->resetbb();
    }   
    function resetbb() {
        $this->bb = $this->test4->getbb();
    }
    function showbb() {
        return $this->bb;
    }
}

class test4bbExclaimDecorator extends test4bbDecorator {
    private $btd;
    public function __construct(test4bbDecorator $btd_in) {
        $this->btd = $btd_in;
    }
    function exclaimbb() {
        $this->btd->bb = "!" . $this->btd->bb . "!";
    }
}

class test4bbStarDecorator extends test4bbDecorator {
    private $btd;
    public function __construct(test4bbDecorator $btd_in) {
        $this->btd = $btd_in;
    }
    function starbb() {
        $this->btd->bb = Str_replace(" ","*",$this->btd->bb);
    }
}
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
    public function showtest44Title($test44) {
      return $this->strategy->showTitle($test44);
    }
}

interface StrategyInterface {
    public function showTitle($test44_in);
}
 
class StrategyCaps implements StrategyInterface {
    public function showTitle($test44_in) {
        $title = $test44_in->getTitle();
        $this->titleCount++;
        return strtoupper ($title);
    }
}

class StrategyExclaim implements StrategyInterface {
    public function showTitle($test44_in) {
        $title = $test44_in->getTitle();
        $this->titleCount++;
        return Str_replace(' ','!',$title);
    }
}

class StrategyStars implements StrategyInterface {
    public function showTitle($test44_in) {
        $title = $test44_in->getTitle();
        $this->titleCount++;
        return Str_replace(' ','*',$title);
    }
}

class test44 {
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
  $patterntest4 = new test4('Word1', 'Word2');
 
  $decorator = new test4bbDecorator($patterntest4);
  $starDecorator = new test4bbStarDecorator($decorator);
  $exclaimDecorator = new test4bbExclaimDecorator($decorator);
 
  writeln('test 1 :');
  writeln($decorator->showbb());
  writeln('');
 
  writeln('test 2 :');
  $exclaimDecorator->exclaimbb();
  $exclaimDecorator->exclaimbb();
  writeln($decorator->showbb());
  writeln('');
 
  writeln('test 3 :');
  $starDecorator->starbb();
  writeln($decorator->showbb());
  writeln('');
 
  writeln('test 4: ');
  writeln($decorator->resetbb());
  writeln($decorator->showbb());
  writeln('');


  function writeln($line_in) {
    echo $line_in."<br/>";
  }


?>