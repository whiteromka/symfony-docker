<?php

namespace App\Enum;

enum QuestionStatus: int
{
    case ACTIVE = 1;
    case DISACTIVE = 0;

    public function getLabel(): int
    {
        return $this->value;
    }
}