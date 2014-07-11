<?php

class Sample extends Eloquent {
    protected $fillable = ['language', 'content', 'description'];
    protected $table = 'samples';
    protected $softDelete = true;
}