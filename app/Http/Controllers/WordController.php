<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Word;
use App\Models\Definition;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WordController extends Controller
{
    //

    public function index(){

        return view('listing.index', [
            'data' =>Word::with('definition')->get()

        ]);
    }

    public function edit(Word $word){
        return view('listing.edit', ['word' => $word->where('id',$word->id)->with('definition')->first()]);

    }
    public function update(Request $request, $id){

        $formFields = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        try{

            $word = Word::with('definition')->where(['id' => $id]);
            $word->update(['name' => $formFields['name']]);
            $definition = Definition::where(['id' => $word->first()->definition_id]);
            $definition->update(['description' => $formFields['description']]);

        }   catch(Exception $e){
            // dd($e);
            return back()->with('message',$e->getMessage());
        }

        return redirect('/')->with('message','Definition created successfully!');

    }
    public function create(){
        return view('listing.create');
    }
    public function store(Request $request){
        $formFields = $request->validate([
            'name' => ['required',Rule::unique('words','name')],
            'description' => 'required'
        ]);
        try{
            $definition = Definition::create(['description' =>  $formFields['description']]);
            Word::create(['name' => $formFields['name'], 'definition_id' => $definition-> id]);
        }   catch(Exception $e){
            return back()->with('message',$e->getMessage());
        }
        return redirect('/')->with('message','Definition created successfully!');
    }

    public function destroy(Word $word){
        $data = Word::where(['definition_id' => $word->definition_id])->get();

        $word->delete();
        if(count($data) <= 1){
            Definition::where(['id' => $word->definition_id])->delete();
        }

        return redirect('/')->with('message','Listing deleted successfully ;d');
    }
}
// return view('listins.manage', ['word' => auth()->user()->words()->get()]);
