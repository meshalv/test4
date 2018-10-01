<?php

namespace tests;

use src\Calculator;

include_once __DIR__.'/../src/Calculator.php';

/**
 * Class CalculatorTests
 * @package tests
 */
class CalculatorTests extends \PHPUnit\Framework\TestCase
{
    /**
     * @param $first string
     * @param $second string
     * @param $expected
     * @dataProvider sumDataProvider
     */
    public function testSum($a, $b, $expected)
    {
        try {
            $calculator = new Calculator($a, $b);
            $result = $calculator->sum();
            $this->assertEquals($expected, $result);
        } catch (\Exception $e) {
            $this->assertInstanceOf(\Exception::class, $e);
            $this->assertEquals('All params must be string', $e->getMessage());
        }
    }

    /**
     * @return array
     */
    public function sumDataProvider() {
        $default = ['1', '2', '3'];
        $exception = [1, 2, \Exception::class];

        return [
            $default,
            $exception
        ];
    }
}
