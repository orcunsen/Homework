<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $email
 * @property string $birthday
 * @property string|null $gender
 * @property int $card_id
 * @property int $billing_address_id
 * @property int $shipping_address_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Database\Factories\CustomerFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereBillingAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereCardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereShippingAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Customer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'birthday', 'gender'];

    /**
     * Get the card.
     */
    public function card()
    {
        return $this->belongsTo(Card::class);
    }

     /**
     * Get the billing address.
     */
    public function billingAddress()
    {
        return $this->belongsTo(Address::class, 'billing_address_id', 'id');
    }
    
    /**
     * Get the shipping address.
     */
    public function shippingAddress()
    {
        return $this->belongsTo(Address::class, 'shipping_address_id', 'id');
    }
}
