<?php

namespace App\Http\Controllers;

use App\Performance;
use App\PerformanceResults;
use App\Question;
use Illuminate\Http\Request;

class PerformanceController extends Controller
{
    
    public function list()
    {
        $performancelist = Performance::get();
        return view('performance.list', ['performance'=>$performancelist]);
    }
    public function modify($id = 0, Request $request)
    {
        $questionList = Question::with(['answers' => function($q) {$q->orderBy('order');}])->get();

        $params = ['question'=>'','answers1'=>'','answers2'=>'','answers3'=>''];
        
        return view('performance.edit', ['id'=>$id, 'params'=>$params, 'questions' => $questionList]);
    }
    public function save(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'date' => 'required',
        ]);

        $id = $request->id;
        $performance = Performance::find($id);
        if(!isset($performance->id)){
            $performance = new Performance();
        }
        $performance->title = $request->title;
        $performance->date = $request->date;
        $performance->save();

        foreach ($request->questions as $key => $value) {
            $andkey = "ans-".$value;
            $pr[] = new PerformanceResults(['performance_id'=>$performance->id, 'question_id' => $value, 'answer_id' => $request->$andkey]);
        }

        $performance->performaceResult()->delete();
        $performance->performaceResult()->saveMany($pr);

        return redirect()->route('performanceList');
    }
}
