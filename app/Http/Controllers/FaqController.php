<?php

namespace App\Http\Controllers;

use App\Http\Services\FaqService;
use Illuminate\Http\Request;

class FaqController extends Controller
{

    protected ?FaqService $faqService = null;

    public function __construct()
    {
        if ($this->faqService == null) {
            $this->faqService = new FaqService();
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function apiIndex(Request $request)
    {

        return ['data' => $this->faqService->listFaq()];


    }

    public function index(Request $request)
    {
        $pageConfigs = ['pageHeader' => false];
        $faqs = $this->faqService->listFaq();
//dd($faqs);
        return view('faqs/list', ['faqs' => $faqs, 'pageConfigs' => $pageConfigs
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        //
    }
}
