<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;
use Livewire\WithPagination;

class QuestionIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;
    
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $questions = Question::where('question','LIKE','%'.$this->search.'%')
                                        ->orderBy('id','desc')
                                        ->paginate(10);
        return view('livewire.question-index',compact('questions'));
    }

    
}
