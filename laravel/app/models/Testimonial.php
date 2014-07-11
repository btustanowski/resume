<?php

class Testimonial extends Eloquent {
    protected $fillable = ['company', 'content'];
    protected $table = 'testimonials';
    protected $softDelete = true;
}