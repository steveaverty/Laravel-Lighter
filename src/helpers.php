<?php

use Avertys\Lighter\Lighter;
use Avertys\Lighter\LighterArray;
use Avertys\Lighter\LighterCollection;

if (! function_exists('lighter')) {
    function lighter($entity){

        if(is_array($entity)){
            return new LighterArray($entity);
        }

        else if(class_basename($entity) != 'Collection' ){
            return new Lighter($entity);
        }

        else{
            return new LighterCollection($entity);
        }
    }
}
