<?php

namespace Library\PhpSpreadsheet\Calculation\Financial\Securities;

use Library\PhpSpreadsheet\Calculation\Exception;
use Library\PhpSpreadsheet\Calculation\Financial\FinancialValidations;
use Library\PhpSpreadsheet\Calculation\Functions;

class SecurityValidations extends FinancialValidations
{
    /**
     * @param mixed $issue
     */
    public static function validateIssueDate($issue): float
    {
        return self::validateDate($issue);
    }

    /**
     * @param mixed $settlement
     * @param mixed $maturity
     */
    public static function validateSecurityPeriod($settlement, $maturity): void
    {
        if ($settlement >= $maturity) {
            throw new Exception(Functions::NAN());
        }
    }

    /**
     * @param mixed $redemption
     */
    public static function validateRedemption($redemption): float
    {
        $redemption = self::validateFloat($redemption);
        if ($redemption <= 0.0) {
            throw new Exception(Functions::NAN());
        }

        return $redemption;
    }
}
