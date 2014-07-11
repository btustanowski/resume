<?php

class Interest extends Eloquent {
    protected $fillable = ['name'];
    protected $table = 'interests';
    protected $softDelete = true;
}