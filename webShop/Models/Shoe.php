<?php
class Shoe
{
    // Deklaration einer Eigenschaft
    public int $Id = -1;
    public float $Price = 0;
    public string $Name = 'Testname';
    public string $Description = "Dies ist ein toller Schuh";

    // Deklaration einer Methode
    public function displayVar() {
        echo $this->var;
    }

    // Konsturktor
    public function __construct(int $id, ?string $name, float $price, string $description)
    {
        $this->Id = $id;
        $this->Name = $name;
        $this->Price =$price;
        $this->Description = $description;
    }
}
