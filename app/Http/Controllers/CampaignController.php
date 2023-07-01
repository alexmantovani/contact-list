<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCampaignRequest;
use App\Http\Requests\UpdateCampaignRequest;
use App\Models\Campaign;
use Illuminate\Support\Facades\Auth;

use App\Jobs\SendEmailJob;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campaigns = Auth::user()
            ->campaigns()
            ->paginate(100);

        return view('campaign.index', compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mailingLists = Auth::user()
            ->mailingLists;

            return view('campaign.create', compact('mailingLists'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCampaignRequest $request)
    {
        Auth::user()->campaigns()->create([
            'name' => $request->name,
            'subject' => $request->subject,
            'body' => $request->body,
            'mailing_list_id' => $request->mailing_list_id,
        ]);

        return to_route('campaign.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Campaign $campaign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Campaign $campaign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCampaignRequest $request, Campaign $campaign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Campaign $campaign)
    {
        //
    }

    function sendMail(Campaign $campaign) {
        SendEmailJob::dispatch($campaign);

        return to_route('campaign.index');
    }
}
