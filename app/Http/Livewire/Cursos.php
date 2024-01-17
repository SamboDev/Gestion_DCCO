<?php

namespace App\Http\Livewire;

use App\Models\Carrera;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Curso;
use App\Models\Docentesmateria;
use App\Models\Materia;
use App\Models\Semestre;

class Cursos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_mat, $id_sem, $id_car, $id_dm;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.cursos.view', [
            'cursos' => Curso::latest()
						->orWhere('id_mat', 'LIKE', $keyWord)
						->orWhere('id_sem', 'LIKE', $keyWord)
						->orWhere('id_car', 'LIKE', $keyWord)
						->orWhere('id_dm', 'LIKE', $keyWord)
						->paginate(10),
                        'materias' => Materia::all(),
                        'semestres' => Semestre::all(),
                        'carreras' => Carrera::all(),
                        'docentesMaterias' => Docentesmateria::all(),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->id_mat = null;
		$this->id_sem = null;
		$this->id_car = null;
		$this->id_dm = null;
    }

    public function store()
    {
        $this->validate([
		'id_mat' => 'required',
		'id_sem' => 'required',
		'id_car' => 'required',
		'id_dm' => 'required',
        ]);

        Curso::create([ 
			'id_mat' => $this-> id_mat,
			'id_sem' => $this-> id_sem,
			'id_car' => $this-> id_car,
			'id_dm' => $this-> id_dm
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Curso Successfully created.');
    }

    public function edit($id)
    {
        $record = Curso::findOrFail($id);
        $this->selected_id = $id; 
		$this->id_mat = $record-> id_mat;
		$this->id_sem = $record-> id_sem;
		$this->id_car = $record-> id_car;
		$this->id_dm = $record-> id_dm;
    }

    public function update()
    {
        $this->validate([
		'id_mat' => 'required',
		'id_sem' => 'required',
		'id_car' => 'required',
		'id_dm' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Curso::find($this->selected_id);
            $record->update([ 
			'id_mat' => $this-> id_mat,
			'id_sem' => $this-> id_sem,
			'id_car' => $this-> id_car,
			'id_dm' => $this-> id_dm
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Curso Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Curso::where('id', $id)->delete();
        }
    }
}