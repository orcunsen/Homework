<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\GetCustomerByTransactionIdRequest;
use App\Http\Resources\CustomerResource;
use App\Services\TransactionService;
use Illuminate\Http\JsonResponse;

class CustomerController extends Controller
{
    public function __construct(protected TransactionService $transactionService)
    {
    }

    public function findCustomerByTransactionId(GetCustomerByTransactionIdRequest $request): JsonResponse
    {
        return response()->json(new CustomerResource($this->transactionService->findCustomerByTransactionId($request->string('transactionId'))));
    }
}
