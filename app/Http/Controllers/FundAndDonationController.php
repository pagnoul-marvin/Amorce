<?php

namespace App\Http\Controllers;

use App\Http\Requests\FundGetEnclosedOrOpenedRequest;
use App\Models\Donation;
use App\Models\Fund;
use Illuminate\Http\Request;

class FundAndDonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('funds_and_donations.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Fund $fund)
    {
        return view('funds_and_donations.show', compact('fund'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function makeFundEnclosedOrOpened(FundGetEnclosedOrOpenedRequest $request, Fund $fund)
    {
        $fund->update($request->validated());
        return to_route('funds_and_donations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
