<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Escape;
use MetaTag;
use Carbon\Carbon;
use App\{
    ReadingListItem,
    PackingListItem,
    EscapeActivity
};

class EscapeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->get('filter') === 'upcoming') {
            return Escape::sorted()->valid()->paginate(9);
        } elseif ($request->get('filter') === 'past') {
            return Escape::past()->orderBy('start_date', 'desc')->paginate(9);
        }
        return Escape::sorted()->paginate(9);
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

    public function list()
    {
        MetaTag::set('title', 'Escape To Shape - Upcoming Trips');
        $escapes = (new Escape)->valid()->sorted()->get();
        return view('pages.escapes.index', compact('escapes'));
    }

    public function single($slug)
    {
        $escape = (new Escape)->valid()->where('slug', $slug)->firstOrFail();
        MetaTag::set('title', $escape->escape_type->name);
        MetaTag::set('image', $escape->escape_type->featured_image->secure_url);
        MetaTag::set('description', $escape->escape_type->description);
        return view('pages.escapes.escape.index', compact('escape'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'single_rooms' => 'required|numeric|min:0',
            'single_rate' => 'required|numeric|min:0',
            'shared_rooms' => 'required|numeric|min:0',
            'shared_rate' => 'required|numeric|min:0',
            'start_date' => 'required',
            'end_date' => 'required',
            'deposit_amount' => 'required|numeric|min:1',
            'escape_type_id' => 'required',
            'payment_due' => 'required'
        ]);
        $model = new Escape($request->all());
        $model->save();
        $mediaId = $request->get('new_brochure');
        if ($mediaId) {
            $media = [];
            $media[$mediaId] = ['type' => 'brochure'];
            $model->media()->sync($media);

        }
        return $model;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Escape::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Escape::findOrFail($id);
        $mediaId = $request->get('new_brochure');
        if ($mediaId) {
            $media = [];
            $media[$mediaId] = ['type' => 'brochure'];
            $model->media()->sync($media);
        }
        $model->update($request->all());
        return $model;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $escape = Escape::findOrFail($id);
        $escape->delete();
        return $escape->fresh();
    }

    /**
     * Copies reading list, itinerary, and packing list from a previous escape
     *
     * @param App\Escape $escape
     * @param int $escapeToCopy
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function copyExistingLists(Escape $escape, $escapeToCopy)
    {
        $escapeToCopy = Escape::findOrFail($escapeToCopy);

        $readingItems = $escapeToCopy->readingList->items->map(function($item) {
            $itemAsArray = $item->toArray();
            return new ReadingListItem($itemAsArray);
        });

        $packingListItems = $escapeToCopy->packingList->items->map(function($item) {
            $itemAsArray = $item->toArray();
            unset($itemAsArray['id']);
            return new PackingListItem($itemAsArray);
        });

        $dateMap = $this->generateDateMap($escapeToCopy, $escape);
        $activities = collect($escapeToCopy->itinerary->activities->reduce(function($acc, $item) use ($escape, $dateMap) {
            if(isset($dateMap[$item->date->format('Y-m-d')])) {
                $newDate = Carbon::parse($dateMap[$item->date->format('Y-m-d')]);
                $item->date = $item->date->year($newDate->year)
                                ->month($newDate->month)
                                ->day($newDate->day);
                $itemAsArray = $item->toArray();
                unset($itemAsArray['id']);
                $acc[] = new EscapeActivity($itemAsArray);
            }
            return $acc;
        },[]));

        if($readingItems->count() > 0) {
            $escape->readingList->items()->saveMany($readingItems);
        }

        if($packingListItems->count() > 0) {
            $escape->packingList->items()->saveMany($packingListItems);
        }

        if($activities->count() > 0) {
            $escape->itinerary->activities()->saveMany($activities);
        }

        return $escape->fresh();
    }


    public function asOptions()
    {
        return Escape::orderBy('start_date', 'desc')->get()->map(function($e) {
            return [
                'value' => $e->id,
                'label' =>
                "{$e->escape_type->region}, {$e->escape_type->country} $e->short_display_date"

            ];
        });
    }

    private function generateDateMap($escape, $replaceWith)
    {
        $originalDates = [];
        for($date = $escape->start_date; $date->lte($escape->end_date); $date->addDay()) {
            $originalDates[] = $date->format('Y-m-d');
        }
        $newDates = [];
        for($date = $replaceWith->start_date; $date->lte($replaceWith->end_date); $date->addDay()) {
            $newDates[] = $date->format('Y-m-d');
        }
        //use the escape that has the least dates
        $maxLength = count($originalDates) < count($newDates) ? count($originalDates) : count($newDates);
        $map =  array_combine(
            array_slice($originalDates,0, $maxLength),
            array_slice($newDates, 0, $maxLength)
        );
       return $map;
    }

}
