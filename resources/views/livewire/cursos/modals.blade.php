<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Curso</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
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
                    <div class="form-group">
                        <label for="id_sem">Semestre</label>
                        <select wire:model="id_sem" class="form-control" id="id_msem">
                            <option value="">Seleccionar Semestre</option>
                            @foreach ($semestres as $semestre)
                                <option value="{{ $semestre->id }}">{{$semestre->nombre_sem}} - {{ $semestre->id }}</option>
                            @endforeach
                        </select>
                        @error('id_sem') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_car">Carrera</label>
                        <select wire:model="id_car" class="form-control" id="id_car">
                            <option value="">Seleccionar Carrera</option>
                            @foreach ($carreras as $carrera)
                                <option value="{{ $carrera->id }}">{{$carrera->nombre_car}} - {{ $carrera->id }}</option>
                            @endforeach
                        </select>
                        @error('id_car') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_mat">Docente por Materia</label>
                        <select wire:model="id_mat" class="form-control" id="id_mat">
                            <option value="">Seleccionar Materia</option>
                            @foreach ($docentesMaterias as $docenteMateria)
                                <option value="{{ $docenteMateria->id }}">
                                    {{$docenteMateria->id_doc }} - {{ $docenteMateria->id_mat }} - {{ $docenteMateria->id }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_dm') <span class="error text-danger">{{ $message }}</span> @enderror
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
                <h5 class="modal-title" id="updateModalLabel">Update Curso</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
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
                    <div class="form-group">
                        <label for="id_sem">Semestre</label>
                        <select wire:model="id_sem" class="form-control" id="id_msem">
                            <option value="">Seleccionar Semestre</option>
                            @foreach ($semestres as $semestre)
                                <option value="{{ $semestre->id }}">{{$semestre->nombre_sem}} - {{ $semestre->id }}</option>
                            @endforeach
                        </select>
                        @error('id_sem') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_car">Carrera</label>
                        <select wire:model="id_car" class="form-control" id="id_car">
                            <option value="">Seleccionar Carrera</option>
                            @foreach ($carreras as $carrera)
                                <option value="{{ $carrera->id }}">{{$carrera->nombre_car}} - {{ $carrera->id }}</option>
                            @endforeach
                        </select>
                        @error('id_car') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_mat">Docente por Materia</label>
                        <select wire:model="id_mat" class="form-control" id="id_mat">
                            <option value="">Seleccionar Materia</option>
                            @foreach ($docentesMaterias as $docenteMateria)
                                <option value="{{ $docenteMateria->id }}">
                                    {{$docenteMateria->id_doc }} - {{ $docenteMateria->id_mat }} - {{ $docenteMateria->id }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_dm') <span class="error text-danger">{{ $message }}</span> @enderror
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
