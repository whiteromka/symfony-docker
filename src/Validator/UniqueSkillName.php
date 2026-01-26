<?php

namespace App\Validator;

use Attribute;
use Symfony\Component\Validator\Constraint;

#[Attribute]
class UniqueSkillName extends Constraint
{
    public string $message = 'Навык с названием "{{ value }}" уже существует';
}
