<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMailingListRequest;
use App\Http\Requests\UpdateMailingListRequest;
use App\Models\MailingList;
use Illuminate\Support\Facades\Auth;

class MailingListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mailingLists = Auth::user()->mailingLists;

        return view('mailing-list.index', compact('mailingLists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contacts = Auth::user()
            ->contacts;

        return view('mailing-list.create', compact('contacts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMailingListRequest $request)
    {
        $mailingList = Auth::user()->mailingLists()->create([
            'name' => $request->name,
        ]);

        $mailingList->contacts()->sync($request->contacts);

        return to_route('mailing_list.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(MailingList $mailingList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MailingList $mailingList)
    {
        $contacts = Auth::user()
            ->contacts;

        return view('mailing-list.edit', compact('contacts', 'mailingList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMailingListRequest $request, MailingList $mailingList)
    {
        $mailingList->update([
            'name' => $request->name,
        ]);

        $mailingList->contacts()->sync($request->contacts);

        return to_route('mailing_list.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MailingList $mailingList)
    {
        $mailingList->delete();

        return to_route('mailing_list.index');
    }
}
