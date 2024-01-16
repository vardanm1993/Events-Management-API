<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Event\StoreEventRequest;
use App\Http\Requests\Event\UpdateEventRequest;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
       return EventResource::collection(
            Event::with('user')->paginate()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request): EventResource
    {
        return new EventResource(
            Event::create([
                ...$request->validated(),
                'user_id' => 1
            ])
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event): EventResource
    {
        $event->load('user','attendees');
        return new EventResource($event);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event): EventResource
    {
        $event->update($request->validated());

        return new EventResource($event);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event): Response
    {
        $event->delete();

        return response(status: 204);
    }
}
