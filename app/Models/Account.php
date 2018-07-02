<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
  /**
   * The attributes that are mass assignable.
   */
  protected $fillable = [
    'address',
    'password',
    'is_primary',
    'user_id',
  ];

  /**
   * The attributes hidden in responses.
   */
  protected $hidden = [
    'created_at',
    'updated_at',
  ];

}