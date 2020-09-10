<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Http\Requests\AnswersRequest;
use App\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{

    public function store(AnswersRequest $request,$id)
    {
       $question = Question::findOrFail($id);

        $question->answers()->create($request->validate([
                'body' => 'required'
            ]) + ['user_id' => \Auth::id()] );

//        $newAnswer = new Answer($request->validated());
//        $newAnswer->user_id = $request->user()->id;
//        $newAnswer->question_id = $question;
//        $newAnswer->save();

        return back()->with('success', "Your answer has been submitted successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        //
    }
}
