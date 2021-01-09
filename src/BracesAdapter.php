<?php

namespace BracesChecker;

use BracesChecker\Braces;

class BracesAdapter {

    private $bracesClass;
    private $checker;
    protected $expected;


    public function __construct(Braces $bracesClass, Checker $checker) {
        $this->bracesClass = $bracesClass;
        $this->checker = $checker;
    }

    public function MatchType (string $sentence) :bool
    {
            
          $length = mb_strlen($sentence);

         for ($i = 0; $i < $length; $i++) {

            $element = $sentence[$i];

            if ($this->bracesClass->isInBrackets($element)) {

                $this->checker->setBracketsStack($this->bracesClass->findInBrackets($element));

             } else if ($this->bracesClass->isInBracketMapFlipped($element)) {
   
                  $this->expected = $this->popArray($this->checker->getBracketsStack());
   
                  if(($this->expected === NULL) || ($element != $this->expected)) {

                       $this->checker->setCountOfUnClosedBrackets(); 

                       $this->checker->setReplaceBrokenBrackets($i,$this->expected); 

                   }
                   
            }
          }

    
        

   
   
        
         return true;
    }


    protected function popArray (array $element):string
    {
        return array_pop($element);
    }

    
    
}