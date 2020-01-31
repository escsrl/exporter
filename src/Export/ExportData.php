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
        $activeSheet = $this->spreadsheet->getActiveSheet();
        if (empty($data)) {
            $activeSheet->fromArray(['No data'], null, 'A1');
        } else {
            $activeSheet->fromArray(array_keys($data[0]), null, 'A1');
            $activeSheet->fromArray($data, null, 'A2');
        }
        return $this->spreadsheet;
    }
}
