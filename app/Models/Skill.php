<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'game_object_type_id'
    ];

    public function gameObjectType()
    {
        return $this->belongsTo('App\Models\GameObjectType');
    }

    public function use()
    {
        $this->{$this->name};
    }
    
    public function up()
    {
        
    }

    public function down()
    {
        
    }

    public function right()
    {

    }

    public function left()
    {
        
    }
}
