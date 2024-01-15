<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AreasConocimiento;

class AreasConocimientos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre_are;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.areasConocimientos.view', [
            'areasConocimientos' => AreasConocimiento::latest()
						->orWhere('nombre_are', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->nombre_are = null;
    }

    public function store()
    {
        $this->validate([
		'nombre_are' => 'required',
        ]);

        AreasConocimiento::create([ 
			'nombre_are' => $this-> nombre_are
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'AreasConocimiento Successfully created.');
    }

    public function edit($id)
    {
        $record = AreasConocimiento::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre_are = $record-> nombre_are;
    }

    public function update()
    {
        $this->validate([
		'nombre_are' => 'required',
        ]);

        if ($this->selected_id) {
			$record = AreasConocimiento::find($this->selected_id);
            $record->update([ 
			'nombre_are' => $this-> nombre_are
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'AreasConocimiento Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            AreasConocimiento::where('id', $id)->delete();
        }
    }
}