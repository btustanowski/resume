<?php

class Personal extends Eloquent {
    protected $fillable = ['entry', 'content'];
    protected $table = 'personal';
    protected $softDelete = true;
}