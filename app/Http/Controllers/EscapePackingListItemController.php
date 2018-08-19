<?php

namespace App\Http\Controllers;

use App\PackingListItem;
use App\EscapePackingList;
use App\Escape;
use Illuminate\Http\Request;

class EscapePackingListItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\EscapePackingList  $packingList
     * @return \Illuminate\Http\Response
     */
    public function index(
        Escape $escape,
        EscapePackingList $packingList
    ) {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\EscapePackingList  $packingList
     * @return \Illuminate\Http\Response
     */
    public function create(
        Escape $escape,
        EscapePackingList $packingList
    ) {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EscapePackingList  $packingList
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        Escape $escape,
        EscapePackingList $packingList
    ) {
        $this->validate($request, [
            'name'=> 'required',
            'link' => 'nullable|url'
        ]);
        $escape->packingList->items()->create($request->all());
        return $escape->fresh()->packingList->items;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EscapePackingList  $packingList
     * @param  \App\PackingListItem  $item
     * @return \Illuminate\Http\Response
     */
    public function show(
        Escape $escape,
        EscapePackingList $packingList,
        PackingListItem $item
    ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EscapePackingList  $packingList
     * @param  \App\PackingListItem  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(
        Escape $escape,
        EscapePackingList $packingList,
        PackingListItem $item
    ) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EscapePackingList  $packingList
     * @param  \App\PackingListItem  $item
     * @return \Illuminate\Http\Response
     */
    public function update(
        Request $request,
        Escape $escape,
        EscapePackingList $packingList,
        PackingListItem $item
    ) {
        $this->validate($request, [
            'name' => 'required',
            'link' => 'nullable|url'
        ]);
        $item->update($request->all());
        return $escape->fresh()->packingList->items;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EscapePackingList  $packingList
     * @param  \App\PackingListItem  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Escape $escape,
        EscapePackingList $packingList,
        PackingListItem $item
    ) {
        $item->delete();
        return $packingList->items;
    }
}
