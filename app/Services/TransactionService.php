<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\Transaction;
use App\Repositories\TransactionRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TransactionService
{
    public function __construct(protected TransactionRepository $transactionRepository)
    {
    }

    public function getTransactionReport(?array $filters)
    {
        return $this->transactionRepository->getTransactionReport($filters);
    }

    public function getTransactionQuery(?array $filters): LengthAwarePaginator
    {
        return $this->transactionRepository->getTransactionQuery($filters);
    }

    public function findByTransactionId(string $transactionId): ?Transaction
    {
        return $this->transactionRepository->findByTransactionId($transactionId);
    }

    public function findCustomerByTransactionId(string $transactionId): ?Customer
    {
        return $this->transactionRepository->findCustomerByTransactionId($transactionId);
    }
}