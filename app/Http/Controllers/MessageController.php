<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;


class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('messages.index', compact('messages'));
    }

    // show
    public function show($id)
    {
        $messages = Message::findOrFail($id);
        return view('messages.show', compact('messages'));
    }

    // create

    // destroy
    public function destroy($id)
    {
        $messages = Message::findOrFail($id);
        $messages->delete();
        return redirect()->route('messages.index')->with('success', 'Message deleted successfully');
    }

    public function deleteAll()
    {
        Message::truncate();
        // TRUNCATE TABLE `laravel`.`messages`
        return redirect()->route('messages.index')->with('success', 'All messages deleted successfully');
    }

}
