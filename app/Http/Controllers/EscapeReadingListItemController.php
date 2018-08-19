<?php

namespace App\Http\Controllers;

use App\ReadingListItem;
use App\EscapeReadingList;
use App\Escape;
use Illuminate\Http\Request;

class EscapeReadingListItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\EscapeReadingList  $readingList
     * @return \Illuminate\Http\Response
     */
    public function index(
        Escape $escape,
        EscapeReadingList $readingList
    ) {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\EscapeReadingList  $readingList
     * @return \Illuminate\Http\Response
     */
    public function create(
        Escape $escape,
        EscapeReadingList $readingList
    ) {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EscapeReadingList  $readingList
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        Escape $escape,
        EscapeReadingList $readingList
    ) {
        $this->validate($request, [
            'name'=> 'required',
            'link' => 'nullable|url'
        ]);
        $escape->readingList->items()->create($request->all());
        return $escape->fresh()->readingList->items;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EscapeReadingList  $readingList
     * @param  \App\ReadingListItem  $item
     * @return \Illuminate\Http\Response
     */
    public function show(
        Escape $escape,
        EscapeReadingList $readingList,
        ReadingListItem $item
    ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EscapeReadingList  $readingList
     * @param  \App\ReadingListItem  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(
        Escape $escape,
        EscapeReadingList $readingList,
        ReadingListItem $item
    ) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EscapeReadingList  $readingList
     * @param  \App\ReadingListItem  $item
     * @return \Illuminate\Http\Response
     */
    public function update(
        Request $request,
        Escape $escape,
        EscapeReadingList $readingList,
        ReadingListItem $item
    ) {
        $this->validate($request, [
            'name' => 'required',
            'link' => 'nullable|url'
        ]);
        $item->update($request->all());
        return $escape->fresh()->readingList->items;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EscapeReadingList  $readingList
     * @param  \App\ReadingListItem  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Escape $escape,
        EscapeReadingList $readingList,
        ReadingListItem $item
    ) {
        $item->delete();
        return $readingList->items;
    }
}
