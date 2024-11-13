<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Transaction\GetTransactionQueryRequest;
use App\Http\Requests\Transaction\GetTransactionReportRequest;
use App\Http\Requests\Transaction\GetTransactionByTransactionIdRequest;
use App\Http\Resources\TransactionQueryResource;
use App\Http\Resources\TransactionReportResource;
use App\Http\Resources\TransactionResource;
use App\Services\TransactionService;
use Illuminate\Http\JsonResponse;

class TransactionController extends Controller
{
    public function __construct(protected TransactionService $transactionService)
    {
    }

    public function getTransactonReport(GetTransactionReportRequest $request): JsonResponse
    {
        $filters =  $request->only('fromDate', 'toDate', 'merchant', 'aqcirer');

        return response()->json([
            'status' => 'APPROVED',
            'response' => new TransactionReportResource($this->transactionService->getTransactionReport($filters)),
        ]);
    }

    public function getTransactionQuery(GetTransactionQueryRequest $request): JsonResponse
    {
        $filters = [
            'paginate' => true,
        ];

        $filters = array_merge($filters, 
            $request->only('fromDate', 'toDate', 'status', 'operation', 'merchantId', 'paymentMethod', 'errorCode', 'filterField', 'filterValue')
        );

        $transactions = $this->transactionService->getTransactionQuery($filters);

        return response()->json([new TransactionQueryResource($transactions)]);
    }

    public function findByTransactionId(GetTransactionByTransactionIdRequest $request): JsonResponse
    {
        return response()->json(new TransactionResource($this->transactionService->findByTransactionId($request->string('transactionId'))));
    }
}
