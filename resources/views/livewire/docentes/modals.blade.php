@push('styles')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
@endpush

@push('scripts')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Datepicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <!-- Script Datepicker -->
    <script>
        $(document).ready(function () {
            $('#fecha_nac_doc').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
            });
        });
    </script>
@endpush

<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Docente</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="Curriculum">Curriculum</label>
                        <select wire:model="id_curri" class="form-control" id="id_curri">
                            <option value="">Seleccionar Curriculum</option>
                            @foreach ($curriculums as $curriculum)
                                <option value="{{ $curriculum->id }}">{{$curriculum->institucion_cur}} - {{ $curriculum->id }}</option>
                            @endforeach
                        </select>
                        @error('id_curri') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nombre_doc">Nombres</label>
                        <input wire:model="nombre_doc" type="text" class="form-control" id="nombre_doc" placeholder="Nombre Doc">@error('nombre_doc') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="apellido_doc">Apellidos</label>
                        <input wire:model="apellido_doc" type="text" class="form-control" id="apellido_doc" placeholder="Apellido Doc">@error('apellido_doc') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="cedula_doc">Cedula</label>
                        <input wire:model="cedula_doc" type="text" class="form-control" id="cedula_doc" placeholder="Cedula Doc">@error('cedula_doc') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_nac_doc">Fecha de Nacimiento</label>
                        <input wire:model.lazy="fecha_nac_doc" type="text" class="form-control datepicker" id="fecha_nac_doc" placeholder="Fecha Nac Doc">
                        @error('fecha_nac_doc') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="direccion_doc">Dirección</label>
                        <input wire:model="direccion_doc" type="text" class="form-control" id="direccion_doc" placeholder="Direccion Doc">@error('direccion_doc') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="correo_doc">Correo</label>
                        <input wire:model="correo_doc" type="text" class="form-control" id="correo_doc" placeholder="Correo Doc">@error('correo_doc') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="telefono_doc">Teléfono</label>
                        <input wire:model="telefono_doc" type="text" class="form-control" id="telefono_doc" placeholder="Telefono Doc">@error('telefono_doc') <span class="error text-danger">{{ $message }}</span> @enderror
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
                <h5 class="modal-title" id="updateModalLabel">Update Docente</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="Curriculum">Curriculum</label>
                        <select wire:model="id_curri" class="form-control" id="id_curri">
                            <option value="">Seleccionar Curriculum</option>
                            @foreach ($curriculums as $curriculum)
                                <option value="{{ $curriculum->id }}">{{$curriculum->institucion_cur}} - {{ $curriculum->id }}</option>
                            @endforeach
                        </select>
                        @error('id_curri') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nombre_doc">Nombres</label>
                        <input wire:model="nombre_doc" type="text" class="form-control" id="nombre_doc" placeholder="Nombre Doc">@error('nombre_doc') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="apellido_doc">Apellidos</label>
                        <input wire:model="apellido_doc" type="text" class="form-control" id="apellido_doc" placeholder="Apellido Doc">@error('apellido_doc') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="cedula_doc">Cedula</label>
                        <input wire:model="cedula_doc" type="text" class="form-control" id="cedula_doc" placeholder="Cedula Doc">@error('cedula_doc') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_nac_doc">Fecha de Nacimiento</label>
                        <input wire:model.lazy="fecha_nac_doc" type="text" class="form-control datepicker" id="fecha_nac_doc" placeholder="Fecha Nac Doc">
                        @error('fecha_nac_doc') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="direccion_doc">Dirección</label>
                        <input wire:model="direccion_doc" type="text" class="form-control" id="direccion_doc" placeholder="Direccion Doc">@error('direccion_doc') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="correo_doc">Correo</label>
                        <input wire:model="correo_doc" type="text" class="form-control" id="correo_doc" placeholder="Correo Doc">@error('correo_doc') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="telefono_doc">Teléfono</label>
                        <input wire:model="telefono_doc" type="text" class="form-control" id="telefono_doc" placeholder="Telefono Doc">@error('telefono_doc') <span class="error text-danger">{{ $message }}</span> @enderror
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
