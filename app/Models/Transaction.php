<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $transaction_id
 * @property int $merchant_id
 * @property int $acquirer_id
 * @property int $customer_id
 * @property int $fx_id
 * @property string|null $reference_no
 * @property string $status
 * @property string $payment_method
 * @property string $channel
 * @property string|null $custom_data
 * @property string $chain_id
 * @property int $agent_info_id
 * @property string $operation
 * @property int $acquirer_transaction_id
 * @property string $code
 * @property string $message
 * @property string $agent
 * @property int $ipn
 * @property int $refundable
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\TransactionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereAcquirerTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereAgentInfoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereAquirerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereChainId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereCustomData($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereFxId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereIpn($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereMerchantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereOperation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereReferenceNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereRefundable($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaction_id', 'merchant_id', 'acquirer_id', 'customer_id', 'fx_id', 'reference_no', 'status', 'payment_method', 'channel', 'custom_data', 'chain_id', 'agent_info_id', 'operation', 'acquirer_transaction_id', 'code', 'message', 'agent', 'ipn', 'refundable'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'ipn' => 'boolean',
        'refundable' => 'boolean'
    ];

   /**
     * Get the merchant.
     */
    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    /**
     * Get the acquirer.
     */
    public function acquirer()
    {
        return $this->belongsTo(Acquirer::class);
    }

    /**
     * Get the acquirer.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the fx.
     */
    public function fx()
    {
        return $this->belongsTo(Fx::class);
    }
}
