<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Word;
use App\Models\Definition;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DefinitionController extends Controller
{
    public function create($id){
        $definition = Definition::find($id);
        $relatedWords = $definition->getWords();

        return view('word.index',
        ['words' => $relatedWords, 'definition' => $definition]);
    }
    public function store(Request $request, $id){
            $formFields = $request->validate([
                'name' => ['required',Rule::unique('words','name')]
            ]);
        try{

            Word::create(['name' => $formFields['name'], 'definition_id' => $id]);
        }   catch(Exception $e){
            return back()->with('message',$e->getMessage());
        }
        return  back()->with('message','Word added successfully! ;p');
    }

    public function destroy(Definition $definition){

        $definition->delete();
        return redirect('/')->with('message','Listing deleted successfully ;d');
    }
}
