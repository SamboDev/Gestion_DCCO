<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Docente;

class Docentes extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_curri, $nombre_doc, $apellido_doc, $cedula_doc, $fecha_nac_doc, $direccion_doc, $correo_doc, $telefono_doc;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.docentes.view', [
            'docentes' => Docente::latest()
						->orWhere('id_curri', 'LIKE', $keyWord)
						->orWhere('nombre_doc', 'LIKE', $keyWord)
						->orWhere('apellido_doc', 'LIKE', $keyWord)
						->orWhere('cedula_doc', 'LIKE', $keyWord)
						->orWhere('fecha_nac_doc', 'LIKE', $keyWord)
						->orWhere('direccion_doc', 'LIKE', $keyWord)
						->orWhere('correo_doc', 'LIKE', $keyWord)
						->orWhere('telefono_doc', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->id_curri = null;
		$this->nombre_doc = null;
		$this->apellido_doc = null;
		$this->cedula_doc = null;
		$this->fecha_nac_doc = null;
		$this->direccion_doc = null;
		$this->correo_doc = null;
		$this->telefono_doc = null;
    }

    public function store()
    {
        $this->validate([
		'id_curri' => 'required',
		'nombre_doc' => 'required',
		'apellido_doc' => 'required',
		'cedula_doc' => 'required',
		'fecha_nac_doc' => 'required',
		'direccion_doc' => 'required',
		'correo_doc' => 'required',
		'telefono_doc' => 'required',
        ]);

        Docente::create([ 
			'id_curri' => $this-> id_curri,
			'nombre_doc' => $this-> nombre_doc,
			'apellido_doc' => $this-> apellido_doc,
			'cedula_doc' => $this-> cedula_doc,
			'fecha_nac_doc' => $this-> fecha_nac_doc,
			'direccion_doc' => $this-> direccion_doc,
			'correo_doc' => $this-> correo_doc,
			'telefono_doc' => $this-> telefono_doc
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Docente Successfully created.');
    }

    public function edit($id)
    {
        $record = Docente::findOrFail($id);
        $this->selected_id = $id; 
		$this->id_curri = $record-> id_curri;
		$this->nombre_doc = $record-> nombre_doc;
		$this->apellido_doc = $record-> apellido_doc;
		$this->cedula_doc = $record-> cedula_doc;
		$this->fecha_nac_doc = $record-> fecha_nac_doc;
		$this->direccion_doc = $record-> direccion_doc;
		$this->correo_doc = $record-> correo_doc;
		$this->telefono_doc = $record-> telefono_doc;
    }

    public function update()
    {
        $this->validate([
		'id_curri' => 'required',
		'nombre_doc' => 'required',
		'apellido_doc' => 'required',
		'cedula_doc' => 'required',
		'fecha_nac_doc' => 'required',
		'direccion_doc' => 'required',
		'correo_doc' => 'required',
		'telefono_doc' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Docente::find($this->selected_id);
            $record->update([ 
			'id_curri' => $this-> id_curri,
			'nombre_doc' => $this-> nombre_doc,
			'apellido_doc' => $this-> apellido_doc,
			'cedula_doc' => $this-> cedula_doc,
			'fecha_nac_doc' => $this-> fecha_nac_doc,
			'direccion_doc' => $this-> direccion_doc,
			'correo_doc' => $this-> correo_doc,
			'telefono_doc' => $this-> telefono_doc
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Docente Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Docente::where('id', $id)->delete();
        }
    }
}