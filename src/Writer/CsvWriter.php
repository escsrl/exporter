<?php


namespace Esc\Services\Writer;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Writer\IWriter;

class CsvWriter extends Writer
{
    public function create(Spreadsheet $spreadsheet): IWriter
    {
        return new Csv($spreadsheet);
    }

    public function getExtension(): string
    {
        return '.csv';
    }

}
