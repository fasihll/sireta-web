<?php

namespace App\Services;

/**
 * Class AhpServices.
 */
class AhpServices
{
  public static function ahpCalculation($comparisonMatrix): array
  {
    $n = count($comparisonMatrix);
    $sumColumn = [];
    $sumRow = [];
    $weights = [];
    $eigenValues = [];
    $lambdaMax = 0;
    $consistencyIndex = 0;
    $consistencyRatio = 0;

    // Calculate sum of columns
    for ($i = 0; $i < $n; $i++) {
      $sumColumn[$i] = array_sum(array_column($comparisonMatrix, $i));
    }

    // Calculate normalized matrix (if you haven't done it yet)
    $normalizedMatrix = [];
    for ($i = 0; $i < $n; $i++) {
      for ($j = 0; $j < $n; $j++) {
        $normalizedMatrix[$i][$j] = $comparisonMatrix[$i][$j] / $sumColumn[$j];
      }
    }

    $sumRowNormalized = [];
    for ($i = 0; $i < $n; $i++) {
      $sumRowNormalized[$i] = array_sum($normalizedMatrix[$i]); // Sum of each row
    }

    // Calculate weights (priorities)
    for ($i = 0; $i < $n; $i++) {
      $weights[$i] = array_sum($normalizedMatrix[$i]) / $n; // average of each row
    }

    // Calculate eigenvalues
    for ($i = 0; $i < $n; $i++) {
      $eigenValues[$i] = $weights[$i] * $sumColumn[$i]; // prioritas * total kriteria
    }

    // Calculate lambda max
    $lambdaMax = array_sum($eigenValues);

    // Calculate consistency index and ratio
    $consistencyIndex = ($lambdaMax - $n) / ($n - 1);

    $randomIndex = self::getRandomIndex($n);

    $consistencyRatio = $consistencyIndex / $randomIndex;

    return [
      'comparisonMatrix' => $comparisonMatrix,
      'normalizedMatrix' => $normalizedMatrix,
      'sumColumn' => $sumColumn,
      'sumRowNormalized' => $sumRowNormalized,
      'weights' => $weights,
      'eigenValues' => $eigenValues,
      'lambdaMax' => $lambdaMax,
      'consistencyIndex' => $consistencyIndex,
      'randomIndex' => $randomIndex,
      'consistencyRatio' => $consistencyRatio,
    ];
  }

  public static function getRandomIndex($n)
  {
    $randomIndices = [0, 0, 0.58, 0.9, 1.12, 1.24, 1.32, 1.41, 1.45]; // Example values
    return $randomIndices[$n - 1] ?? 1.45; // Return the last value for n > 9
  }
}
