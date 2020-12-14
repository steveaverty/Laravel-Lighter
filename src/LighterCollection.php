<?php
namespace Saverty\Lighter;

use Saverty\Lighter\Lighter;

class LighterCollection{

    //Collection
    protected $collection;

    //Each lighter objects
    protected $data = array();

    /**
     * LighterCollection constructor
     *
     * @param \Illuminate\Support\Collection $collection
     */
    public function __construct($collection){
        $this->collection = $collection;

        foreach($collection as $obj){
            $this->data[] = new Lighter($obj);
        }
    }

    /**
     * Remove unwanted data
     *
     * @param array $fields
     * @return  \Illuminate\Support\Collection $collection
     */
    public function keep(?array $fields = null){
        $collect = collect();

        foreach($this->data as $data){
            $collect->push($data->keep($fields));
        }

        return $collect;
    }

}
