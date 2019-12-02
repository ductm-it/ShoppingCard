<?php
namespace App\Providers;
use Illuminate\Database\Eloquent\Model;
class shoes extends Model
{
    protected $fillable=['name','discription','categoryid','image','inprice','outprice','instock','created_at','updated_at'];
    public $table = "shoes";
}