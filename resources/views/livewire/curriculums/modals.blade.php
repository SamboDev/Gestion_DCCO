<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Curriculum</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="institucion_cur"></label>
                        <input wire:model="institucion_cur" type="text" class="form-control" id="institucion_cur" placeholder="Institucion Cur">@error('institucion_cur') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_gra_cur"></label>
                        <input wire:model="fecha_gra_cur" type="text" class="form-control" id="fecha_gra_cur" placeholder="Fecha Gra Cur">@error('fecha_gra_cur') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="titulo_cur"></label>
                        <input wire:model="titulo_cur" type="text" class="form-control" id="titulo_cur" placeholder="Titulo Cur">@error('titulo_cur') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="interes_inv_cur"></label>
                        <input wire:model="interes_inv_cur" type="text" class="form-control" id="interes_inv_cur" placeholder="Interes Inv Cur">@error('interes_inv_cur') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="premios_cur"></label>
                        <input wire:model="premios_cur" type="text" class="form-control" id="premios_cur" placeholder="Premios Cur">@error('premios_cur') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="cursos_cur"></label>
                        <input wire:model="cursos_cur" type="text" class="form-control" id="cursos_cur" placeholder="Cursos Cur">@error('cursos_cur') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="otras_responsabilidades_cur"></label>
                        <input wire:model="otras_responsabilidades_cur" type="text" class="form-control" id="otras_responsabilidades_cur" placeholder="Otras Responsabilidades Cur">@error('otras_responsabilidades_cur') <span class="error text-danger">{{ $message }}</span> @enderror
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
                <h5 class="modal-title" id="updateModalLabel">Update Curriculum</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="institucion_cur"></label>
                        <input wire:model="institucion_cur" type="text" class="form-control" id="institucion_cur" placeholder="Institucion Cur">@error('institucion_cur') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_gra_cur"></label>
                        <input wire:model="fecha_gra_cur" type="text" class="form-control" id="fecha_gra_cur" placeholder="Fecha Gra Cur">@error('fecha_gra_cur') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="titulo_cur"></label>
                        <input wire:model="titulo_cur" type="text" class="form-control" id="titulo_cur" placeholder="Titulo Cur">@error('titulo_cur') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="interes_inv_cur"></label>
                        <input wire:model="interes_inv_cur" type="text" class="form-control" id="interes_inv_cur" placeholder="Interes Inv Cur">@error('interes_inv_cur') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="premios_cur"></label>
                        <input wire:model="premios_cur" type="text" class="form-control" id="premios_cur" placeholder="Premios Cur">@error('premios_cur') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="cursos_cur"></label>
                        <input wire:model="cursos_cur" type="text" class="form-control" id="cursos_cur" placeholder="Cursos Cur">@error('cursos_cur') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="otras_responsabilidades_cur"></label>
                        <input wire:model="otras_responsabilidades_cur" type="text" class="form-control" id="otras_responsabilidades_cur" placeholder="Otras Responsabilidades Cur">@error('otras_responsabilidades_cur') <span class="error text-danger">{{ $message }}</span> @enderror
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
