<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameState extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'map_id',
        'round',
        'turn',
        'active'
    ];

    public function map()
    {
      return $this->belongsTo('App\Models\Map');
    }

    public function users()
    {
      return $this->belongsToMany('App\Models\User');
    }

    public function gameObjects()
    {
      return $this->belongsTo('App\Models\GameObject');
    }
  
}
