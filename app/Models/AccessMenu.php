<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessMenu extends Model
{
    use HasFactory;

    protected $fillable = ['access_group_id', 'menu_id', 'access'];

    protected $casts = [
        'access' => 'array',
    ];

    public function access_group() : object
    {
        return $this->belongsTo(AccessGroup::class);
    }

    public function menu() : object
    {
        return $this->belongsTo(Menu::class);
    }
}
