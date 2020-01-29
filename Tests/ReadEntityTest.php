<?php


use Doctrine\ORM\EntityManagerInterface;
use Esc\Read\ReadEntityData;
use PHPUnit\Framework\TestCase;

class ReadEntityTest extends TestCase
{
    public function getDataFromRepository(){
        $vetturaRepository = $this->getMockBuilder(VetturaRepository::class)
            ->disableOriginalConstructor()
            ->getMock();
        $readEntityData = $this->getMockBuilder(ReadEntityData::class)
            ->getMock();
        $entityManager = $this->getMockBuilder(EntityManagerInterface::class)
            ->getMock();
        $repository = $entityManager->method('getRepository')
            ->with(Vettura::class)
            ->willReturn($vetturaRepository);
        $readEntityData->method('getDataFromRepository')
            ->willReturn([]);
    }

    public function getDataNotExixtingClass(){
        $readEntityData = $this->getMockBuilder(ReadEntityData::class)
            ->getMock();
        $readEntityData->method('getDataFromRepository')
            ->willReturn(new Exception());
    }
}