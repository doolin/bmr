<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/BmrCalculator.php';

class BmrCalculatorTest extends TestCase
{
  public function testMaleBmrCalculation()
  {
    $bmr = BmrCalculator::calculate(180, 70, 30, 'male');
    $this->assertEquals(1884.4, $bmr, '', 0.1);
  }

  public function testFemaleBmrCalculation()
  {
    $bmr = BmrCalculator::calculate(150, 65, 25, 'female');
    $this->assertEquals(1494.75, $bmr, '', 0.1);
  }

  public function testInvalidGender()
  {
    $this->expectException(InvalidArgumentException::class);
    BmrCalculator::calculate(150, 65, 25, 'unknown');
  }

  public function testNegativeValues()
  {
    $this->expectException(InvalidArgumentException::class);
    BmrCalculator::calculate(-150, 65, 25, 'male');
  }

  public function testZeroValues()
  {
    $this->expectException(InvalidArgumentException::class);
    BmrCalculator::calculate(0, 65, 25, 'female');
  }
}

