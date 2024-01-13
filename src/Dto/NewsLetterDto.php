<?php
namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class NewsLetterDto{
    #[Assert\NotBlank (message : "title required")]
    private ?string $title;
    #[Assert\NotBlank]
    private ?string $description;
    #[Assert\NotBlank]
    private ?string $category;

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(?string $category): static
    {
        $this->category = $category;

        return $this;
    }
}