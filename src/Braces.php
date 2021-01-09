<?php

namespace BracesChecker;


class Braces {

    private $brackets;
    private $availableChars;
    private $bracket_map_flipped;

    public function __construct(
        array $brackets = ['[' => ']', '{' => '}', '(' => ')'],
        array $availableChars = ["\n", "\t", "\r", " "]
        ) 
    {
        $this->brackets = $brackets;
        $this->bracket_map_flipped = array_flip($this->brackets);
        $this->availableChars = array_merge(array_keys($brackets), array_values($brackets), $availableChars);
    }


    public function getBracket () : array
    {
        return $this->brackets;
    }

    public function findInBrackets ($value):string
    {
        return $this->brackets[$value];
    }

    public function getBracketMapFlipped () : array
    {
        return $this->bracket_map_flipped;
    }

    public function getAvailableChars () : array
    {
        return $this->availableChars;
    }

    public function isInBrackets (string $element) : bool
    {
        return isset($this->brackets[$element]);
    }

    public function isInBracketMapFlipped (string $element) : bool
    {
        return isset($this->bracket_map_flipped[$element]);
    }



}
