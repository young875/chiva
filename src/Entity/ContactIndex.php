<?php

namespace App\Entity;


use Symfony\Component\Validator\Constraints as Assert;


class ContactIndex {

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=3, max=255)
     */
    private $sujet;


    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=3, max=255)
     */
    private $nom;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $mail;


    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=10)
     */
    private $message;

    /**
     * @return string|null
     */
    public function getSujet(): ?string
    {
        return $this->sujet;
    }

    /**
     * @param string|null $sujet
     * @return ContactIndex
     */
    public function setSujet(?string $sujet): ContactIndex
    {
        $this->sujet = $sujet;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * @param string|null $nom
     * @return ContactIndex
     */
    public function setNom(?string $nom): ContactIndex
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMail(): ?string
    {
        return $this->mail;
    }

    /**
     * @param string|null $mail
     * @return ContactIndex
     */
    public function setMail(?string $mail): ContactIndex
    {
        $this->mail = $mail;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string|null $message
     * @return ContactIndex
     */
    public function setMessage(?string $message): ContactIndex
    {
        $this->message = $message;
        return $this;
    }

}