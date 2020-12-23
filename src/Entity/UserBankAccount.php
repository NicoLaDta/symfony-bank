<?php

namespace App\Entity;

use App\Repository\UserBankAccountRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserBankAccountRepository::class)
 */
class UserBankAccount
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="bankAccountOwned")
     */
    private $person;

    /**
     * @ORM\ManyToOne(targetEntity=BankAccount::class, inversedBy="bankAccountOwner")
     */
    private $bankaccount;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPerson(): ?User
    {
        return $this->person;
    }

    public function setPerson(?User $person): self
    {
        $this->person = $person;

        return $this;
    }

    public function getBankaccount(): ?BankAccount
    {
        return $this->bankaccount;
    }

    public function setBankaccount(?BankAccount $bankaccount): self
    {
        $this->bankaccount = $bankaccount;

        return $this;
    }
}
