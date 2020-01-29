<?php


namespace Esc\Service;

use Esc\Read\ReadEntityData;
use Esc\Writer\CsvWriter;
use Esc\Writer\ExcelWriter;
use PhpOffice\PhpSpreadsheet\Exception;

class DataService
{
    private $readEntityData;
    private $excelWriter;
    private $csvWriter;

    public function __construct(
        ReadEntityData $readEntityData,
        ExcelWriter $excelWriter,
        CsvWriter $csvWriter
    ) {
        $this->excelWriter = $excelWriter;
        $this->csvWriter = $csvWriter;
        $this->readEntityData = $readEntityData;
    }

    /**
     * @param string $entityName
     * @throws Exception
     */
    public function exportExcelData(string $entityName): void
    {
        $data = $this->readEntityData->getDataFromRepository($entityName);
        $this->excelWriter->save($data, substr($entityName, strrpos($entityName, '\\') + 1));
    }

    /**
     * @param string $entityName
     * @throws Exception
     */
    public function exportCsvData(string $entityName): void
    {
        $data = $this->readEntityData->getDataFromRepository($entityName);
        $this->csvWriter->save($data, substr($entityName, strrpos($entityName, '\\') + 1));
    }
}
