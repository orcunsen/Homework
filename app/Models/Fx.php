<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $original_amount
 * @property string $original_currency
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\FxFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Fx newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Fx newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Fx query()
 * @mixin \Eloquent
 */
class Fx extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['original_amount', 'original_currency'];
}
