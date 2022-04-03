<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameObject extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'coordinate_x',
        'coordinate_y'
    ];

    public function gameObjectType()
    {
      return $this->hasOne('App\Models\GameObjectType');
    }
  
    public function user()
    {
      return $this->hasOne('App\Models\User');
    }

    public function gameState()
    {
      return $this->hasOne('App\Models\GameState');
    }
}
