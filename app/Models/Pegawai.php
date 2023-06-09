<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pegawai extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table= 'PEGAWAI';
    protected $fillable = [
        'USERNAME_PEGAWAI',
        'EMAIL_PEGAWAI',
        'PASSWORD_PEGAWAI',
    ];
    protected $username = 'EMAIL_PEGAWAI';
    protected $password = 'PASSWORD_PEGAWAI';

    
    protected $hidden = [
        'PASSWORD_PEGAWAI',
        'REMEMBER_TOKEN',
    ];
    
}
