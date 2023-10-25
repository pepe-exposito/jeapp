<?php

namespace App\Entity;

use App\Repository\MaquinasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MaquinasRepository::class)]
class Maquinas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column]
    private ?int $tipo = null;

    #[ORM\ManyToMany(targetEntity: Clientes::class, inversedBy: 'maquinas_id')]
    private Collection $cliente_id;

    public function __construct()
    {
        $this->cliente_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getTipo(): ?int
    {
        return $this->tipo;
    }

    public function setTipo(int $tipo): static
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * @return Collection<int, Clientes>
     */
    public function getClienteId(): Collection
    {
        return $this->cliente_id;
    }

    public function addClienteId(Clientes $clienteId): static
    {
        if (!$this->cliente_id->contains($clienteId)) {
            $this->cliente_id->add($clienteId);
        }

        return $this;
    }

    public function removeClienteId(Clientes $clienteId): static
    {
        $this->cliente_id->removeElement($clienteId);

        return $this;
    }

    public function toArray(): array
    {
        $clientesArray = [];
        foreach ($this->cliente_id as $cliente) {
            $clientesArray[] = $cliente->toArray();
        }

        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'tipo' => $this->tipo,
            'clientes' => $clientesArray,
        ];
    }
}
