<?php

namespace App\Http\Controllers;

use App\Http\Resources\RecipientResource;
use App\Http\Resources\RecipientCollection;
use App\Http\Requests\StoreRecipientRequest;
use App\Http\Requests\UpdateRecipientRequest;
use App\Models\Recipient;

class RecipientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new RecipientCollection(Recipient::paginate());

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
    public function store(StoreRecipientRequest $request)
    {
        return new RecipientResource(Recipient::create($request->all()));

    }

    /**
     * Display the specified resource.
     */
    public function show(Recipient $recipient)
    {
        return new RecipientResource($recipient);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipient $recipient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRecipientRequest $request, Recipient $recipient)
    {
        $recipient->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipient $recipient)
    {
        $recipient->delete();
        return response()->json(['message' => 'deleted successfully'], 200);
    }
}
