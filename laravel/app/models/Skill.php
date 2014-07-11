<?php

class Skill extends Eloquent {
    protected $fillable = ['name'];
    protected $table = 'skills';
    protected $softDelete = true;
}