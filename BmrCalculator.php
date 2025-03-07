<?php

class BmrCalculator
{
  /**
   * Calculates the Basal Metabolic Rate (BMR) using the Mifflin-St Jeor Equation.
   *
   * LaTeX representation of the formulas:
   *
   * \[
   * \text{BMR}_{\text{male}} = 66 + (6.23 \times \text{weight in lbs}) + (12.7 \times \text{height in inches}) - (6.8 \times \text{age in years})
   * \]
   *
   * \[
   * \text{BMR}_{\text{female}} = 655 + (4.35 \times \text{weight in lbs}) + (4.7 \times \text{height in inches}) - (4.7 \times \text{age in years})
   * \]
   *
   * @param int $weightLbs    Weight in pounds
   * @param int $heightInches Height in inches
   * @param int $ageYears     Age in years
   * @param string $gender    Gender ("male" or "female")
   * @return float BMR value
   * @throws InvalidArgumentException for invalid input
   */
  public static function calculate(int $weightLbs, int $heightInches, int $ageYears, string $gender): float
  {
    if ($weightLbs <= 0 || $heightInches <= 0 || $ageYears <= 0) {
      throw new InvalidArgumentException("All inputs must be positive numbers.");
    }

    $gender = strtolower($gender);
    if (!in_array($gender, ['male', 'female'], true)) {
      throw new InvalidArgumentException("Gender must be 'male' or 'female'.");
    }

    return ($gender === 'male')
      ? (66 + (6.23 * $weightLbs) + (12.7 * $heightInches) - (6.8 * $ageYears))
      : (655 + (4.35 * $weightLbs) + (4.7 * $heightInches) - (4.7 * $ageYears));
  }
}

