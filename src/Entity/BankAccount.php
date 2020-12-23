<?php

namespace App\Entity;

use App\Repository\BankAccountRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BankAccountRepository::class)
 */
class BankAccount
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $iban;

    /**
     * @ORM\Column(type="integer")
     */
    private $balance;

    /**
     * @ORM\OneToOne(targetEntity=User::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=UserBankAccount::class, mappedBy="bankaccount")
     */
    private $bankAccountOwner;

    /**
     * @ORM\OneToMany(targetEntity=Transaction::class, mappedBy="debitedAccount")
     */
    private $debit;

    /**
     * @ORM\OneToMany(targetEntity=Transaction::class, mappedBy="CreditedAccount")
     */
    private $credit;

    public function __construct()
    {
        $this->bankAccountOwner = new ArrayCollection();
        $this->debit = new ArrayCollection();
        $this->credit = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIban(): ?string
    {
        return $this->iban;
    }

    public function setIban(string $iban): self
    {
        $this->iban = $iban;

        return $this;
    }

    public function getBalance(): ?int
    {
        return $this->balance;
    }

    public function setBalance(int $balance): self
    {
        $this->balance = $balance;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function __toString(){
        return $this->iban;
    }

    /**
     * @return Collection|UserBankAccount[]
     */
    public function getBankAccountOwner(): Collection
    {
        return $this->bankAccountOwner;
    }

    public function addBankAccountOwner(UserBankAccount $bankAccountOwner): self
    {
        if (!$this->bankAccountOwner->contains($bankAccountOwner)) {
            $this->bankAccountOwner[] = $bankAccountOwner;
            $bankAccountOwner->setBankaccount($this);
        }

        return $this;
    }

    public function removeBankAccountOwner(UserBankAccount $bankAccountOwner): self
    {
        if ($this->bankAccountOwner->removeElement($bankAccountOwner)) {
            // set the owning side to null (unless already changed)
            if ($bankAccountOwner->getBankaccount() === $this) {
                $bankAccountOwner->setBankaccount(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Transaction[]
     */
    public function getDebit(): Collection
    {
        return $this->debit;
    }

    public function addDebit(Transaction $debit): self
    {
        if (!$this->debit->contains($debit)) {
            $this->debit[] = $debit;
            $debit->setDebitedAccount($this);
        }

        return $this;
    }

    public function removeDebit(Transaction $debit): self
    {
        if ($this->debit->removeElement($debit)) {
            // set the owning side to null (unless already changed)
            if ($debit->getDebitedAccount() === $this) {
                $debit->setDebitedAccount(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Transaction[]
     */
    public function getCredit(): Collection
    {
        return $this->credit;
    }

    public function addCredit(Transaction $credit): self
    {
        if (!$this->credit->contains($credit)) {
            $this->credit[] = $credit;
            $credit->setCreditedAccount($this);
        }

        return $this;
    }

    public function removeCredit(Transaction $credit): self
    {
        if ($this->credit->removeElement($credit)) {
            // set the owning side to null (unless already changed)
            if ($credit->getCreditedAccount() === $this) {
                $credit->setCreditedAccount(null);
            }
        }

        return $this;
    }
}
