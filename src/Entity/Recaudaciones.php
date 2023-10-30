<?php

namespace App\Entity;

use App\Repository\RecaudacionesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

#[ORM\Entity(repositoryClass: RecaudacionesRepository::class)]
class Recaudaciones
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fecha = null;

    #[ORM\Column]
    private ?int $cantidad = null;

    #[ORM\OneToOne(inversedBy: 'recaudacion', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Maquinas $maquina = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(): static
    {
        $this->fecha = new DateTime("now");

        return $this;
    }

    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad): static
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'fecha' => $this->fecha,
            'cantidad' => $this->cantidad
        ];
    }

    public function getMaquina(): ?Maquinas
    {
        return $this->maquina;
    }

    public function setMaquina(Maquinas $maquina): static
    {
        $this->maquina = $maquina;

        return $this;
    }

}
