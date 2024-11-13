<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetTransactionsRequest;
use App\Repositories\ReportingApiRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    // private ReportingApiRepository $reportingApiRepository;

    // public function __construct(protected TransactionRepository $transactionRepository)
    // {
    //     $this->reportingApiRepository = $reportingApiRepository;
    // }


    public function index(Request $request): View
    {
        return view('dashboard', [
            'user' => $request->user(),
        ]);
    }

    // public function getTransactions(GetTransactionsRequest $request): bool|string
    // {
    //     return json_encode($this->reportingApiRepository->getTransactions($request->all()));
    // }

    // public function transactionDetail(Request $request, $transactionId): View
    // {
    //     $transaction = $this->reportingApiRepository->getTransactionDetail($transactionId);

    //     return view('transaction-detail', [
    //         'transaction' => $transaction,
    //         'user'        => $request->user(),
    //     ]);
    // }

    // public function clientDetail(Request $request, $transactionId): View
    // {
    //     $client = $this->reportingApiRepository->getClientDetail($transactionId);

    //     return view('client-detail', [
    //         'client' => $client,
    //         'user'   => $request->user(),
    //     ]);
    // }
}
