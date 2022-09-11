<?php
class Contact
{
    // Deklaration einer Eigenschaft
    public int $Id = -1;
    public string $Name = 'Testname';
    public string $LastName = "Dies ist ein toller Schuh";
    public bool $Newsletter = false;
    public string $Email = "max.mustermann@gmail.com";

    // Konsturktor
    public function __construct(int $id, ?string $name, float $lastName, bool $newsletter, string $email)
    {
        $this->Id = $id;
        $this->Name = $name;
        $this->LastName =$lastName;
        $this->Newsletter = $newsletter;
        $this->Email = $email;
    }
}
