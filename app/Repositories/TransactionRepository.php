<?php

namespace App\Repositories;

use App\Models\Customer;
use App\Models\Transaction;
use App\Filters\FilterFactory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class TransactionRepository
{
    public function __construct(protected readonly FilterFactory $filterFactory)
    {
    }

    public function getTransactionReport(?array $filters)
    {
        return Transaction::query()
            ->selectRaw('sum(fxes.original_amount) as total, count(*) as count, fxes.original_currency as currency')
            ->join('fxes', 'transactions.fx_id', '=', 'fxes.id')
            ->when(isset($filters['fromDate']), fn (Builder $query) => $query->where('transactions.created_at', '>=', $filters['fromDate']))
            ->when(isset($filters['toDate']), fn (Builder $query) => $query->where('transactions.created_at', '<', $filters['toDate']))
            ->when(isset($filters['merchant']), fn (Builder $query) => $query->where('transactions.merchant_id', $filters['merchant']))
            ->when(isset($filters['acquirer']), fn (Builder $query) => $query->where('transactions.acquirer_id', $filters['acquirer']))
            ->groupBy('fxes.original_currency')
            ->get();
        }

    public function getTransactionQuery(?array $filters): LengthAwarePaginator
    {
        $transaction = Transaction::query()
            ->join('customers', 'transactions.customer_id', '=', 'customers.id')
            ->join('addresses as billing_addresses', 'customers.billing_address_id', '=', 'billing_addresses.id')
            ->join('addresses as shipping_addresses', 'customers.shipping_address_id', '=', 'shipping_addresses.id')
            ->join('cards', 'customers.card_id', '=', 'cards.id')
            ->join('merchants', 'transactions.merchant_id', '=', 'merchants.id')
            ->join('acquirers', 'transactions.acquirer_id', '=', 'acquirers.id')
            ->join('fxes', 'transactions.fx_id', '=', 'fxes.id')
            ->when(isset($filters['fromDate']), fn (Builder $query) => $query->where('transactions.created_at', '>=', $filters['fromDate']))
            ->when(isset($filters['toDate']), fn (Builder $query) => $query->where('transactions.created_at', '<', $filters['toDate']))
            ->when(isset($filters['status']), fn (Builder $query) => $query->where('transactions.status', $filters['status']))
            ->when(isset($filters['operation']), fn (Builder $query) => $query->where('transactions.operation', $filters['operation']))
            ->when(isset($filters['merchantId']), fn (Builder $query) => $query->where('transactions.merchant_id', $filters['merchantId']))
            ->when(isset($filters['paymentMethod']), fn (Builder $query) => $query->where('transactions.payment_method', $filters['paymentMethod']))
            ->when(isset($filters['errorCode']), fn (Builder $query) => $query->where('transactions.code', $filters['errorCode']))
            ->when(isset($filters['filterField']) && isset($filters['filterValue']), function (Builder $query) use ($filters) {
                $filter = $this->filterFactory->make($filters['filterField']);
                $filter->apply($filters['filterValue'], $query);
            });

            return $transaction->paginate(20);
    }

    public function findByTransactionId(string $transactionId): ?Transaction
    {
        return Transaction::query()
        ->join('customers', 'transactions.customer_id', '=', 'customers.id')
        ->join('addresses as billing_addresses', 'customers.billing_address_id', '=', 'billing_addresses.id')
        ->join('addresses as shipping_addresses', 'customers.shipping_address_id', '=', 'shipping_addresses.id')
        ->join('cards', 'customers.card_id', '=', 'cards.id')
        ->join('merchants', 'transactions.merchant_id', '=', 'merchants.id')
        ->join('acquirers', 'transactions.acquirer_id', '=', 'acquirers.id')
        ->join('fxes', 'transactions.fx_id', '=', 'fxes.id')
        ->where('transactions.transaction_id', $transactionId)
        ->first();
    }

    public function findCustomerByTransactionId(string $transactionId): ?Customer
    {
        return Customer::query()
        ->join('transactions', 'transactions.customer_id', '=', 'customers.id')
        ->join('addresses as billing_addresses', 'customers.billing_address_id', '=', 'billing_addresses.id')
        ->join('addresses as shipping_addresses', 'customers.shipping_address_id', '=', 'shipping_addresses.id')
        ->join('cards', 'customers.card_id', '=', 'cards.id')
        ->where('transactions.transaction_id', $transactionId)
        ->first();
    }
}
