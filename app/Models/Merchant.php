<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\MerchantFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Merchant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Merchant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Merchant query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Merchant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Merchant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Merchant whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Merchant whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Merchant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
}
