<?php

class Education extends Eloquent {
    protected $fillable = ['from', 'to', 'title', 'description'];
    protected $table = 'education';
    protected $softDelete = true;
}