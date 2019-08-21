<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// import Question class
use App\Question;
use Illuminate\Support\Facades\Session;
use Validator;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();

        return view('questions.index')->with(array(
            'questions' => $questions
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|max:191'
        ]);

        $question = new Question();
        $question->content = $request->input('content');
        $question->save();

        $session = $request->session()->flash('message', 'Question added successfully!');

        return redirect()->route('questions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::findOrFail($id);

        return view('questions.show')->with(array(
            'question' => $question
        ));
    }

       /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);

        return view('questions.edit')->with(array(
            'question' => $question
        ));
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
        $question = Question::findOrFail($id);

        $request->validate([
            'content' => 'required|max:191'
        ]);

        $question->content = $request->input('content');
        $question->save();

        $session = $request->session()->flash('message', 'Question updated successfully!');

        return redirect()->route('questions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);

        $question->delete();

        Session::flash('message', 'Question deleted successfully!');

        return redirect()->route('questions.index');
    }
    
}
