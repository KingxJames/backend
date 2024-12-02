<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class SubMenu extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        "icon",
        "name",
        "path",
        "menu_id",
    ];
    public $timestamps = false;

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class, 'menu_id'); 
    }

}
