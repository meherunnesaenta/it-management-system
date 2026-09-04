<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Services\PaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function create()
    {
        return view('pages.dashboard.student.payments.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'amount' => 'required|numeric',
            'transaction_id' => 'required|string',
            'method' => 'required|string',
            'purpose' => 'nullable|string',
        ]);

        $this->paymentService->processPayment(auth()->id(), $data['amount'], $data['transaction_id'], $data['method'], $data['purpose'] ?? null);

        return redirect()->route('student.dashboard')->with('success', 'Payment submitted');
    }
}
