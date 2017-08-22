<?php
namespace App;


use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
    /**
     * 複数代入を行う属性
     *
     * @var array
     */

    protected $fillable = [
      'follower_id',
      'followee_id',
      'created_at',
    ];


}