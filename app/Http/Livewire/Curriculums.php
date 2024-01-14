<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Curriculum;

class Curriculums extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $institucion_cur, $fecha_gra_cur, $titulo_cur, $interes_inv_cur, $premios_cur, $cursos_cur, $otras_responsabilidades_cur;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.curriculums.view', [
            'curriculums' => Curriculum::latest()
						->orWhere('institucion_cur', 'LIKE', $keyWord)
						->orWhere('fecha_gra_cur', 'LIKE', $keyWord)
						->orWhere('titulo_cur', 'LIKE', $keyWord)
						->orWhere('interes_inv_cur', 'LIKE', $keyWord)
						->orWhere('premios_cur', 'LIKE', $keyWord)
						->orWhere('cursos_cur', 'LIKE', $keyWord)
						->orWhere('otras_responsabilidades_cur', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
		$this->institucion_cur = null;
		$this->fecha_gra_cur = null;
		$this->titulo_cur = null;
		$this->interes_inv_cur = null;
		$this->premios_cur = null;
		$this->cursos_cur = null;
		$this->otras_responsabilidades_cur = null;
    }

    public function store()
    {
        $this->validate([
		'institucion_cur' => 'required',
		'fecha_gra_cur' => 'required',
		'titulo_cur' => 'required',
		'interes_inv_cur' => 'required',
		'premios_cur' => 'required',
		'cursos_cur' => 'required',
		'otras_responsabilidades_cur' => 'required',
        ]);

        Curriculum::create([
			'institucion_cur' => $this-> institucion_cur,
			'fecha_gra_cur' => $this-> fecha_gra_cur,
			'titulo_cur' => $this-> titulo_cur,
			'interes_inv_cur' => $this-> interes_inv_cur,
			'premios_cur' => $this-> premios_cur,
			'cursos_cur' => $this-> cursos_cur,
			'otras_responsabilidades_cur' => $this-> otras_responsabilidades_cur
        ]);

        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Curriculum Successfully created.');
    }

    public function edit($id)
    {
        $record = Curriculum::findOrFail($id);
        $this->selected_id = $id;
		$this->institucion_cur = $record-> institucion_cur;
		$this->fecha_gra_cur = $record-> fecha_gra_cur;
		$this->titulo_cur = $record-> titulo_cur;
		$this->interes_inv_cur = $record-> interes_inv_cur;
		$this->premios_cur = $record-> premios_cur;
		$this->cursos_cur = $record-> cursos_cur;
		$this->otras_responsabilidades_cur = $record-> otras_responsabilidades_cur;
    }

    public function update()
    {
        $this->validate([
		'institucion_cur' => 'required',
		'fecha_gra_cur' => 'required',
		'titulo_cur' => 'required',
		'interes_inv_cur' => 'required',
		'premios_cur' => 'required',
		'cursos_cur' => 'required',
		'otras_responsabilidades_cur' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Curriculum::find($this->selected_id);
            $record->update([
			'institucion_cur' => $this-> institucion_cur,
			'fecha_gra_cur' => $this-> fecha_gra_cur,
			'titulo_cur' => $this-> titulo_cur,
			'interes_inv_cur' => $this-> interes_inv_cur,
			'premios_cur' => $this-> premios_cur,
			'cursos_cur' => $this-> cursos_cur,
			'otras_responsabilidades_cur' => $this-> otras_responsabilidades_cur
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Curriculum Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Curriculum::where('id', $id)->delete();
        }
    }
}
