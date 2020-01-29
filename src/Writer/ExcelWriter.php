<?php


namespace Esc\Writer;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\IWriter;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExcelWriter extends Writer
{
    public function create(Spreadsheet $spreadsheet): IWriter
    {
        return new Xlsx($spreadsheet);
    }

    public function getExtension(): string
    {
        return '.xlsx';
    }
}
