<?php

namespace App\Service;

use App\Entity\Question;
use App\Repository\QuestionRepository;

class QuestionService
{
    public function __construct(
        private readonly QuestionRepository $questionRepository
    )
    {
    }

    public function getRandomQuestion(): ?Question
    {
        return $this->questionRepository->getRandomQuestion();
    }
}