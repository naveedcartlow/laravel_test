<?php

namespace App\Http\Controllers;
use App\Answer;
use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function list()
    {
        $questionList = Question::get();
        return view('question.list', ['questions'=>$questionList]);
    }
    public function modify($id = 0, Request $request)
    {
        $params = ['question'=>'','answers1'=>'','answers2'=>'','answers3'=>''];
        if($id != 0){
            $question = Question::with(['answers' => function($q) {$q->orderBy('order');}])->find($id);
            if(isset($question->id)){
                $params['question'] = $question->question;
                $params['answers1'] = $question->answers[0]->answers;
                $params['answers2'] = $question->answers[1]->answers;
                $params['answers3'] = $question->answers[2]->answers;
            }
        }
        return view('question.edit', ['id'=>$id, 'params'=>$params]);
    }
    public function save(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required',
            'answers1' => 'required',
            'answers2' => 'required',
            'answers3' => 'required',
        ]);

        $id = $request->id;
        $question = Question::find($id);
        if(!isset($question->id)){
            $question = new Question();
        }
        $question->question = $request->question;
        $question->save();

        $answers[] = new Answer(['answers'=>$request->answers1, 'question_id' => $question->id, 'order'=>1]);
        $answers[] = new Answer(['answers'=>$request->answers2, 'question_id' => $question->id, 'order'=>2]);
        $answers[] = new Answer(['answers'=>$request->answers3, 'question_id' => $question->id, 'order'=>3]);

        $question->answers()->delete();
        $question->answers()->saveMany($answers);
        
        return redirect()->route('questionList');
    }
}
