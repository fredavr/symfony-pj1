<?php

namespace App\Entity;

use App\Repository\ArticlesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ArticlesRepository::class)]
class Articles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(
        min: 5,
        max: 250,
        minMessage: 'Le titre de l\'article doit contenir au moins {{ limit }} caractères',
        maxMessage: 'Le titre de l\'article ne doit pas dépasser {{ limit }} caractères',
    )]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $content = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $subtitle = null;

    #[ORM\Column(length: 15, nullable: true)]
    private ?string $status = null;

    #[ORM\ManyToOne(inversedBy: 'articles')]
    private ?ArticleCategory $categoty = null;

    #[ORM\ManyToOne]
    private ?ArticleTag $tag = null;

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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): static
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of subtitle
     */
    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    /**
     * Set the value of subtitle
     */
    public function setSubtitle(?string $subtitle = null): static
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status = null): static
    {
        $this->status = $status;

        return $this;
    }

    public function getCategoty(): ?ArticleCategory
    {
        return $this->categoty;
    }

    public function setCategoty(?ArticleCategory $categoty): static
    {
        $this->categoty = $categoty;

        return $this;
    }

    public function getTag(): ?ArticleTag
    {
        return $this->tag;
    }

    public function setTag(?ArticleTag $tag): static
    {
        $this->tag = $tag;

        return $this;
    }
}
