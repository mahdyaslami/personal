<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['domain', 'username', 'password', 'description', 'user_id'];

    public function path()
    {
        return route('accounts.show', ['id' => $this->id]);
    }

    /**
     * Get user by id.
     * 
     * @param int $id Id of current user.
     */
    public static function getByUser($id)
    {
        return self::whereUser_id($id)->get();
    }
}
