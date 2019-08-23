<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// import Question class
use App\Question;
use Auth;
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


    ////////////////// Questionnaire ///////////////////////

    public function getAddToContent(Request $request, $id){
        $question = Question::find($id);
        $oldContent= Session::has('content') ? Session::get('content') : null;
        $content = new QContent($oldContent);
        $content->add($question, $question->id);

        $request->session()->put('content', $content);
        return redirect()->route('questions.index');
    }

    public function getQContent(){
        // check if we have content in the session
        if (!Session::has('content')) {
            return view('questions.questionnaire-content');
        }
        $oldContent = Session::get('content');
        $content = new QContent($oldContent);
        return view('questions.questionnaire-content', ['questions' => $content->items]);
    }

    public function getFinish(){
        if (!Session::has('content')){
            return view('questions.questionnaire-content');
        }
        $oldContent = Session::get('content');
        $content = new QContent($oldContent);
        return view('questions.finish');
    }

    public function postQuestionnaire(Request $request){
        if (!Session::has('content')){
            return redirect()->route('questions.questionnaire-content');
        }
        $oldContent = Session::get('content');
        $content = new QContent($oldContent);

        $questionnaire = new Questionnaire();
        // takes PHP object and converts it into a string..
        // and then store that string in the DB
        $questionnaire->content = serialize($content);
        // question var name is content, has to be changed here to avoid duplication or errors
        $questionnaire->question_content =  $request->input('content');

        // build a query for the DB to save the questionnaire
        Auth::user()->questionnaires()->save($questionnaire);

        Session::forget('content');
        return redirect()->route('finish')->with('success', 'Sucessfully created questionnaire!');
    
    }

}
