<?php


namespace Calc;


use DateTime;

class CalcSaveDataFile implements CalcSaveDataInterface
{

    /**
     * @inheritDoc
     */
    public function saveData(CalcData $calcData): void
    {
        file_put_contents(
            PROJECT_DIR . '/var/calcData.data',
            json_encode(
                [
                    'createTime' => new DateTime(),
                    'userName' => $calcData->getUserName(),
                    'number1' => $calcData->getNumber1(),
                    'number2' => $calcData->getNumber2(),
                ]
            ),
            FILE_APPEND
        );
    }
}