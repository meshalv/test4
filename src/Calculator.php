<?php

namespace src;

/**
 * Class Calculator
 */
class Calculator
{
    /**
     * @var string
     */
    private $first;

    /**
     * @var string
     */
    private $second;

    /**
     * Calculator constructor.
     * @param $first string
     * @param $second string
     * @throws Exception
     */
    public function __construct($first, $second)
    {
        if (!is_string($first) || !is_string($second)) {
            throw new \Exception('All params must be string');
        }

        $this->first = $first;
        $this->second = $second;
    }

    /**
     * @return string
     */
    public function sum()
    {
        $long = $this->second;
        $short = $this->first;
        if (mb_strlen($this->first) > mb_strlen($this->second)) {
            $long = $this->first;
            $short = $this->second;
        }

        $short = str_pad($short, mb_strlen($long), "0", STR_PAD_LEFT);

        $add = 0;
        $sum = '';
        for ($i = mb_strlen($long) - 1; $i >= 0; $i--) {
            $value = (int)$short[$i] + (int)$long[$i] + $add;
            $add = 0;
            if ($value >= 10) {
                $add = 1;
                $value = $value - 10;
            }
            $sum .= $value;
        }
        $sum .= $add ? '1' : '';

        return strrev($sum);
    }
}
