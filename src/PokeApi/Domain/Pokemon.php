<?php

namespace Engineered\PokeApi\Domain;

class Pokemon
{
    private int $number;
    private string $name;
    private string $imageUrl;

    /**
     * @param int $number
     * @param string $name
     * @param string $imageUrl
     */
    public function __construct(int $number, string $name, string $imageUrl)
    {
        $this->number = $number;
        $this->name = $name;
        $this->imageUrl = $imageUrl;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }
}