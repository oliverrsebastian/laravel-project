<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function hasAccess($page){
        // dd($this->role);
        // $user_role = User::roleToString($this->role);
        switch($this->role){
            case 0:
                return $this->role == $page->member;
            case 1:
                return $this->role == $page->admin;
            default:
                return 1 == $page->guest;
        }
    }
}
