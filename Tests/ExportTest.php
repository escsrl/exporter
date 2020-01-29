<?php


use PHPUnit\Framework\TestCase;

class ExportTest extends TestCase
{
    public function createSpreadsheetEmptyData(){
        $spreadsheet = $this->getMockBuilder(PhpSpreadsheet::class)
            ->getMock();
    }

    public function createSpreadsheet(){
    }
}