<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InitRequest extends Model
{
    use HasFactory;
    protected $fillable = [
      'map_id', 
      'user_id',
      'active'
    ];
    public function user()
    {
      return $this->belongsTo('App\Models\User');
    }

    public function map()
    {
      return $this->belongsTo('App\Models\Map');
    }
}
