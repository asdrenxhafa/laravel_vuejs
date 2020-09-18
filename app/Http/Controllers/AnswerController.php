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
            ]) + ['user_id' => \Auth::id()]);

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


    public function edit(Answer $answer, Question $question){
        $this->authorize('view',$answer);

        return view('answers.edit',compact('answer','question'));
    }


    public function update(AnswersRequest $request,Question $question, Answer $answer)
    {
        $this->authorize('update',$answer);

        $answer->update($request->validated());

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Your answer has been updated',
                'body_html' => $answer->body
            ]);
        }


        return redirect()->route('questions.show', $question->slug)->with('success', "Your answer has been submitted successfully");
    }



    public function destroy(Question $question,Answer $answer)
    {
        $this->authorize('delete', $answer);

        $answer->delete();

        if (request()->expectsJson())
        {
            return response()->json([
                'message' => "Your answer has been removed"
            ]);
        }

        return redirect()->route('questions.show', $question->slug)->with('success', "Your answer has been removed");
    }
}
