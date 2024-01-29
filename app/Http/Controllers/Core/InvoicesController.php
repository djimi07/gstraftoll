<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Http\Services\InvoiceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoicesController extends Controller
{

    protected ?InvoiceService $invoiceService = null;

    public function __construct()
    {
        if ($this->invoiceService == null) {
            $this->invoiceService = new InvoiceService();
        }
    }

    /*
     * Makes API cal to submit invoice
     */
    public function createInvoice(Request $request)

    {


        $invoice = $this->invoiceService->submitInvoice(null, $request->all());
        return $invoice;
    }


    public function listInvoiceApi(Request $request)

    {
        $token = Auth::user()->token;
        $query = "";
        $invoice = $this->invoiceService->list($token, $query);
        return $invoice;
    }


    public function listInvoices(Request $request)

    {

        return view("invoices/list");
    }


    /*
     * Display bulk invoice form
     */
    public function create(Request $request)

    {

        return view("invoices/create");
    }

    public function createInvoiceCompliance(Request $request)

    {
        $vehicleId = $request->query('logId');


        return view("invoices/create-compliance",compact('vehicleId'));
    }

    public function createInvoiceViolation(Request $request)

    {
        $vehicleId = $request->query('logId');


        return view("invoices/create-violation",compact('vehicleId'));
    }



    public function previewInvoice(Request $request)

    {
        $id = $request->id;
        $invoice =  $this->invoiceService->getInvoice(Auth::user()->token, $id);
        if($invoice == null){
            return redirect()->route("invoices.list");
        }
       // dd($invoice);
        //dd($invoice->paymentChannelAccount->responseBody);
        return view("invoices/app-invoice-preview", compact('id','invoice'));


    }

    public function printInvoice(Request $request)

    {

        $id = $request->id;
        $invoice =  $this->invoiceService->getInvoice(Auth::user()->token, $id);
        if($invoice == null){
            return redirect()->route("invoices.list");
        }
        return view("invoices/app-invoice-print",compact('id','invoice'));
    }

}
