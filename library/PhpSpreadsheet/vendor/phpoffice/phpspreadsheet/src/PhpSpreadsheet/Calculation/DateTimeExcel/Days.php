<?php

namespace Library\PhpSpreadsheet\Calculation\DateTimeExcel;

use DateTimeInterface;
use Library\PhpSpreadsheet\Calculation\Exception;
use Library\PhpSpreadsheet\Calculation\Functions;
use Library\PhpSpreadsheet\Shared\Date as SharedDateHelper;

class Days
{
    /**
     * DAYS.
     *
     * Returns the number of days between two dates
     *
     * Excel Function:
     *        DAYS(endDate, startDate)
     *
     * @param DateTimeInterface|float|int|string $endDate Excel date serial value (float),
     * PHP date timestamp (integer), PHP DateTime object, or a standard date string
     * @param DateTimeInterface|float|int|string $startDate Excel date serial value (float),
     * PHP date timestamp (integer), PHP DateTime object, or a standard date string
     *
     * @return int|string Number of days between start date and end date or an error
     */
    public static function between($endDate, $startDate)
    {
        try {
            $startDate = Helpers::getDateValue($startDate);
            $endDate = Helpers::getDateValue($endDate);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        // Execute function
        $PHPStartDateObject = SharedDateHelper::excelToDateTimeObject($startDate);
        $PHPEndDateObject = SharedDateHelper::excelToDateTimeObject($endDate);

        $days = Functions::VALUE();
        $diff = $PHPStartDateObject->diff($PHPEndDateObject);
        if ($diff !== false && !is_bool($diff->days)) {
            $days = $diff->days;
            if ($diff->invert) {
                $days = -$days;
            }
        }

        return $days;
    }
}
