<?php

use Saverty\Lighter\Lighter;
use Saverty\Lighter\LighterArray;
use Saverty\Lighter\LighterCollection;

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
