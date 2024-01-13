<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: NewsLetter::class)]
    private Collection $NewsLetter;

    public function __construct()
    {
        $this->NewsLetter = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, NewsLetter>
     */
    public function getNewsLetter(): Collection
    {
        return $this->NewsLetter;
    }

    public function addNewsLetter(NewsLetter $newsLetter): static
    {
        if (!$this->NewsLetter->contains($newsLetter)) {
            $this->NewsLetter->add($newsLetter);
            $newsLetter->setCategory($this);
        }

        return $this;
    }

    public function removeNewsLetter(NewsLetter $newsLetter): static
    {
        if ($this->NewsLetter->removeElement($newsLetter)) {
            // set the owning side to null (unless already changed)
            if ($newsLetter->getCategory() === $this) {
                $newsLetter->setCategory(null);
            }
        }

        return $this;
    }
}
