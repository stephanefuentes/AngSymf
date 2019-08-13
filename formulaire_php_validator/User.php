<?php

use Symfony\Component\Validator\Constraints as Assert;

class User
{
    /**
     * 
     * @Assert\NotBlank(message="le nom est obligatoire")
     * @Assert\Length(min=5, minMessage="le titre doit contenir au moins 5 caracteres")
     */
    private $firstName;

    private $lastName;


    /**
     * @Assert\NotBlank(message="le mail est obligatoire et doit etre au bon format")
     * @Assert\Email(
     *     message = "Le mail '{{ value }}' n'est pas valide blaireau.",
     *     checkMX = true
     * )
     */
    private $email;

    /**
     * @Assert\NotBlank(message="lURL doit etre renseigné et au bon format")
     * @Assert\Url(
     *    message = "l url '{{ value }}' nest pas valide petit coquinou",
     * )
     * @Assert\NotBlank(message="l'URL doit etre renseigné et au bon format")
     */
    private $avatar;


    public function SetFirstName($firstName = '')
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function SetLastName($lastName = '')
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function SetEmail($email = '')
    {
        $this->email = $email;
        return $this;
    }

    public function SetAvatar($avatar = '')
    {
        $this->avatar = $avatar;
        return $this;
    }
}
