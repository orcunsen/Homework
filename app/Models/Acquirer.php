<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\AcquirerFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Acquirer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Acquirer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Acquirer query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Acquirer whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Acquirer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Acquirer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Acquirer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Acquirer whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Acquirer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Acquirer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'code', 'type'];
}
