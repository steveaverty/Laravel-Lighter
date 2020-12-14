<?php
namespace Saverty\Lighter;

use Saverty\Lighter\Lighter;

class LighterArray{


    //Each lighter objects
    protected $data = array();

    /**
     * LighterCollection constructor
     *
     * @param \Illuminate\Support\Collection $collection
     */
    public function __construct($data){
        $this->data = $data;
    }

    /**
     * Remove unwanted data
     *
     * @param array $fields
     * @return  \Illuminate\Support\Collection $collection
     */
    public function keep(?array $fields = null){
        $fields = Lighter::getFields($fields);

        foreach($this->data as $key =>  $d){
            if(!in_array($key, $fields)){
                unset($this->data[$key]);
            }
        }

        return $this->data;
    }

}
