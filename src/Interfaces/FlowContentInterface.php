<?php

namespace App\Interfaces;

interface FlowContentInterface
{
    public function getId(): ?int;

    /**
     * @return string[]
     */
    public function getContentType(): array;
}
