<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Services\PaymentService;
use App\Models\User;
use App\Notifications\ActivityNotification;
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
            'amount' => ['required', 'numeric', 'min:1', 'max:99999999.99'],
            'transaction_id' => ['required', 'string', 'max:100'],
            'method' => ['required', 'in:bkash,nagad'],
            'purpose' => ['required', 'string', 'max:255'],
        ]);

        $payment = $this->paymentService->processPayment(auth()->id(), $data['amount'], $data['transaction_id'], $data['method'], $data['purpose'] ?? null);

        User::role('super-admin')->get()->each(function (User $admin) use ($payment): void {
            $admin->notify(new ActivityNotification("New {$payment->payment_method} payment submitted: {$payment->amount} BDT."));
        });

        return redirect()->route('student.dashboard')->with('success', 'Payment submitted');
    }
}
