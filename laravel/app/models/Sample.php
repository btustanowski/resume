<?php

class Sample extends Eloquent {
    protected $fillable = ['title', 'language', 'content', 'description'];
    protected $table = 'samples';
    protected $softDelete = true;
}