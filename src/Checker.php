<?php

namespace BracesChecker;

use BracesChecker\Braces;
use BracesChecker\CheckerInterface;
use BracesChecker\Exceptions\EmptySentenceException;
use BracesChecker\Exceptions\InvalidSentenceException;
use BracesChecker\Exceptions\InvalidCharactersException;
use BracesChecker\Exceptions\ToManyUnClosedBracketsException;

class Checker implements CheckerInterface {

    private  $bracesClass;
    private  $bracketsStack = [];
    private  $countOfUnClosedBrackets = 0;
    private  $replaceBrokenBrackets = [];

    public function __construct(Braces $bracesClass)
    {
        $this->bracesClass = $bracesClass;
        $this->class = static::class;


    }

    public function check(string $sentence): void
    {
        $this->validate($sentence);
        $this->isCorrect($sentence);
    }

    public function getBracketsStack ()
    {
        return $this->bracketsStack;
    }

   

    public function setBracketsStack ($value)
    {
        return $this->bracketsStack[] = $value;
    }

    public function setCountOfUnClosedBrackets ($value = 1)
    {
        return $this->countOfUnClosedBrackets += $value;
    }

    public function setReplaceBrokenBrackets ($i, $element)
    {
        return $this->replaceBrokenBrackets[$i] = $element;
    }

  


  
    protected function isCorrect(string $sentence)
    {
         $length = mb_strlen($sentence);
      
         for ($i = 0; $i < $length; $i++) {
            $current_char = $sentence[$i];
            $bracesAdapter = new BracesAdapter($this->bracesClass, $this);
            $bracesAdapter->MatchType($current_char, $i);
          }

        if($this->countOfUnClosedBrackets > 10 ){
            throw new ToManyUnClosedBracketsException("There are at least 10 unclosed brackets or pharanteses | Count : $this->countOfUnClosedBrackets "); 
        }else if($this->countOfUnClosedBrackets <= 10){
            throw new InvalidSentenceException("There is/are broken pharanteses or brackets | Count : $this->countOfUnClosedBrackets "); 
        }else{
            echo 'Success. There is no error.';
        }
     
        return empty($$this->bracketsStack);
     
         
    }

  
    protected function validate(string $sentence): void
    {
        if (empty($sentence)) {
             throw new EmptySentenceException("Sentence can not be empty");
        }

     
        $sentenceChars = str_split($sentence);

        if (count(array_diff($sentenceChars, $this->bracesClass->getAvailableChars()))) {
            throw new InvalidCharactersException("Sentence contains invalid symbols");
        }

    }


}
