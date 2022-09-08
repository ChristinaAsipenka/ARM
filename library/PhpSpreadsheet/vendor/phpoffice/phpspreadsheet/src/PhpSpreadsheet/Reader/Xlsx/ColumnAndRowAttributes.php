<?php

namespace Library\PhpSpreadsheet\Reader\Xlsx;

use Library\PhpSpreadsheet\Cell\Coordinate;
use Library\PhpSpreadsheet\Reader\IReadFilter;
use Library\PhpSpreadsheet\Worksheet\Worksheet;
use SimpleXMLElement;

class ColumnAndRowAttributes extends BaseParserClass
{
    private $worksheet;

    private $worksheetXml;

    public function __construct(Worksheet $workSheet, ?SimpleXMLElement $worksheetXml = null)
    {
        $this->worksheet = $workSheet;
        $this->worksheetXml = $worksheetXml;
    }

    /**
     * Set Worksheet column attributes by attributes array passed.
     *
     * @param string $columnAddress A, B, ... DX, ...
     * @param array $columnAttributes array of attributes (indexes are attribute name, values are value)
     *                               'xfIndex', 'visible', 'collapsed', 'outlineLevel', 'width', ... ?
     */
    private function setColumnAttributes($columnAddress, array $columnAttributes): void
    {
        if (isset($columnAttributes['xfIndex'])) {
            $this->worksheet->getColumnDimension($columnAddress)->setXfIndex($columnAttributes['xfIndex']);
        }
        if (isset($columnAttributes['visible'])) {
            $this->worksheet->getColumnDimension($columnAddress)->setVisible($columnAttributes['visible']);
        }
        if (isset($columnAttributes['collapsed'])) {
            $this->worksheet->getColumnDimension($columnAddress)->setCollapsed($columnAttributes['collapsed']);
        }
        if (isset($columnAttributes['outlineLevel'])) {
            $this->worksheet->getColumnDimension($columnAddress)->setOutlineLevel($columnAttributes['outlineLevel']);
        }
        if (isset($columnAttributes['width'])) {
            $this->worksheet->getColumnDimension($columnAddress)->setWidth($columnAttributes['width']);
        }
    }

    /**
     * Set Worksheet row attributes by attributes array passed.
     *
     * @param int $rowNumber 1, 2, 3, ... 99, ...
     * @param array $rowAttributes array of attributes (indexes are attribute name, values are value)
     *                               'xfIndex', 'visible', 'collapsed', 'outlineLevel', 'rowHeight', ... ?
     */
    private function setRowAttributes($rowNumber, array $rowAttributes): void
    {
        if (isset($rowAttributes['xfIndex'])) {
            $this->worksheet->getRowDimension($rowNumber)->setXfIndex($rowAttributes['xfIndex']);
        }
        if (isset($rowAttributes['visible'])) {
            $this->worksheet->getRowDimension($rowNumber)->setVisible($rowAttributes['visible']);
        }
        if (isset($rowAttributes['collapsed'])) {
            $this->worksheet->getRowDimension($rowNumber)->setCollapsed($rowAttributes['collapsed']);
        }
        if (isset($rowAttributes['outlineLevel'])) {
            $this->worksheet->getRowDimension($rowNumber)->setOutlineLevel($rowAttributes['outlineLevel']);
        }
        if (isset($rowAttributes['rowHeight'])) {
            $this->worksheet->getRowDimension($rowNumber)->setRowHeight($rowAttributes['rowHeight']);
        }
    }

