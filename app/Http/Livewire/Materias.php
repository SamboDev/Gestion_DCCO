<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Materia;

class Materias extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_are, $codigo_mat, $nombre_mat, $requisito_doc_mat, $horas_trabAuto_mat, $horas_doc_mat, $horas_invest_mat, $horas_total, $descripcion_mat;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.materias.view', [
            'materias' => Materia::latest()
						->orWhere('id_are', 'LIKE', $keyWord)
						->orWhere('codigo_mat', 'LIKE', $keyWord)
						->orWhere('nombre_mat', 'LIKE', $keyWord)
						->orWhere('requisito_doc_mat', 'LIKE', $keyWord)
						->orWhere('horas_trabAuto_mat', 'LIKE', $keyWord)
						->orWhere('horas_doc_mat', 'LIKE', $keyWord)
						->orWhere('horas_invest_mat', 'LIKE', $keyWord)
						->orWhere('horas_total', 'LIKE', $keyWord)
						->orWhere('descripcion_mat', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->id_are = null;
		$this->codigo_mat = null;
		$this->nombre_mat = null;
		$this->requisito_doc_mat = null;
		$this->horas_trabAuto_mat = null;
		$this->horas_doc_mat = null;
		$this->horas_invest_mat = null;
		$this->horas_total = null;
		$this->descripcion_mat = null;
    }

    public function store()
    {
        $this->validate([
		'id_are' => 'required',
		'codigo_mat' => 'required',
		'nombre_mat' => 'required',
		'requisito_doc_mat' => 'required',
		'horas_trabAuto_mat' => 'required',
		'horas_doc_mat' => 'required',
		'horas_invest_mat' => 'required',
		'horas_total' => 'required',
		'descripcion_mat' => 'required',
        ]);

        Materia::create([ 
			'id_are' => $this-> id_are,
			'codigo_mat' => $this-> codigo_mat,
			'nombre_mat' => $this-> nombre_mat,
			'requisito_doc_mat' => $this-> requisito_doc_mat,
			'horas_trabAuto_mat' => $this-> horas_trabAuto_mat,
			'horas_doc_mat' => $this-> horas_doc_mat,
			'horas_invest_mat' => $this-> horas_invest_mat,
			'horas_total' => $this-> horas_total,
			'descripcion_mat' => $this-> descripcion_mat
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Materia Successfully created.');
    }

    public function edit($id)
    {
        $record = Materia::findOrFail($id);
        $this->selected_id = $id; 
		$this->id_are = $record-> id_are;
		$this->codigo_mat = $record-> codigo_mat;
		$this->nombre_mat = $record-> nombre_mat;
		$this->requisito_doc_mat = $record-> requisito_doc_mat;
		$this->horas_trabAuto_mat = $record-> horas_trabAuto_mat;
		$this->horas_doc_mat = $record-> horas_doc_mat;
		$this->horas_invest_mat = $record-> horas_invest_mat;
		$this->horas_total = $record-> horas_total;
		$this->descripcion_mat = $record-> descripcion_mat;
    }

    public function update()
    {
        $this->validate([
		'id_are' => 'required',
		'codigo_mat' => 'required',
		'nombre_mat' => 'required',
		'requisito_doc_mat' => 'required',
		'horas_trabAuto_mat' => 'required',
		'horas_doc_mat' => 'required',
		'horas_invest_mat' => 'required',
		'horas_total' => 'required',
		'descripcion_mat' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Materia::find($this->selected_id);
            $record->update([ 
			'id_are' => $this-> id_are,
			'codigo_mat' => $this-> codigo_mat,
			'nombre_mat' => $this-> nombre_mat,
			'requisito_doc_mat' => $this-> requisito_doc_mat,
			'horas_trabAuto_mat' => $this-> horas_trabAuto_mat,
			'horas_doc_mat' => $this-> horas_doc_mat,
			'horas_invest_mat' => $this-> horas_invest_mat,
			'horas_total' => $this-> horas_total,
			'descripcion_mat' => $this-> descripcion_mat
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Materia Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Materia::where('id', $id)->delete();
        }
    }
}