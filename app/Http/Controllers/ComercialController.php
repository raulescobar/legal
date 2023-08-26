<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Response;

class ComercialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $responses = Question::whereHas('response',function ($query){
            $query->where('user_id',Auth::id());
        })->where('category','comercial')->get();
        if(!empty($responses)){
            foreach($responses as $response){
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
                    
                    $pendiente = Question::whereDoesntHave('response',function ($query){
                        $query->where('user_id',Auth::id());
                    })->where('relationship',$response->id)
                        ->where('additional',"yes")->first();
                }elseif($response->genere == "Si" and $no == $response->response[0]->response){
                    $pendiente = Question::whereDoesntHave('response',function ($query){
                        $query->where('user_id',Auth::id());
                    })->where('relationship',$response->id)
                        ->where('additional',"no")->first();
                }
            }
        }
        
        if(!isset($pendiente)){
            $responses = Question::whereDoesntHave('response', function ($query) {
                $query->where('user_id',Auth::id());
            })->where('category','comercial')->first();
            $need = $responses;
        }else{
            $need = $pendiente;
        }
        
        return view('comercial.index',compact('need'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'response' => 'required',
            'question_id' => 'required'
        ],
        [
            'response.required' => 'La respuesta no puede estar vacia',
        ]);
        
        $response = Response::create([
            'response' => $request->response,
            'comment' => $request->comment,
            'user_id' => Auth::id(),
            'question_id' => $request->question_id
        ]);
        //dump($response);
        return redirect()->route('comercial.index');
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
        //
    }
}
