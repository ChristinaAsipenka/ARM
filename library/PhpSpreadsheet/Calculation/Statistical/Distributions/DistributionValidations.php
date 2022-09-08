<?php

namespace Library\PhpSpreadsheet\Calculation\Statistical\Distributions;

use Library\PhpSpreadsheet\Calculation\Exception;
use Library\PhpSpreadsheet\Calculation\Functions;
use Library\PhpSpreadsheet\Calculation\Statistical\StatisticalValidations;

class DistributionValidations extends StatisticalValidations
{
    /**
     * @param mixed $probability
     */
    public static function validateProbability($probability): float
    {
        $probability = self::validateFloat($probability);

        if ($probability < 0.0 || $probability > 1.0) {
            throw new Exception(Functions::NAN());
        }

        return $probability;
    }
}
