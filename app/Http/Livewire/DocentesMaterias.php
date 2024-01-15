<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\DocentesMateria;

class DocentesMaterias extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_doc, $id_mat;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.docentesMaterias.view', [
            'docentesMaterias' => DocentesMateria::latest()
						->orWhere('id_doc', 'LIKE', $keyWord)
						->orWhere('id_mat', 'LIKE', $keyWord)
						->paginate(10),
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

        DocentesMateria::create([ 
			'id_doc' => $this-> id_doc,
			'id_mat' => $this-> id_mat
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'DocentesMateria Successfully created.');
    }

    public function edit($id)
    {
        $record = DocentesMateria::findOrFail($id);
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
			$record = DocentesMateria::find($this->selected_id);
            $record->update([ 
			'id_doc' => $this-> id_doc,
			'id_mat' => $this-> id_mat
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'DocentesMateria Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            DocentesMateria::where('id', $id)->delete();
        }
    }
}