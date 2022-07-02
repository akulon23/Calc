<?php


namespace Calc;

/**
 * Interface CalcSaveDataInterface
 * @package Calc
 */
interface CalcSaveDataInterface
{
    /**
     * @param CalcData $calcData
     */
    public function saveData(CalcData $calcData): void;

}