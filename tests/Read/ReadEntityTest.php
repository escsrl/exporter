<?php

namespace Esc\Tests\Read;

use Doctrine\ORM\EntityManagerInterface;
use Esc\ExportableInterface\Exportable;
use Esc\Read\ReadEntityData;
use PHPUnit\Framework\TestCase;

class ReadEntityTest extends TestCase
{
    public function testIfMethodReturnDataArray(): void
    {
        $entityManager = $this->getMockBuilder(EntityManagerInterface::class)
            ->getMock();
        $repository = $this->getMockBuilder(Exportable::class)
            ->disableOriginalConstructor()
            ->getMock();
        $repository->method('getExportData')
            ->willReturn([]);
        //__CLASS_ indica una qualsiasi classe esistente
        $entityManager->method('getRepository')
            ->with(__CLASS__)
            ->willReturn($repository);
        $readEntityData = new ReadEntityData($entityManager);
        $data = $readEntityData->getDataFromRepository(__CLASS__);
        $this->assertIsArray($data);
    }

    public function testIfClassExists(): void
    {
        $entityManager = $this->getMockBuilder(EntityManagerInterface::class)
            ->getMock();
        $readEntityData = new ReadEntityData($entityManager);
        $this->expectException(\RuntimeException::class);
        $readEntityData->getDataFromRepository('foo');
    }

    public function testIfClassImplementsExportable(): void
    {
        $entityManager = $this->getMockBuilder(EntityManagerInterface::class)
            ->getMock();
        $readEntityData = new ReadEntityData($entityManager);
        $this->expectException(\RuntimeException::class);
        $readEntityData->getDataFromRepository(__CLASS__);
    }
}
