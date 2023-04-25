<?php

namespace App\Entity;

use App\Repository\BuyerRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: BuyerRepository::class)]
class Buyer
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

    #[ORM\Column]
    private ?int $phone = null;

    #[ORM\Column(length: 255)]
    private ?string $adress = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\OneToOne(inversedBy: 'buyer', targetEntity: self::class, cascade: ['persist', 'remove'])]
    private ?self $user = null;

    #[ORM\OneToOne(mappedBy: 'user', targetEntity: self::class, cascade: ['persist', 'remove'])]
    private ?self $buyer = null;

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

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getUser(): ?self
    {
        return $this->user;
    }

    public function setUser(?self $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getBuyer(): ?self
    {
        return $this->buyer;
    }

    public function setBuyer(?self $buyer): self
    {
        // unset the owning side of the relation if necessary
        if ($buyer === null && $this->buyer !== null) {
            $this->buyer->setUser(null);
        }

        // set the owning side of the relation if necessary
        if ($buyer !== null && $buyer->getUser() !== $this) {
            $buyer->setUser($this);
        }

        $this->buyer = $buyer;

        return $this;
    }
}
