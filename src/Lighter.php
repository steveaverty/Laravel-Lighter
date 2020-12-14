<?php
namespace Avertys\Lighter;



class Lighter{
    //Model
    protected $model;

    //Model's attributes
    protected $attributes;

    //modules's accessors
    protected $appends;

    /**
     * Lighter constructor
     *
     * @param Illuminate\Database\Eloquent\Model|array $model
     */
    public function __construct($model){
        $this->model      = $model;
        $this->attributes = ($model->getLighterAttributes() == null) ? [] : $model->getLighterAttributes();
        $this->appends    = ($model->getLighterAppends() == null) ? [] : $model->getLighterAppends();
    }


    /**
     * Remove unwanted data
     *
     * @param array $fields Fields to remove
     * @return Illuminate\Database\Eloquent\Model
     */
    public function keep(?array $fields = null){
        $fields = self::getFields($fields);

        if($fields != null){
            $this->model->setAppends(array_intersect($fields, $this->appends));
            $this->model->makeHidden(array_diff(array_keys($this->attributes), $fields));
        }

        return $this->model;
    }


    public static function getFields(?array $fields){
        if($fields == null && request()->get('_lighter') != null){
            $fields = json_decode(request()->get('_lighter'));

            return ($fields == null) ? [] : $fields;
        }else{
            return $fields;
        }
    }
}
