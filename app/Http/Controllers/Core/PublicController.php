<?php

namespace App\Http\Controllers\Core;


use App\Http\Controllers\Controller;
use App\Http\Services\InvoiceService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class PublicController extends Controller
{

    protected ?invoiceService $invoiceService = null;

    public function __construct()
    {
        if ($this->invoiceService == null) {
            $this->invoiceService = new InvoiceService();
        }
    }

    public function homePage(Request $request)
    {

        if ($request->query('message') == "invoice.created") {
            Session::flash('message', 'Invoice Created Successfully!');
        }

        if ($request->query('message') == "invoice.failed") {
            Session::flash('error', 'Unable to created invoice, Try again!');
        }

        return view("general/landing");

    }

    public function showInvoiceForms()
    {
        $revenueHeadCode = 'AIRS0000';


        return view("general/landing-hackney", compact("revenueHeadCode"));

    }

    public function pdfview(Request $request)
    {
        $inv = $this->invoiceService->getInvoice(null, $request->get('id'));

        if ($request->has('download')) {
            view()->share('inv', $inv);

            $pdf = PDF::loadView('invoice-pdf',compact('inv'))->setOption(['defaultFont' => 'sans-serif']);


//                ->setPaper('a5', 'portrait');;
//            return $pdf->download('invoice-pdf' . $inv->id . '.pdf');


            $filename = 'invoice-pdf' . $inv->id . '.pdf';
            $pdf->setPaper('A5', 'portrait');
            file_put_contents('' . $filename, $pdf->output());
            return $pdf->stream($filename);
        }
        return view('invoice-pdf',compact('inv'));


    }

}
