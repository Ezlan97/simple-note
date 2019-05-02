<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Notes;

class NoteController extends Controller
{
    public function index() {
        $notes = Notes::all();
        return view('home', compact('notes'));
    }

    public function createPage() {
        return view('note.create');
    }

    public function create(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        //create
        $note = new Notes();
        $note->title = $request->title;
        $note->body = $request->body;
        $note->save();

        //return back to view
        Session::flash('success', 'New note has been created!');
        return redirect()->route('home');
    }

    public function updatePage($id) {
        $note = Notes::find($id);

        return view('note.update', compact('note'));
    }

    public function update(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'id' => 'required'
        ]);

        //find id and update
        $note = Notes::find($request->id);
        $note->title = $request->title;
        $note->body = $request->body;
        $note->save();

        //return back to view
        Session::flash('success', 'New note has been updated!');
        return redirect()->route('home');
    }

    public function delete($id) {
        $notes = Notes::find($id);
        $notes->delete();

        Session::flash('success', 'Your note has been deleted');
        return redirect()->back();
    }
}
