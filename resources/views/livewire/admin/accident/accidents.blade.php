<div>

    <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#addAccidentModal-lg">
        <i class="fa fa-plus-circle mr-2"></i>Ajouter un Accident de travail
    </button>


    <!-- Ajout Accident Modal -->
    <div wire:ignore.self class="modal fade bd-example-modal-lg" id="addAccidentModal-lg" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter nouvelle Accident de travail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <label for="lieu">Lieu D'accident</label>
                        <input type="text" id="lieu" class="form-control" name='lieu' wire:model='lieu'>
                        @error('lieu') <small class="text-danger">{{$message}}</small> @enderror </br>
                        
                        <label for="heure">Heure d'accident </label>
                        <input type="time" id="heure" class="form-control" name='heure' wire:model='heure'>
                        @error('heure') <small class="text-danger">{{$message}}</small> @enderror </br>
                        
                        <label for="tel">Numero Telephone </label>
                        <input type="tel" id="tel" class="form-control" name='tel' wire:model='tel'>
                        @error('tel') <small class="text-danger">{{$message}}</small> @enderror </br>

                        <label for="cause">Cause & Description </label>
                        <textarea class="form-control" id="cause" name='cause' wire:model='cause' rows="4" placeholder="Remarque, explication, type de traitement..."></textarea>
                        @error('cause') <small class="text-danger">{{$message}}</small> @enderror </br>
                    
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" wire:click.prevent='store()' data-dismiss="modal"
                        class="btn btn-primary">Ajouter</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modifier Accident Modal -->
    <div wire:ignore class="modal fade bd-example-modal-lg" id="updateAccidentModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifier Accident</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <label for="lieu">Lieu D'accident</label>
                        <input type="text" id="lieu" class="form-control" name='lieu' wire:model='lieu'>
                        @error('lieu') <small class="text-danger">{{$message}}</small> @enderror </br>
                        
                        <label for="heure">Heure d'accident </label>
                        <input type="time" id="heure" class="form-control" name='heure' wire:model='heure'>
                        @error('heure') <small class="text-danger">{{$message}}</small> @enderror </br>

                        <label for="tel">Numero Telephone </label>
                        <input type="tel" id="tel" class="form-control" name='tel' wire:model='tel'>
                        @error('tel') <small class="text-danger">{{$message}}</small> @enderror </br>
                        
                        <label for="cause">Cause & Description </label>
                        <textarea class="form-control" id="cause" name='cause' wire:model='cause' rows="4" placeholder="Remarque, explication, type de traitement..."></textarea>
                        @error('cause') <small class="text-danger">{{$message}}</small> @enderror </br>
                    
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" wire:click.prevent='update()' data-dismiss="modal"
                        class="btn btn-primary">Modifier</button>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped text-center js-basic-example dataTable" id="DataTables_Table_0"
                        role="grid" aria-describedby="DataTables_Table_0_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending" style="width: 70.15px;">
                                    Nom Complet
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending" style="width: 179.15px;">
                                    Lieu Accident
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending" style="width: 179.15px;">
                                    Heure
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending" style="width: 179.15px;">
                                    Telephone
                                </th>
                                <th style="width: 179.15px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($acd as $c)
                            <tr role="row" class="odd">
                                <td>{{$c->user['name']}}</td>
                                <td>{{$c->lieu}}</td>
                                <td>{{$c->heure}}</td>
                                <td>{{$c->tel}}</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm text-white" data-toggle="modal"
                                        data-target="#updateAccidentModal" wire:click.prevent="edit({{$c->id}})">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" wire:click.prevent="confirmDelete({{$c->id}})"
                                        class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>