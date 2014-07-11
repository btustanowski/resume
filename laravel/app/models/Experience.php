<?php

class Experience extends Eloquent {
    protected $fillable = ['from', 'to', 'title', 'description'];
    protected $table = 'experience';
    protected $softDelete = true;
}