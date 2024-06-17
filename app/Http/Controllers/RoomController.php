<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    public function index()
    {
        $room = Rooms::where('status', 'accepted')->get();

        return view(('rooms'), compact("room"));
    }
    public function index2()
    {
        // Retrieve the currently authenticated user
        $user = Auth::user();

        $room = Rooms::where('user_id', $user->id)->get();

        return view('yourrooms', compact('room'));
    }
    public function index3()
    {

        $room = Rooms::where('status', 'pending')->get();

        return view(('roomrequests'), compact("room"));
    }
    public function index4()
    {
        $user = Auth::user();
        $room = Rooms::where('reserved_by', $user->id)->get();

        return view('reservations', compact('room'));
    }
    public function reserve($id)
    {
        $user = Auth::user();
        $room = Rooms::find($id);

        if ($room && $room->reserved_by === null) {
            $room->reserved_by = $user->id;
            $room->save();
        }

        return redirect('/rooms')->with('success', 'Room reserved successfully.');
    }
    public function review($roomid)
    {
        $room = Rooms::find($roomid);
        return view('review', compact('roomid', 'room'));
    }

    public function reviewstore(Request $request, $roomid)
    {
        // Validate the request data
        $request->validate([
            'content' => 'required|string',
            'stars' => 'required|in:1star,2stars,3stars,4stars', // Adjust if necessary
        ]);

        // Find the room based on its ID
        $room = Rooms::find($roomid);

        // If room not found, handle the situation accordingly (e.g., return an error message)
        if (!$room) {
            return redirect()->back()->with('error', 'Room not found!');
        }

        // Create a new review instance
        $review = new Review();
        $review->user_name = Auth::user()->name; // Automatically add user name
        $review->room_name = $room->name; // Use the room's name
        $review->review_content = $request->input('content');
        $review->stars = $request->input('stars');

        // Save the review
        $review->save();

        // Redirect back with success message
        return redirect('rooms')->with('success', 'Review submitted successfully!');
    }
    public function edit($id)
    {
        $room = Rooms::find($id);
        return view('edit', compact("room"));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
        ]);

        $room = Rooms::findOrFail($id);

        // Remove the _method field from the request data
        $requestData = $request->except(['_method']);

        // Check if a new photo is uploaded
        if ($request->hasFile('photo')) {
            // Validate and store the new photo
            $request->validate([
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $requestData['photo_path'] = $request->file('photo')->store('photos', 'public');

            // Delete the old photo if it exists
            if ($room->photo_path) {
                Storage::delete($room->photo_path);
            }
        }

        // Update the room record
        $room->update($requestData);

        return redirect()->route('rooms');
    }



    public function show($id)
    {
        $room = Rooms::find($id);
        $review = Review::find($id);

        return view(('show'), compact("room", "review"));
    }
    public function show2($id)
    {
        $room = Rooms::find($id);

        return view(('showrequest'), compact("room"));
    }
    public function accept($id)
    {
        $room = Rooms::find($id);

        if ($room && $room->status == 'pending') {
            $room->status = 'accepted';
            $room->save();
        }
        return redirect('/roomrequests');
    }


    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        // Validate the request data including the photo file
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the file upload
        $user = Auth::user();
        $file = $request->file('photo');
        $filePath = $file->store('photos', 'public');

        // Create a new room instance and save the data
        $room = new Rooms();
        $room->user_id = $user->id;
        $room->name = $request->input('name');
        $room->location = $request->input('location');
        $room->price = $request->input('price');
        $room->category = $request->input('category');
        $room->file_path = $filePath; // Store the file path in the database

        $room->save();

        // Redirect to the rooms list with a success message
        return redirect('/yourrooms')->with('success', 'Room created and photo uploaded successfully!');
    }
    public function delete($id)
    {
        $room = Rooms::find($id);
        if ($room) {
            $room->delete();
        }

        return redirect('/rooms');
    }
}
