<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;
    protected $fillable = ['name', 'username', 'password', 'email', 'level'];
    protected $table = 'users';
    protected $hidden = ['password', 'remember_token'];

    public function isAdmin() {
        return (bool)($this->level === 'admin');
    }
}
