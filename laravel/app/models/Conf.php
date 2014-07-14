<?php

class Conf extends Eloquent {
    protected $fillable = ['entry', 'value'];
    protected $table = 'config';
    protected $softDelete = true;


    public static function getArray() {
        $r = [];
        foreach (Conf::all() as $conf)
        {
            $r[$conf['entry']] = $conf['value'];
        }
        return $r;
    }
}