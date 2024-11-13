<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * 
 *
 * @property int $id
 * @property string $number
 * @property int $expiry_month
 * @property int $expiry_year
 * @property int|null $start_month
 * @property int|null $start_year
 * @property int|null $issue_number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $masked_number
 * @method static \Database\Factories\CardFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereExpiryMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereExpiryYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereIssueNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereStartMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereStartYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Card extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['number', 'expiry_month', 'expiry_year', 'start_month', 'start_year', 'issue_number'];

    /**
     * Get the customer's masked number.
     */
    protected function maskedNumber(): Attribute
    {
        return Attribute::make(
            get: fn () => Str::mask($this->number, 'X', 6, 6),
        );
    }
}
