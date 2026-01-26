<?php

namespace App\Validator;

use Attribute;
use Symfony\Component\Validator\Constraint;

#[Attribute]
class UniqueEmail extends Constraint
{
    public string $message = 'Пользователь с таким email уже зарегистрирован';
}
