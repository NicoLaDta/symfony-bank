<?php

namespace App\Entity;

use App\Repository\TransactionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TransactionRepository::class)
 */
class Transaction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="transactions")
     */
    private $user;

    /**
     * @ORM\Column(type="float")
     */
    private $amount;

    /**
     * @ORM\ManyToOne(targetEntity=BankAccount::class, inversedBy="debit")
     * @ORM\JoinColumn(nullable=false)
     */
    private $debitedAccount;

    /**
     * @ORM\ManyToOne(targetEntity=BankAccount::class, inversedBy="credit")
     * @ORM\JoinColumn(nullable=false)
     */
    private $CreditedAccount;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getDebitedAccount(): ?BankAccount
    {
        return $this->debitedAccount;
    }

    public function setDebitedAccount(?BankAccount $debitedAccount): self
    {
        $this->debitedAccount = $debitedAccount;

        return $this;
    }

    public function getCreditedAccount(): ?BankAccount
    {
        return $this->CreditedAccount;
    }

    public function setCreditedAccount(?BankAccount $CreditedAccount): self
    {
        $this->CreditedAccount = $CreditedAccount;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
}
