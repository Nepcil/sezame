<?php

namespace App\Entity;

use App\Repository\AuthorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuthorRepository::class)]
class Author
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\Column(length: 255)]
    private ?string $books = null;

    #[ORM\OneToMany(mappedBy: 'relation', targetEntity: Book::class)]
    private Collection $book;

    #[ORM\ManyToMany(targetEntity: self::class)]
    private Collection $Book;

    public function __construct()
    {
        $this->book = new ArrayCollection();
        $this->Book = new ArrayCollection();
    }

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

    public function getBooks(): ?string
    {
        return $this->books;
    }

    public function setBooks(string $books): self
    {
        $this->books = $books;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getBook(): Collection
    {
        return $this->Book;
    }

    public function addBook(self $book): self
    {
        if (!$this->Book->contains($book)) {
            $this->Book->add($book);
        }

        return $this;
    }

    public function removeBook(self $book): self
    {
        $this->Book->removeElement($book);

        return $this;
    }

}
