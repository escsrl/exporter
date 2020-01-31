<?php


namespace Esc\Export;

use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class ExportData
{
    private $spreadsheet;

    public function __construct(Spreadsheet $spreadsheet)
    {
        $this->spreadsheet = $spreadsheet;
    }

    /**
     * @param $data
     * @return Spreadsheet
     * @throws Exception
     */
    public function createSpreadsheet(array $data): Spreadsheet
    {
        if (empty($data)) {
            $this->spreadsheet->getActiveSheet()->fromArray(['No data'], null, 'A1');
        } else {
            $this->spreadsheet->getActiveSheet()->fromArray(array_keys($data[0]), null, 'A1');
            $this->spreadsheet->getActiveSheet()->fromArray($data, null, 'A2');
        }
        return $this->spreadsheet;
    }
}
