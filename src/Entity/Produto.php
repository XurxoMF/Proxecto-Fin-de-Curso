<?php

namespace App\Entity;

use App\Repository\ProdutoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProdutoRepository::class)]
class Produto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'produtos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Proveedor $proveedor = null;

    #[ORM\Column(length: 32)]
    private ?string $nome = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 7, scale: 2)]
    private ?string $precio = null;

    #[ORM\Column]
    private ?int $cantidade = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProveedor(): ?Proveedor
    {
        return $this->proveedor;
    }

    public function setProveedor(?Proveedor $proveedor): self
    {
        $this->proveedor = $proveedor;

        return $this;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getPrecio(): ?string
    {
        return $this->precio;
    }

    public function setPrecio(string $precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    public function getCantidade(): ?int
    {
        return $this->cantidade;
    }

    public function setCantidade(int $cantidade): self
    {
        $this->cantidade = $cantidade;

        return $this;
    }
    
    public function __toString() {
        return $this->nome;
    }
}
