<?php

class Config extends Eloquent {
    protected $fillable = ['entry', 'value'];
    protected $table = 'config';
    protected $softDelete = true;
}