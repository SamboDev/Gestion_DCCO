<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Semestre;

class Semestres extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre_sem;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.semestres.view', [
            'semestres' => Semestre::latest()
						->orWhere('nombre_sem', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->nombre_sem = null;
    }

    public function store()
    {
        $this->validate([
		'nombre_sem' => 'required',
        ]);

        Semestre::create([ 
			'nombre_sem' => $this-> nombre_sem
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Semestre Successfully created.');
    }

    public function edit($id)
    {
        $record = Semestre::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre_sem = $record-> nombre_sem;
    }

    public function update()
    {
        $this->validate([
		'nombre_sem' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Semestre::find($this->selected_id);
            $record->update([ 
			'nombre_sem' => $this-> nombre_sem
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Semestre Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Semestre::where('id', $id)->delete();
        }
    }
}