<?php
declare(strict_types=1);

namespace App\Entity;


interface AutoCreateable
{
    public function getId(): ?int;

    public function setName(string $name);
}