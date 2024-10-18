<?php

namespace Bfg\Task;

class PinGenerator
{
    public function generate(int $totalNumberOfPin = 5, int $length = 4)
    {
        $pins = [];
        while (count($pins) < $totalNumberOfPin) 
        {
            $pin = $this->generatePin($length);
          
            if (!in_array($pin, $pins) && !$this->isObvious($pin)) 
            {
                $pins[] = $pin;
            }
        }
        return $pins;
    }

    private function generatePin(int $length)
    {
        return str_pad(rand(0, 9999), $length, '0');
    }

    private function isObvious($pin)
    {
        // Check for sequential numbers , repeating numbers and Check for palindrome
        if ($this->isSequential($pin) || $this->isRepeating($pin) || $this->isPalindrome($pin))
        {
            return true;
        } 
        
        return false;
    }

    private function isSequential($pin)
    {
        return $pin === implode('', range($pin[0], $pin[0] + 3)) || 
               $pin === implode('', array_reverse(range($pin[0], $pin[0] + 3)));
    }

    private function isRepeating($pin)
    {
        return preg_match('/^(.)\1{1,}$/', $pin) || preg_match('/^(\d)(\d)\2\1$/', $pin);
    }

    private function isPalindrome($pin)
    {
        return $pin === strrev($pin);
    }
}
