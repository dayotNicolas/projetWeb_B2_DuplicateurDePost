<?php

namespace App\Entity;

use App\Repository\LinkedInIdsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LinkedInIdsRepository::class)
 */
class LinkedInIds
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Users::class, inversedBy="linkedInIds", cascade={"persist", "remove"})
     */
    private $linkedIn_login;

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $linkedIn_passwd;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLinkedInLogin(): ?Users
    {
        return $this->linkedIn_login;
    }

    public function setLinkedInLogin(?Users $linkedIn_login): self
    {
        $this->linkedIn_login = $linkedIn_login;

        return $this;
    }

    public function getLinkedInPasswd(): ?string
    {
        return $this->linkedIn_passwd;
    }

    public function setLinkedInPasswd(string $linkedIn_passwd): self
    {
        $this->linkedIn_passwd = $linkedIn_passwd;

        return $this;
    }
}
