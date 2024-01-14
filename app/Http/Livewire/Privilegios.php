<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Privilegio;

class Privilegios extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre_priv;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.privilegios.view', [
            'privilegios' => Privilegio::latest()
						->orWhere('nombre_priv', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->nombre_priv = null;
    }

    public function store()
    {
        $this->validate([
		'nombre_priv' => 'required',
        ]);

        Privilegio::create([ 
			'nombre_priv' => $this-> nombre_priv
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Privilegio Successfully created.');
    }

    public function edit($id)
    {
        $record = Privilegio::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre_priv = $record-> nombre_priv;
    }

    public function update()
    {
        $this->validate([
		'nombre_priv' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Privilegio::find($this->selected_id);
            $record->update([ 
			'nombre_priv' => $this-> nombre_priv
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Privilegio Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Privilegio::where('id', $id)->delete();
        }
    }
}