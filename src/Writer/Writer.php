<?php


namespace Esc\Writer;

use Esc\Services\Export\ExportData;
use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\IWriter;

abstract class Writer
{
    private $exportFolder;
    private $exportData;

    public function __construct(string $exportFolder, ExportData $exportData)
    {
        $this->exportFolder = $exportFolder;
        $this->exportData = $exportData;
    }

    abstract public function create(Spreadsheet $spreadsheet): IWriter;

    abstract public function getExtension(): string;

    /**
     * @param $data
     * @param $fileName
     * @throws Exception
     */

    public function save($data, $fileName): void
    {
        $spreadsheet = $this->exportData->createSpreadsheet($data);
        $writer = $this->create($spreadsheet);
        $writer->save($this->exportFolder . $fileName . $this->getExtension());
    }
}
