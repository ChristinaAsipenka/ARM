<?php

namespace Library\PhpSpreadsheet\Calculation\LookupRef;

use Library\PhpSpreadsheet\Calculation\Exception;
use Library\PhpSpreadsheet\Calculation\Functions;

class LookupRefValidations
{
    /**
     * @param mixed $value
     */
    public static function validateInt($value): int
    {
        if (!is_numeric($value)) {
            if (Functions::isError($value)) {
                throw new Exception($value);
            }

            throw new Exception(Functions::VALUE());
        }

        return (int) floor((float) $value);
    }

    /**
     * @param mixed $value
     */
    public static function validatePositiveInt($value, bool $allowZero = true): int
    {
        $value = self::validateInt($value);

        if (($allowZero === false && $value <= 0) || $value < 0) {
            throw new Exception(Functions::VALUE());
        }

        return $value;
    }
}