    /**
     * @param IReadFilter $readFilter
     * @param bool $readDataOnly
     */
    public function load(?IReadFilter $readFilter = null, $readDataOnly = false): void
    {
        if ($this->worksheetXml === null) {
            return;
        }

        $columnsAttributes = [];
        $rowsAttributes = [];
        if (isset($this->worksheetXml->cols)) {
            $columnsAttributes = $this->readColumnAttributes($this->worksheetXml->cols, $readDataOnly);
        }

        if ($this->worksheetXml->sheetData && $this->worksheetXml->sheetData->row) {
            $rowsAttributes = $this->readRowAttributes($this->worksheetXml->sheetData->row, $readDataOnly);
        }

        // set columns/rows attributes
        $columnsAttributesAreSet = [];
        foreach ($columnsAttributes as $columnCoordinate => $columnAttributes) {
            if (
                $readFilter === null ||
                !$this->isFilteredColumn($readFilter, $columnCoordinate, $rowsAttributes)
            ) {
                if (!isset($columnsAttributesAreSet[$columnCoordinate])) {
                    $this->setColumnAttributes($columnCoordinate, $columnAttributes);
                    $columnsAttributesAreSet[$columnCoordinate] = true;
                }
            }
        }

        $rowsAttributesAreSet = [];
        foreach ($rowsAttributes as $rowCoordinate => $rowAttributes) {
            if (
                $readFilter === null ||
                !$this->isFilteredRow($readFilter, $rowCoordinate, $columnsAttributes)
            ) {
                if (!isset($rowsAttributesAreSet[$rowCoordinate])) {
                    $this->setRowAttributes($rowCoordinate, $rowAttributes);
                    $rowsAttributesAreSet[$rowCoordinate] = true;
                }
            }
        }
    }

    private function isFilteredColumn(IReadFilter $readFilter, $columnCoordinate, array $rowsAttributes)
    {
        foreach ($rowsAttributes as $rowCoordinate => $rowAttributes) {
            if (!$readFilter->readCell($columnCoordinate, $rowCoordinate, $this->worksheet->getTitle())) {
                return true;
            }
        }

        return false;
    }

    private function readColumnAttributes(SimpleXMLElement $worksheetCols, $readDataOnly)
    {
        $columnAttributes = [];

        foreach ($worksheetCols->col as $column) {
            $startColumn = Coordinate::stringFromColumnIndex((int) $column['min']);
            $endColumn = Coordinate::stringFromColumnIndex((int) $column['max']);
            ++$endColumn;
            for ($columnAddress = $startColumn; $columnAddress !== $endColumn; ++$columnAddress) {
                $columnAttributes[$columnAddress] = $this->readColumnRangeAttributes($column, $readDataOnly);

                if ((int) ($column['max']) == 16384) {
                    break;
                }
            }
        }

        return $columnAttributes;
    }

    private function readColumnRangeAttributes(SimpleXMLElement $column, $readDataOnly)
    {
        $columnAttributes = [];

        if ($column['style'] && !$readDataOnly) {
            $columnAttributes['xfIndex'] = (int) $column['style'];
        }
        if (self::boolean($column['hidden'])) {
            $columnAttributes['visible'] = false;
        }
        if (self::boolean($column['collapsed'])) {
            $columnAttributes['collapsed'] = true;
        }
        if (((int) $column['outlineLevel']) > 0) {
            $columnAttributes['outlineLevel'] = (int) $column['outlineLevel'];
        }
        $columnAttributes['width'] = (float) $column['width'];

        return $columnAttributes;
    }

    private function isFilteredRow(IReadFilter $readFilter, $rowCoordinate, array $columnsAttributes)
    {
        foreach ($columnsAttributes as $columnCoordinate => $columnAttributes) {
            if (!$readFilter->readCell($columnCoordinate, $rowCoordinate, $this->worksheet->getTitle())) {
                return true;
            }
        }

        return false;
    }

    private function readRowAttributes(SimpleXMLElement $worksheetRow, $readDataOnly)
    {
        $rowAttributes = [];

        foreach ($worksheetRow as $row) {
            if ($row['ht'] && !$readDataOnly) {
                $rowAttributes[(int) $row['r']]['rowHeight'] = (float) $row['ht'];
            }
            if (self::boolean($row['hidden'])) {
                $rowAttributes[(int) $row['r']]['visible'] = false;
            }
            if (self::boolean($row['collapsed'])) {
                $rowAttributes[(int) $row['r']]['collapsed'] = true;
            }
            if ((int) $row['outlineLevel'] > 0) {
                $rowAttributes[(int) $row['r']]['outlineLevel'] = (int) $row['outlineLevel'];
            }
            if ($row['s'] && !$readDataOnly) {
                $rowAttributes[(int) $row['r']]['xfIndex'] = (int) $row['s'];
            }
        }

        return $rowAttributes;
    }
}
