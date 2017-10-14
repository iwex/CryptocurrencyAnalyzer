<?php

namespace App\Services\Rate;

class Rate
{
    /** @var string */
    private $base;

    /** @var string */
    private $target;

    /** @var float */
    private $price;

    /** @var float|null */
    private $change;

    /** @var float|null */
    private $volume;

    /**
     * Rate constructor.
     *
     * @param string $base
     * @param string $target
     * @param float  $price
     * @param float  $change
     * @param float  $volume
     */
    public function __construct(
        string $base,
        string $target,
        float $price,
        float $change = null,
        float $volume = null
    ) {
        $this->base   = $base;
        $this->target = $target;
        $this->price  = $price;
        $this->change = $change;
        $this->volume = $volume;
    }

    /**
     * @return string
     */
    public function getBase(): string
    {
        return $this->base;
    }

    /**
     * @param string $base
     */
    public function setBase(string $base)
    {
        $this->base = $base;
    }

    /**
     * @return string
     */
    public function getTarget(): string
    {
        return $this->target;
    }

    /**
     * @param string $target
     */
    public function setTarget(string $target)
    {
        $this->target = $target;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price)
    {
        $this->price = $price;
    }

    /**
     * @return float|null
     */
    public function getVolume() : ?float
    {
        return $this->volume;
    }

    /**
     * @param float|null $volume
     */
    public function setVolume(?float $volume)
    {
        $this->volume = $volume;
    }

    /**
     * @return float|null
     */
    public function getChange() : ?float
    {
        return $this->change;
    }

    /**
     * @param float|null $change
     */
    public function setChange(?float $change)
    {
        $this->change = $change;
    }

}