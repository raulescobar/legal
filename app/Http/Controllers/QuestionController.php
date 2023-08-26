<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('questions.index');
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
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $categories = [
            'laboral' => 'Derecho laboral',
            'tributario' => 'Derecho tributario',
            'adminstración' =>'Administración',
            'comercial' =>'Comercial',
            'contratación'=>'Contratación'
        ];
        $criticidad = [
            'Bajo' => 'Bajo',
            'Medio' => 'Medio',
            'Alto' => 'Alto'
        ];
        return view('questions.edit',compact('question','categories','criticidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        if($question->relationship == null){
            $request->validate([
                'question' => 'required',
                'category' => 'required',
                'criticality' => 'required'
            ]);
            
        }else{
            $request->validate([
                'question' => 'required'
            ]);
        }
        $question->fill($request->post())->save();
        return redirect()->route('questions.index')->with('info','La pregunta fué actualizada con éxito');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        if($question->relationship == NULL){
            $questions = Question::where('relationship',$question->id)->get();
            foreach ($questions as $pregunta) {
                Question::destroy($pregunta->id);
            }
        }
        Question::destroy($question->id);
        return redirect()->route('questions.index')->with('info','Pregunta eliminada con éxito');
    }

    public function delete($id){
        $question = Question::find($id);
        return view('questions.delete', compact('question'));
    }
}
