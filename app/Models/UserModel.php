<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
// [JS07] Pratikum 1 - Implementasi Authentication
use Illuminate\Foundation\Auth\User as Authenticatable; // implementasi class Authenticatable

// class UserModel extends Model
// {
//     use HasFactory;

//     protected $table = 'm_user'; //Mendefinisikan nama table yang digunakan oleh model ini
//     protected $primaryKey = 'user_id'; //Mendefinisikan primary key dari table yang digunakan

//     // JS04 - Praktikum 1
//      /**
//      * The attributes that are mass assignable
//      * 
//      * @var array
//      */
//     // protected $fillable = ['level_id', 'username', 'nama', 'password'];
//     protected $fillable = ['level_id', 'username', 'nama', 'password'];
//     public function level(): BelongsTo
//     {
//         return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
//     }

// [JS07] Pratikum 1 - Implementasi Authentication
class UserModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'm_user';        // Mendefinisikan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'user_id';  // Mendfinisikan primary key dari tabel yang digunakan
    protected $fillable = ['username', 'password', 'nama', 'level_id','created_at', 'updated_at'];
    protected $hidden = ['password']; // jangan di tampilkan saat select
    protected $casts = ['password' => 'hashed']; // casting password agar otomatis dihash


    /**
     * relasi ke table level
     */
    public function level() : BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }   

    /**
     * mendapatkan nama role
     */
    public function getRoleName(): string
    {
      return $this->level->level_nama;
    }

    /**
     * cek apakah user memiliki role tertentu
     */
    public function hasRole($role): bool
    {
      return $this->level->level_kode == $role;
    }

    /**
     * Mendapatkan kode role
     */
    public function getRole()
    {
      return $this->level->level_kode;
    }
}