<?php

namespace App\Entity;

use App\Enum\QuestionCategory;
use App\Enum\QuestionStatus;
use App\Repository\QuestionRepository;
use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\HasLifecycleCallbacks]
#[ORM\Entity(repositoryClass: QuestionRepository::class)]
class Question
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true, options: ['collation' => 'utf8mb4_unicode_ci'])]
    private ?string $text = null;

    #[ORM\Column(type: Types::INTEGER, nullable: false, options: ['default' => 5])]
    private int $difficulty = 5;

    #[ORM\Column(
        type: Types::STRING,
        nullable: false,
        enumType: QuestionCategory::class,
        options: ['default' => QuestionCategory::COMMON->value]
    )]
    private QuestionCategory $category = QuestionCategory::COMMON;

    #[ORM\Column(
        type: Types::INTEGER,
        nullable: false,
        enumType: QuestionStatus::class,
        options: ['default' => QuestionStatus::ACTIVE->value]
    )]
    private QuestionStatus $status = QuestionStatus::ACTIVE;

    #[ORM\Column(name: 'created_at', nullable: true)]
    private ?DateTimeImmutable $createdAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): static
    {
        $this->text = $text;

        return $this;
    }

    public function getCreatedAt(): ?DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    #[ORM\PrePersist]
    public function setCreatedAtValue(): void
    {
        $this->createdAt = new DateTimeImmutable();
    }

    public function getDifficulty(): int
    {
        return $this->difficulty;
    }

    public function setDifficulty(int $difficulty): static
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    public function getCategory(): QuestionCategory
    {
        return $this->category;
    }

    public function setCategory(QuestionCategory $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getStatus(): QuestionStatus
    {
        return $this->status;
    }

    public function setStatus(QuestionStatus $status): static
    {
        $this->status = $status;

        return $this;
    }
}
