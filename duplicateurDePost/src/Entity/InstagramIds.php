<?php

namespace App\Entity;

use App\Repository\InstagramIdsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InstagramIdsRepository::class)
 */
class InstagramIds
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Users::class, inversedBy="instagramIds", cascade={"persist", "remove"})
     */
    private $instagram_login;

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $instagram_passwd;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInstagramLogin(): ?Users
    {
        return $this->instagram_login;
    }

    public function setInstagramLogin(?Users $instagram_login): self
    {
        $this->instagram_login = $instagram_login;

        return $this;
    }

    public function getInstagramPasswd(): ?string
    {
        return $this->instagram_passwd;
    }

    public function setInstagramPasswd(string $instagram_passwd): self
    {
        $this->instagram_passwd = $instagram_passwd;

        return $this;
    }
}
