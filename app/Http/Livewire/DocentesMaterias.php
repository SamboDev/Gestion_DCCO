<?php

namespace App\Http\Livewire;

use App\Models\Docente;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Docentesmateria;
use App\Models\Materia;

class Docentesmaterias extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_doc, $id_mat;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.docentesmaterias.view', [
            'docentesmaterias' => Docentesmateria::latest()
						->orWhere('id_doc', 'LIKE', $keyWord)
						->orWhere('id_mat', 'LIKE', $keyWord)
						->paginate(10),
                        'docentes' => Docente::all(),
                        'materias' => Materia::all(),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->id_doc = null;
		$this->id_mat = null;
    }

    public function store()
    {
        $this->validate([
		'id_doc' => 'required',
		'id_mat' => 'required',
        ]);

        Docentesmateria::create([ 
			'id_doc' => $this-> id_doc,
			'id_mat' => $this-> id_mat
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Docentesmateria Successfully created.');
    }

    public function edit($id)
    {
        $record = Docentesmateria::findOrFail($id);
        $this->selected_id = $id; 
		$this->id_doc = $record-> id_doc;
		$this->id_mat = $record-> id_mat;
    }

    public function update()
    {
        $this->validate([
		'id_doc' => 'required',
		'id_mat' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Docentesmateria::find($this->selected_id);
            $record->update([ 
			'id_doc' => $this-> id_doc,
			'id_mat' => $this-> id_mat
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Docentesmateria Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Docentesmateria::where('id', $id)->delete();
        }
    }
}