<?php


namespace Esc\Service;

use Esc\Services\Read\ReadEntityData;
use Esc\Services\Writer\CsvWriter;
use Esc\Services\Writer\ExcelWriter;
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
