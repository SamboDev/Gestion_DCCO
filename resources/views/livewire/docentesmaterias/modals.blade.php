<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Docentesmateria</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="id_doc">Docente</label>
                        <select wire:model="id_doc" class="form-control" id="id_doc">
                            <option value="">Seleccionar Docente</option>
                            @foreach ($docentes as $docente)
                                <option value="{{ $docente->id }}">{{$docente->nombre_doc}} - {{ $docente->id }}</option>
                            @endforeach
                        </select>
                        @error('id_doc') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_mat">Materia</label>
                        <select wire:model="id_mat" class="form-control" id="id_mat">
                            <option value="">Seleccionar Materia</option>
                            @foreach ($materias as $materia)
                                <option value="{{ $materia->id }}">{{$materia->nombre_mat}} - {{ $materia->id }}</option>
                            @endforeach
                        </select>
                        @error('id_mat') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Docentesmateria</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="id_doc">Docente</label>
                        <select wire:model="id_doc" class="form-control" id="id_doc">
                            <option value="">Seleccionar Docente</option>
                            @foreach ($docentes as $docente)
                                <option value="{{ $docente->id }}">{{$docente->nombre_doc}} - {{ $docente->id }}</option>
                            @endforeach
                        </select>
                        @error('id_doc') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_mat">Materia</label>
                        <select wire:model="id_mat" class="form-control" id="id_mat">
                            <option value="">Seleccionar Materia</option>
                            @foreach ($materias as $materia)
                                <option value="{{ $materia->id }}">{{$materia->nombre_mat}} - {{ $materia->id }}</option>
                            @endforeach
                        </select>
                        @error('id_mat') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Save</button>
            </div>
       </div>
    </div>
</div>
