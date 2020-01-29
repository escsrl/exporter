<?php


namespace Esc\Read;

use Esc\ExportableInterface\Exportable;
use Doctrine\ORM\EntityManagerInterface;

class ReadEntityData
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getDataFromRepository(string $className)
    {
        if (!class_exists($className)) {
            throw new \RuntimeException('Class ' . $className . ' does not exist.');
        }

        $repository = $this->entityManager->getRepository($className);

        if (!$repository instanceof Exportable) {
            throw new \RuntimeException('Invalid class.');
        }
        return $repository->getExportData();
    }
}
