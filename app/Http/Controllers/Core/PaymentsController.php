<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Http\Services\InvoiceService;
use App\Http\Services\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentsController extends Controller
{

    protected ?PaymentService $paymentService = null;

    public function __construct()
    {
        if ($this->paymentService == null) {
            $this->paymentService = new PaymentService();
        }
    }




    public function listPaymentApi(Request $request)

    {
        $token = Auth::user()->token;
        $query = "";
        $invoice = $this->paymentService->list($token, $query);
        return $invoice;
    }


    public function listPayments(Request $request)

    {

        return view("payments/list");
    }


    /*
     * Display bulk invoice form
     */

    public function previewPayment(Request $request)

    {
        $id = $request->id;
        $payment =  $this->paymentService->getPayment(Auth::user()->token, $id);
        if($payment == null){
            return redirect()->route("payments.list");
        }

//        dd(Auth::user()->token);
       //dd($payment->data->invoice);
        //dd($invoice->paymentChannelAccount->responseBody);
        return view("payments/receipt-preview", compact('id','payment'));


    }

    public function printPayment(Request $request)

    {

        $id = $request->id;
        $payment =  $this->paymentService->getPayment(Auth::user()->token, $id);
        if($payment == null){
            return redirect()->route("payments.list");
        }
        return view("payments/receipt-print",compact('id','payment'));
    }

}
