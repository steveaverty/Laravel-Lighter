<?php
namespace Saverty\Lighter;

use Saverty\Lighter\Lighter;


trait LighterTrait{
    /**
     * Use lighter from a trait
     *
     * @return Saverty\Lighter\Lighter
     */
    public function lighter() : Lighter{
        $lighter = new Lighter($this, $this->getLighterAttributes(), $this->getLighterAppends());

        return $lighter;
    }

    /**
     * Get model's attributes
     *
     * @return void
     */
    public function getLighterAttributes() : array{
        return $this->attributes;
    }

    /**
     * Get model's accessors
     *
     * @return void
     */
    public function getLighterAppends() : array{
        return $this->appends;
    }
}
