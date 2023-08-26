<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;

class QuestionCreate extends Component
{
    public $question,$category,$criticality,$secundary="",$secundaryNo="",$genere="No",$mensajeError="",$mensajeErrorNo="",$contador=0,$contadorNo=0,$yes=false,$no=false;
    public $questionsyes = array(),$questionsno = array();
    public $errorGeneral = "",$sendYes=false,$sendNo=false;


    protected $rules = [
        'question' => 'required',
        'category' => 'required',
        'criticality' => 'required',
     ];

    protected $messages = [
        'question.required' => 'La pregunta no puede estar vacia',
        'category.required' => 'Debe seleccionar una categoria',
        'criticality.required' => 'Debe seleccionar la criticidad'
    ]; 
    

    public function render()
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
        return view('livewire.question-create',compact('categories','criticidad'));
    }

    public function add(){
        $this->validate();
        

       if($this->genere =="Si"){
            $this->errorGeneral = "";   
            if($this->yes == true){
                
                if(!empty($this->questionsyes)){
                    $this->errorGeneral = ""; 
                    $this->sendYes = true;
                }else{
                    $this->mensajeError = "Debe ingresar al menos una pregunta";
                }
            }

            if($this->no == true){
                if(!empty($this->questionsno)){
                    $this->errorGeneral = ""; 
                    $this->sendNo = true;
                }else{
                    $this->mensajeErrorNo = "Debe ingresar al menos una pregunta";
                }
            }

            if(!$this->yes and !$this->no){
                $this->errorGeneral = "Debe ingresar las preguntas adicionales";
            }else{
                $this->errorGeneral = "";
            }

            if($this->sendYes or $this->sendNo){
                $new = Question::create([
                    'question' => $this->question,
                    'category' => $this->category,
                    'criticality' => $this->criticality,
                    'genere' => $this->genere,
                    'yes' => $this->yes,
                    'no' => $this->no,
                    'relationship' => null,
                    'additional' => null
                ]);
                if($this->sendYes){
                    foreach ($this->questionsyes as $key => $item) {
                        $complement = Question::create([
                            'question' => $item['question'],
                            'relationship' => $new->id,
                            'additional' => 'yes'
                        ]);
                    }
                }

                if($this->sendNo){
                    foreach ($this->questionsno as $key => $item) {
                        $complement = Question::create([
                            'question' => $item['question'],
                            'relationship' => $new->id,
                            'additional' => 'no'
                        ]);
                    }
                }
                return redirect()->route('questions.index')->with('info','Pregunta agregada con éxito');
            }

       }else{
            $new = Question::create([
                'question' => $this->question,
                'category' => $this->category,
                'criticality' => $this->criticality,
                'genere' => $this->genere,
                'yes' => null,
                'no' => null,
                'relationship' => null,
                'additional' => null
            ]);
            return redirect()->route('questions.index')->with('info','Pregunta agregada con éxito');
       }
       
    }

    public function agregaryes(){
        $this->mensajeError = "";
        if($this->secundary !=""){
            $this->contador = $this->contador +1;
            $this->questionsyes[$this->contador] = array("question"=>$this->secundary);
            $this->secundary = "";
        }else{
            $this->mensajeError = "Debe ingresar la pregunta para continuar";
        }
    }

    public function agregarno(){
        $this->mensajeErrorNo = "";
        if($this->secundaryNo !=""){
            $this->contadorNo = $this->contadorNo +1;
            $this->questionsno[$this->contadorNo] = array("question"=>$this->secundaryNo);
            $this->secundaryNo = "";
        }else{
            $this->mensajeErrorNo = "Debe ingresar la pregunta para continuar";
        }
    }
}
