<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'm_user'; //Mendefinisikan nama table yang digunakan oleh model ini
    protected $primaryKey = 'user_id'; //Mendefinisikan primary key dari table yang digunakan

    // JS04 - Praktikum 1
     /**
     * The attributes that are mass assignable
     * 
     * @var array
     */
    // protected $fillable = ['level_id', 'username', 'nama', 'password'];
    protected $fillable = ['level_id', 'username', 'nama'];
}