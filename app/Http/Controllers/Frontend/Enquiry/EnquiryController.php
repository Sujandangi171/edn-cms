<?php

namespace App\Http\Controllers\Frontend\Enquiry;

use App\Events\EnquiryEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\EnquiryRequest;
use App\Services\Frontend\Enquiry\EnquiryService;


class EnquiryController extends Controller
{
    protected $service;

    public function __construct(EnquiryService $service)
    {
        $this->service = $service;
    }

    public function store(EnquiryRequest $request)
    {
        $data = $request->except('_token');
        $enquiry = $this->service->storeData($data);
        event(new EnquiryEvent($enquiry));
        flash()->options([
            'timeout' => 2000
        ])->addSuccess('Enquiry has been sent');
        return redirect()->back();
    }
}
