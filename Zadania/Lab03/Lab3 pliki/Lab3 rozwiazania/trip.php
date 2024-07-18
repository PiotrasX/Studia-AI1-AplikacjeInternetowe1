<?php

class Trip
{
    public function __construct(
        private int $id,
        private string $name,
        private string $continent,
        private string $country,
        private int $period,
        private string $description,
        private int $price,
        private string $img
    ) { }

    public function __toString()
    {
        return "$this->id $this->name $this->price";
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getContinent()
    {
        return $this->continent;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getPeriod()
    {
        return $this->period;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getImg()
    {
        return $this->img;
    }
}

$t1 = new Trip(
    1, 'Kolorado', 'Ameryka Północna', 'USA', 9,
    'Stan znany z majestatycznych górskich krajobrazów, oferuje 
    niezapomniane przygody na łonie natury. Średnia wysokość terenu 
    przekracza 2000 m n.p.m., z najwyższym punktem - Mount Elbert - 
    osiągającym 4399 m n.p.m. Idealne miejsce dla miłośników górskich wypraw.',
    23500, 'colorado.jpg'
);

$t2 = new Trip(
    5, 'Wielki Kanion', 'Ameryka Północna', 'USA', 5,
    'Jeden z największych cudów naturalnych świata, przyciąga swoją majestatyczną 
    urodą. Rozciągając się na długość ponad 446 km, kanion oferuje zapierające 
    dech w piersiach widoki i niezapomniane wrażenia. Doskonałe miejsce dla 
    każdego podróżnika chcącego doświadczyć potęgi i piękna natury.',
    14000, 'grand-canyon.jpg'
);

$t3 = new Trip(
    3, 'Everest', 'Azja',
    'Chiny', 7,
    'Najwyższy szczyt Ziemi (8848 m n.p.m., podaje się też wysokość 
    8844 lub 8850), ośmiotysięcznik położony w Himalajach Wysokich, 
    na granicy Nepalu i Tybetu.',
    22000, 'everest.jpg'
);

$t4 = new Trip(
    4, 'Alpy', 'Europa', 'Austria', 6,
    'Najwyższy łańcuch górski Europy, ciągnący się łukiem od wybrzeża 
    Morza Śródziemnego w okolicy Savony po dolinę Dunaju w okolicach Wiednia.',
    16000, 'alps.jpg'
);

$trips = [$t1, $t2, $t3, $t4];
