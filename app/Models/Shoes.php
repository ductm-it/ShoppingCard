<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;


class Shoes extends Model
{
    use Notifiable;
    use Searchable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'categoryID','image','inPrice','outPrice',''
    ];
    public function searchableAs()
    {
        return 'shoes_index';
    }

    protected $table = 'shoes';
   
}