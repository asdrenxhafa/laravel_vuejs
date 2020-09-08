<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionsRequest;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{

    public function index()
    {
        $questions = Question::latest()->paginate(5);

        return view('questions.index',compact('questions'));
    }

    public function create()
    {
//        $question = new Question();

//        return view('home');
        return view('questions.create');
    }


    public function store(QuestionsRequest $request)
    {
        $newQuestion = new Question($request->validated());
        $newQuestion->user_id = $request->user()->id;
        $newQuestion->save();

        $questions = Question::latest()->paginate(5);

        return redirect('questions')->with('success','Your question has been successfully submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
