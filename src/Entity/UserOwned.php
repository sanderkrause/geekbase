<?php
declare(strict_types=1);

namespace App\Entity;

interface UserOwned
{
    public function getUser(): User;
}