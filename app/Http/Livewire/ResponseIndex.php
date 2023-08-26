<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\Console\Command\DumpCompletionCommand;

class ResponseIndex extends Component
{
    public $userId,$category ="laboral",$nombre,$criticidad="";

    public function mount($userId){
        $this->userId = $userId;
    }

    public function render()
    {
        
        $data = new Collection();
        if($this->criticidad==""){
            $responses = Question::whereHas('response',function ($query){
                $query->where('user_id',$this->userId);
            })->where('category',$this->category)->get();
        }else{
            $responses = Question::whereHas('response',function ($query){
                $query->where('user_id',$this->userId);
            })->where('category',$this->category)->where('criticality',$this->criticidad)->get();
        }
        
        $data = $data->merge($responses);
        foreach ($responses as $response) {
            if($response->yes == 1){
                $si = "Si";
            }else{
                $si = "xXx";
            }
            if($response->no == 1){
                $no = "No";
            }else{
                $no = "xXx";
            }
            if($response->genere == "Si" and $si == $response->response[0]->response){
                $secundaria = Question::whereHas('response',function ($query){
                    $query->where('user_id',$this->userId);
                })->where('relationship',$response->id)
                    ->where('additional','yes')->get();
                $data = $data->merge($secundaria);
            }
            if($response->genere == "Si" and $no == $response->response[0]->response){
                $secundaria = Question::whereHas('response',function ($query){
                    $query->where('user_id',$this->userId);
                })->where('relationship',$response->id)
                    ->where('additional','no')->get();
                $data = $data->merge($secundaria);
            }
        }
        
        $info = [];
        $i = 0;
        foreach ($data as $date) {
            if($date->relationship == NULL){
                $info[$i] = $date;
            }
            foreach ($data as $value) {
                if($date->id == $value->relationship){
                    $i = $i + 1;
                    $info[$i] = $value;
                }
            }
            $i = $i + 1;
        }
        
        $this->nombre = User::find($this->userId);
        
        $total = [];
        $respuestas = [];
        $categorias = [
            '0'=>'laboral',
            '1'=>'tributario',
            '2'=>'adminstración',
            '3'=>'comercial',
            '4'=>'contratación'];
        $i = 0;

        foreach ($categorias as $categoria) {
            $total[$i] = Question::where('category',$categoria)->count();
            $respuestas[$i] = Question::whereHas('response',function ($query){
                $query->where('user_id',$this->userId);
            })->where('category',$categoria)->count();
            $i += 1;
        }
        
        return view('livewire.response-index',compact('info','total','respuestas'));
    }
}
