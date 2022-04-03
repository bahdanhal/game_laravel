<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'length',
        'width',
        'players_count',
        'turns',
        'rounds'
    ];

    public function gameStates()
    {
        return $this->hasOne('App\Models\GameState');
    }
    
    public function initRequest()
    {
      return $this->hasOne('App\Models\InitRequest');
    }
}
