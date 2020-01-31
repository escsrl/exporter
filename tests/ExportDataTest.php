<?php


namespace App\Tests;

use Esc\Export\ExportData;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PHPUnit\Framework\TestCase;

class ExportDataTest extends TestCase
{
    public function testCreateEmptySpreadsheet(): void
    {
        $spreadsheet = $this->getMockBuilder(Spreadsheet::class)
            ->getMock();
        $worksheet = $this->getMockBuilder(Worksheet::class)
            ->getMock();
        $worksheet->expects($this->once())
            ->method('fromArray')
            ->with(['No data'], null, 'A1');
        $spreadsheet->method('getActiveSheet')
            ->willReturn($worksheet);
        $exportData = new ExportData($spreadsheet);
        $sheetResult = $exportData->createSpreadsheet([]);
        $this->assertSame($sheetResult, $spreadsheet);
    }

    public function testCreateSpreadsheet(): void
    {
        $spreadsheet = $this->getMockBuilder(Spreadsheet::class)
            ->getMock();
        $worksheet = $this->getMockBuilder(Worksheet::class)
            ->getMock();
        $data = $data = [
            0 =>
                [
                    'foo' => 1,
                    'bar' => 2,
                    'baz' => 3,
                ]
        ];
        $worksheet->expects($this->exactly(2))
            ->method('fromArray')
            ->withConsecutive(
                [array_keys($data[0]), null, 'A1'],
                [$data, null, 'A2']
            );
        $spreadsheet->method('getActiveSheet')
            ->willReturn($worksheet);
        $exportData = new ExportData($spreadsheet);
        $sheetResult = $exportData->createSpreadsheet($data);
        $this->assertSame($sheetResult, $spreadsheet);

    }
}
