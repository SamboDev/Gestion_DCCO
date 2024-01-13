<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Carrera;

class Carreras extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre_car;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.carreras.view', [
            'carreras' => Carrera::latest()
						->orWhere('nombre_car', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->nombre_car = null;
    }

    public function store()
    {
        $this->validate([
		'nombre_car' => 'required',
        ]);

        Carrera::create([ 
			'nombre_car' => $this-> nombre_car
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Carrera Successfully created.');
    }

    public function edit($id)
    {
        $record = Carrera::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre_car = $record-> nombre_car;
    }

    public function update()
    {
        $this->validate([
		'nombre_car' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Carrera::find($this->selected_id);
            $record->update([ 
			'nombre_car' => $this-> nombre_car
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Carrera Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Carrera::where('id', $id)->delete();
        }
    }
}