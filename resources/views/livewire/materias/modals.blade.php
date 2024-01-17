<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Materia</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="id_are">Área de Conocimiento</label>
                        <select wire:model="id_are" class="form-control" id="id_are">
                            <option value="">Seleccionar Área de Conocimiento</option>
                            @foreach ($areasConocimientos as $areasConocimiento)
                                <option value="{{ $areasConocimiento->id }}">{{$areasConocimiento->nombre_are}} - {{ $areasConocimiento->id }}</option>
                            @endforeach
                        </select>
                        @error('id_are') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="codigo_mat">Código</label>
                        <input wire:model="codigo_mat" type="text" class="form-control" id="codigo_mat" placeholder="Codigo Mat">@error('codigo_mat') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nombre_mat">Nombre</label>
                        <input wire:model="nombre_mat" type="text" class="form-control" id="nombre_mat" placeholder="Nombre Mat">@error('nombre_mat') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="requisito_doc_mat">Requisitos para profesor</label>
                        <input wire:model="requisito_doc_mat" type="text" class="form-control" id="requisito_doc_mat" placeholder="Requisito Doc Mat">@error('requisito_doc_mat') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="horas_trabAuto_mat">Horas de Trabajo Autónomo</label>
                        <input wire:model="horas_trabAuto_mat" type="text" class="form-control" id="horas_trabAuto_mat" placeholder="Horas Trabauto Mat">@error('horas_trabAuto_mat') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="horas_doc_mat">Horas del Docente</label>
                        <input wire:model="horas_doc_mat" type="text" class="form-control" id="horas_doc_mat" placeholder="Horas Doc Mat">@error('horas_doc_mat') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="horas_invest_mat">Horas de Investigación</label>
                        <input wire:model="horas_invest_mat" type="text" class="form-control" id="horas_invest_mat" placeholder="Horas Invest Mat">@error('horas_invest_mat') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="horas_total">Horas Totales</label>
                        <input wire:model="horas_total" type="text" class="form-control" id="horas_total" placeholder="Horas Total">@error('horas_total') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="descripcion_mat">Descripción</label>
                        <input wire:model="descripcion_mat" type="text" class="form-control" id="descripcion_mat" placeholder="Descripcion Mat">@error('descripcion_mat') <span class="error text-danger">{{ $message }}</span> @enderror
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
                <h5 class="modal-title" id="updateModalLabel">Update Materia</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="id_are">Área de Conocimiento</label>
                        <select wire:model="id_are" class="form-control" id="id_are">
                            <option value="">Seleccionar Área de Conocimiento</option>
                            @foreach ($areasConocimientos as $areasConocimiento)
                                <option value="{{ $areasConocimiento->id }}">{{$areasConocimiento->nombre_are}} - {{ $areasConocimiento->id }}</option>
                            @endforeach
                        </select>
                        @error('id_are') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="codigo_mat">Código</label>
                        <input wire:model="codigo_mat" type="text" class="form-control" id="codigo_mat" placeholder="Codigo Mat">@error('codigo_mat') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nombre_mat">Nombre</label>
                        <input wire:model="nombre_mat" type="text" class="form-control" id="nombre_mat" placeholder="Nombre Mat">@error('nombre_mat') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="requisito_doc_mat">Requisitos para profesor</label>
                        <input wire:model="requisito_doc_mat" type="text" class="form-control" id="requisito_doc_mat" placeholder="Requisito Doc Mat">@error('requisito_doc_mat') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="horas_trabAuto_mat">Horas de Trabajo Autónomo</label>
                        <input wire:model="horas_trabAuto_mat" type="text" class="form-control" id="horas_trabAuto_mat" placeholder="Horas Trabauto Mat">@error('horas_trabAuto_mat') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="horas_doc_mat">Horas del Docente</label>
                        <input wire:model="horas_doc_mat" type="text" class="form-control" id="horas_doc_mat" placeholder="Horas Doc Mat">@error('horas_doc_mat') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="horas_invest_mat">Horas de Investigación</label>
                        <input wire:model="horas_invest_mat" type="text" class="form-control" id="horas_invest_mat" placeholder="Horas Invest Mat">@error('horas_invest_mat') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="horas_total">Horas Totales</label>
                        <input wire:model="horas_total" type="text" class="form-control" id="horas_total" placeholder="Horas Total">@error('horas_total') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="descripcion_mat">Descripción</label>
                        <input wire:model="descripcion_mat" type="text" class="form-control" id="descripcion_mat" placeholder="Descripcion Mat">@error('descripcion_mat') <span class="error text-danger">{{ $message }}</span> @enderror
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
