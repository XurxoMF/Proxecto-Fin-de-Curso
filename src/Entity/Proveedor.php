<?php

namespace App\Entity;

use App\Repository\ProveedorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProveedorRepository::class)]
class Proveedor {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 64)]
    private ?string $nome = null;

    #[ORM\Column(length: 9)]
    private ?string $tlf = null;

    #[ORM\Column(length: 64, nullable: true)]
    private ?string $gmail = null;

    #[ORM\OneToMany(mappedBy: 'proveedor', targetEntity: Produto::class, orphanRemoval: true)]
    private Collection $produtos;

    public function __construct() {
        $this->produtos = new ArrayCollection();
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getNome(): ?string {
        return $this->nome;
    }

    public function setNome(string $nome): self {
        $this->nome = $nome;

        return $this;
    }

    public function getTlf(): ?string {
        return $this->tlf;
    }

    public function setTlf(string $tlf): self {
        $this->tlf = $tlf;

        return $this;
    }

    public function getGmail(): ?string {
        return $this->gmail;
    }

    public function setGmail(?string $gmail): self {
        $this->gmail = $gmail;

        return $this;
    }

    /**
     * @return Collection<int, Produto>
     */
    public function getProdutos(): Collection {
        return $this->produtos;
    }

    public function addProduto(Produto $produto): self {
        if (!$this->produtos->contains($produto)) {
            $this->produtos->add($produto);
            $produto->setProveedor($this);
        }

        return $this;
    }

    public function removeProduto(Produto $produto): self {
        if ($this->produtos->removeElement($produto)) {
            // set the owning side to null (unless already changed)
            if ($produto->getProveedor() === $this) {
                $produto->setProveedor(null);
            }
        }

        return $this;
    }
    
    public function __toString() {
        return $this->nome;
    }

}
