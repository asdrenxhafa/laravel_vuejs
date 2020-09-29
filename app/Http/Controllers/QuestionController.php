<?php

namespace App\Http\Controllers;

use App\Answer;
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
        return view('questions.create');
    }


    public function store(QuestionsRequest $request)
    {
        $newQuestion = new Question($request->validated());
        $newQuestion->user_id = $request->user()->id;
        $newQuestion->asd = '1';
        $newQuestion->save();

        $questions = Question::latest()->paginate(5);

        return redirect('questions')->with('success','Your question has been successfully submitted');
    }



    public function show(Question $question)
    {
        $question->increment('views');

        return view('questions.show',compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     */
    public function edit(Question $question)
    {
        $this->authorize('view',$question);

        return view('questions.edit',compact('question'));
    }




    public function update(QuestionsRequest $request, Question $question)
    {
        $this->authorize('update',$question);

        $question->update($request->validated());

        if ($request->expectsJson())
        {
            return response()->json([
                'message' => "Your question has been updated.",
                'body_html' => $question->body_html
            ]);
        }

        return redirect('questions')->with('success','Your question has been successfully updated');
    }




    public function destroy(Question $question)
    {
        $this->authorize('delete',$question);

        $question->delete();

        if (request()->expectsJson())
        {
            return response()->json([
                'message' => "Your question has been deleted."
            ]);
        }

        return redirect('questions')->with('success','Your question has been successfully deleted');
    }
}
