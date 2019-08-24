<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Questionnaire;
use App\Question;
use App\User;


class QuestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questionnaires = Questionnaire::all();

        return view('questionnaires.index')->with(array(
            'questionnaires' => $questionnaires
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions = Question::all();

        return view('questionnaires.create')->with(array(
            'questions' => $questions
        ));
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
            'title' => 'required|max:191',
            'description' => 'required|max:191'
        ]);

        // create new questionnaire
        $questionnaire = new Questionnaire();

        $questionnaire->title = $request->input('title');
        $questionnaire->description = $request->input('description');
        // get ids of questions used for questionnaire
        $questionnaire->question_one = $request->input('question_one'); 
        $questionnaire->question_two = $request->input('question_two'); 
        $questionnaire->question_three = $request->input('question_three'); 
        $questionnaire->question_four = $request->input('question_four'); 
        $questionnaire->question_five = $request->input('question_five'); 
        // save questionnaire
        $questionnaire->save();

       $session = $request->session()->flash('message', 'Questionnaire added successfully!');

       return redirect()->route('questionnaires.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $questionnaire = Questionnaire::findOrFail($id);

        return view('questionnaires.show')->with(array(
            'questionnaire' => $questionnaire
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $questionnaire = Questionnaire::findOrFail($id);

        $questionnaire->delete();

        Session::flash('message', 'Questionnaire deleted successfully!');

        return redirect()->route('questionnaires.index');
    }
}
