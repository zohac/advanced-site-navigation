<?php

namespace App\Service;

use App\Entity\HTMLLiElement;
use App\Entity\HTMLOListElement;
use Doctrine\ORM\EntityManagerInterface;

class HTMLOListElementService extends HTMLElementService
{
    public EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getNewHTMLOListElement(): HTMLOListElement
    {
        $HTMLOListElement = new HTMLOListElement();

        $this->entityManager->persist($HTMLOListElement);
        $this->entityManager->flush();

        return $HTMLOListElement;
    }
}
