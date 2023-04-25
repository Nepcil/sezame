<?php

namespace App\Entity;

use App\Repository\AuthorRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: AuthorRepository::class)]
class Author
{
    use TimestampableEntity;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $biliography = null;

    // #[ORM\ManyToOne(inversedBy: 'author')]
    // #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    // private ?Book $book = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getBibliography(): ?string
    {
        return $this->biliography;
    }

    public function setBibliography(string $biliography): self
    {
        $this->biliography = $biliography;

        return $this;
    }

    // public function getBooks(): ?string
    // {
    //     return $this->books;
    // }

    // public function setBooks(string $books): self
    // {
    //     $this->books = $books;

    //     return $this;
    // }
}
