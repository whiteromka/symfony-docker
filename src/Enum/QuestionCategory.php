<?php

namespace App\Enum;

enum QuestionCategory: string
{
    case COMMON = 'common';
    case PHP = 'php';
    case JS = 'js';
    case SQL = 'sql';

    public function getLabel(): string
    {
        return match($this) {
            QuestionCategory::COMMON => 'Общие вопросы',
            QuestionCategory::PHP => 'PHP',
            QuestionCategory::JS => 'JavaScript',
            QuestionCategory::SQL => 'SQL',
        };
    }
}