<?php
class Contact
{
    // Eigenschaften
    public int $Id = -1;
    public string $Name = 'Testname';
    public string $LastName = "Dies ist ein toller Schuh";
    public string $City = "max.mustermann@gmail.com";
    public int $PLZ = 00000;
    public string $StreetName = "";
    public string $StreetNumber = "";
    public bool $Newsletter = false;
    public string $Email = "max.mustermann@gmail.com";

    // Konsturktor
    public function __construct(
        int $id,
        string $name,
        string $lastName,
        string $city,
        int $plz,
        string $streetName,
        string $streetNumber,
        bool $newsletter,
        string $email
    ) {
        $this->Id = $id;
        $this->Name = $name;
        $this->LastName = $lastName;
        $this->City = $city;
        $this->PLZ = $plz;
        $this->StreetName = $streetName;
        $this->StreetNumber = $streetNumber;
        $this->Newsletter = $newsletter;
        $this->Email = $email;
    }
}
