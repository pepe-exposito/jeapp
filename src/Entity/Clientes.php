<?php

namespace App\Entity;

use App\Repository\ClientesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientesRepository::class)]
class Clientes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $apellido = null;

    #[ORM\Column(length: 9)]
    private ?string $dni = null;

    #[ORM\ManyToMany(targetEntity: Maquinas::class, mappedBy: 'cliente_id')]
    private Collection $maquinas_id;

    public function __construct()
    {
        $this->maquinas_id = new ArrayCollection();
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

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): static
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getDni(): ?string
    {
        return $this->dni;
    }

    public function setDni(string $dni): static
    {
        $this->dni = $dni;

        return $this;
    }

    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'nombre' => $this->getNombre(),
            'apellido' => $this->getApellido(),
            'dni' => $this->getDni(),
            // Add more properties as needed
        ];
    }

    /**
     * @return Collection<int, Maquinas>
     */
    public function getMaquinasId(): Collection
    {
        return $this->maquinas_id;
    }

    public function addMaquinasId(Maquinas $maquinasId): static
    {
        if (!$this->maquinas_id->contains($maquinasId)) {
            $this->maquinas_id->add($maquinasId);
            $maquinasId->addClienteId($this);
        }

        return $this;
    }

    public function removeMaquinasId(Maquinas $maquinasId): static
    {
        if ($this->maquinas_id->removeElement($maquinasId)) {
            $maquinasId->removeClienteId($this);
        }

        return $this;
    }
}
