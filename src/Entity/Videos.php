<?php

namespace App\Entity;

use App\Repository\VideosRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

#[ORM\Entity(repositoryClass: VideosRepository::class)]
class Videos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $duracion = null;

    #[ORM\ManyToOne(inversedBy: 'videos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Maquinas $maquina = null;

    public function __construct(){
        
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

    public function getDuracion(): ?\DateTimeInterface
    {
        return $this->duracion;
    }

    public function setDuracion(): static
    {
        $timestamp = random_int(0, time());
        $date = new DateTime();
        $date->setTimestamp($timestamp);

        $this->duracion = $date;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'duracion' => $this->duracion !== null ? $this->duracion->format('H:i:s') : null,
        ];
    }

    public function getMaquina(): ?Maquinas
    {
        return $this->maquina;
    }

    public function setMaquina(?Maquinas $maquina): static
    {
        $this->maquina = $maquina;

        return $this;
    }
}
