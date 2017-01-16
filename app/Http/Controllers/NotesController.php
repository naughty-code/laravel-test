<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index(){
      $notes = Note::paginate();
      return view('notes/list', compact('notes'));
    }

    public function create(){
        return view('notes/create');
    }

    public function store(Request $request){
        $this->validate($request, [
          'text' => ['required', 'max:200']
        ]);
        $data = $request->only(['text']);
        Note::create($data);
        return redirect()->to('notes');
    }

    public function show($note){
      dd($note);
    }
}
