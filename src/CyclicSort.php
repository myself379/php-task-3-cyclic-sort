<?php

namespace App;

/**
* Cyclic sorts the input using the ordering.
* @param string input  The input string value.
* @param int ordering  The ordering, > 1.
* @return  The reordered output
*/

class CyclicSort
{
    protected $stringInput;
    protected $cyclicOrder;

    public function __construct(string $stringInput, $cyclicOrder = 2)
    {
        $this->_setStringInput($stringInput);
        $this->_setCyclicOrder($cyclicOrder);
    }

    protected function _setCyclicOrder($cyclicOrder)
    {
        if (! is_int($cyclicOrder)) {
            throw new InvalidArgumentException('Ordering should be integer');
        }

        if ($cyclicOrder < 2) {
            throw new InvalidArgumentException('Ordering should be more than 1');
        }

        $this->cyclicOrder = $cyclicOrder;
    }

    protected function _setStringInput($stringInput)
    {
        if (! is_string($stringInput)) {
            throw new InvalidArgumentException('Only accept string inputs');
        }

        $this->stringInput = $stringInput;
    }

    public function makeSort()
    {
        $collect = str_split($this->stringInput);
        $collectSize = count($collect);

        $cyclicOrder = $this->cyclicOrder;

        $arrayCyclicOrder = $cyclicOrder - 1;
        $currentOffset = 0;

        $arrayBuild = collect();

        for ($iteration = $collectSize; $iteration != 0; $iteration--) {
            $currentOffset = $currentOffset + $arrayCyclicOrder;

            while ($currentOffset > (count($collect) - 1)) {
                $currentOffset = $currentOffset - count($collect);
            }

            // Pull out the value and unset the keys
            $arrayBuild = $arrayBuild->push($collect[$currentOffset]);
            unset($collect[$currentOffset]);
            // Rebuild the array
            $collect = array_merge($collect);
        }

        return $arrayBuild;
    }

    public function reverseSort()
    {
        $collect = collect(str_split($this->stringInput));

        $cyclicOrder = $this->cyclicOrder;

        $arrayBuild = collect();

        $arrayBuild = $arrayBuild->push($collect->pop());

        for ($iteration = count($collect) + 1; $iteration != 0; $iteration--) {
            // Rotate according to cyclic order
            for ($rotation = $cyclicOrder - 1; $rotation != 0; $rotation--) {
                $arrayBuild = $arrayBuild->push($arrayBuild->shift());
            }

            // Push/Append at the end
            $arrayBuild = $arrayBuild->push($collect->pop());
        }

        return $arrayBuild->reverse()->implode('');
    }
}
