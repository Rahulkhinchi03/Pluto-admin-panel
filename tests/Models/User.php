<?php

namespace SertxuDeveloper\Lyra\Tests\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use SertxuDeveloper\Lyra\Tests\Factories\UserFactory;

class User extends Authenticatable {
  use HasFactory, Notifiable, SoftDeletes;

  /**
   * Create a new factory instance for the model.
   *
   * @return \Illuminate\Database\Eloquent\Factories\Factory
   */
  protected static function newFactory() {
    return UserFactory::new();
  }

  /**
   * The attributes that are mass assignable.
   *
   * @var string[]
   */
  protected $fillable = [
    'name',
    'email',
    'password',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];
}