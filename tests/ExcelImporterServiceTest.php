<?php

use Doctrine\ORM\EntityManager;
use App\services\ExcelImporterService;
use PHPUnit\Framework\TestCase;

class ExcelImporterServiceTest extends TestCase {
    public function test_excel_import_converts_XlsX_to_array() {
        $excelImporter = new ExcelImporterService(EntityManager::class);
        $this->assertEquals(
            [['Coco' => 1, 'Lolo' => 'Oui']],
            $excelImporter->excelImport('tests/testData/mock.xlsx')
        );
    }

    public function testDataImport()
    {
        $excelImporter = new ExcelImporterService(EntityManager::class);
        $this->assertNull($excelImporter->importBandDataToDatabase('tests/testDara/Copy of test.xlsx'));
    }
}