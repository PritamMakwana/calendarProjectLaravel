<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    use HasFactory;

    protected $table="professional";

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
        'address',
        'skill',
        'image',
        'status',
        'regi_time'
    ];

    public function setSkillAttribute($value)
    {
        $this->attributes['skill'] = json_encode($value);
    }

    /**
     * Get the categories
     *
     */
    public function getSkillAttribute($value)
    {
        return $this->attributes['skill'] = json_decode($value);
    }
}
