<?php

namespace App\Entity;

use App\Repository\SocialNetworkRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SocialNetworkRepository::class)
 */
class SocialNetwork
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
    private $network_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $network_login;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $network_password;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="socialNetworks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $network;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNetworkName(): ?string
    {
        return $this->network_name;
    }

    public function setNetworkName(string $network_name): self
    {
        $this->network_name = $network_name;

        return $this;
    }

    public function getNetworkLogin(): ?string
    {
        return $this->network_login;
    }

    public function setNetworkLogin(string $network_login): self
    {
        $this->network_login = $network_login;

        return $this;
    }

    public function getNetworkPassword(): ?string
    {
        return $this->network_password;
    }

    public function setNetworkPassword(string $network_password): self
    {
        $this->network_password = $network_password;

        return $this;
    }

    public function getNetwork(): ?Users
    {
        return $this->network;
    }

    public function setNetwork(?Users $network): self
    {
        $this->network = $network;

        return $this;
    }
}
