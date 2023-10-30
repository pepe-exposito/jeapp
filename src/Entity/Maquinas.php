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

    #[ORM\ManyToMany(targetEntity: Clientes::class, mappedBy: 'maquinas')]
    private Collection $clientes;

    #[ORM\OneToOne(mappedBy: 'maquina', cascade: ['persist', 'remove'])]
    private ?Recaudaciones $recaudacion = null;

    #[ORM\OneToMany(mappedBy: 'maquina', targetEntity: Videos::class)]
    private Collection $videos;


    public function __construct()
    {
        $this->clientes = new ArrayCollection();
        $this->videos = new ArrayCollection();
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

    public function toArray(): array
    {

        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'tipo' => $this->tipo,
        ];
    }

    /**
     * @return Collection<int, Clientes>
     */
    public function getClientes(): Collection
    {
        return $this->clientes;
    }

    public function addCliente(Clientes $cliente): static
    {
        if (!$this->clientes->contains($cliente)) {
            $this->clientes->add($cliente);
            $cliente->addMaquina($this);
        }

        return $this;
    }

    public function removeCliente(Clientes $cliente): static
    {
        if ($this->clientes->removeElement($cliente)) {
            $cliente->removeMaquina($this);
        }

        return $this;
    }

    public function getRecaudacion(): ?Recaudaciones
    {
        return $this->recaudacion;
    }

    public function setRecaudacion(Recaudaciones $recaudacion): static
    {
        // set the owning side of the relation if necessary
        if ($recaudacion->getMaquina() !== $this) {
            $recaudacion->setMaquina($this);
        }

        $this->recaudacion = $recaudacion;

        return $this;
    }

    /**
     * @return Collection<int, Videos>
     */
    public function getVideos(): Collection
    {
        return $this->videos;
    }

    public function addVideo(Videos $video): static
    {
        if (!$this->videos->contains($video)) {
            $this->videos->add($video);
            $video->setMaquina($this);
        }

        return $this;
    }

    public function removeVideo(Videos $video): static
    {
        if ($this->videos->removeElement($video)) {
            // set the owning side to null (unless already changed)
            if ($video->getMaquina() === $this) {
                $video->setMaquina(null);
            }
        }

        return $this;
    }

}
