<?php
/**
 * Created by PhpStorm.
 * User: ca
 * Date: 2017/08/22
 * Time: 16:17
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Tweet
 *
 * @property int $id
 * @property int $user_id
 * @property string $body
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tweet whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tweet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tweet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tweet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tweet whereUserId($value)
 * @mixin \Eloquent
 */
class Tweet extends Model
{
    /**
     * 複数代入を行う属性
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'body',
        'created_at'
    ];
}