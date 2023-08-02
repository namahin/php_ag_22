<?php

namespace App\Http\Controllers;

use App\Mail\PromotionalEmail;
use App\Models\Customer;
use App\Models\EmailCampaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailCampaignController extends Controller
{
    public function index()
    {
        $campaigns = EmailCampaign::all();
        return response()->json($campaigns, 200);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $campaign = new EmailCampaign();
        $campaign->name = $request->input('name');
        $campaign->email_subject = $request->input('email_subject');
        $campaign->email_description = $request->input('email_description');
        $campaign->save();

        return response()->json(['message' => 'Campaign created successfully'], 201);
    }

    public function send()
    {
        $customers = Customer::all();
        $campaigns = EmailCampaign::all();

        $sentCampaigns = [];

        foreach ($customers as $customer) {
            foreach ($campaigns as $campaign) {
                $campaignData = [
                    'customerName' => $customer->name,
                    'promotionTitle' => $campaign->email_subject,
                    'promotionDescription' => $campaign->email_description,
                ];

                Mail::to($customer->email)->send(new PromotionalEmail($campaignData));

                $sentCampaigns[] = $campaignData;
            }
        }

        return response()->json($sentCampaigns, 200);
    }
}
