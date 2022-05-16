<div>
    <p>
        Avant d'ajouter une prise en charge, vous devez telecharger et remplir le documents suivant auprés 
        de votre clinique <a href="{{asset('assets/prise_en_charge.pdf')}}"><b>Dossier PC</b></a>
    </p>
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addPriseModal">
        <i class="fa fa-plus-circle mr-2"></i>Ajouter une Prise en charge
    </button>


    <!-- Ajout Prise Modal -->
    <div wire:ignore.self class="modal fade" id="addPriseModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter Prise en charge</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <label for="clinique" class="col-md-12">Nom de la clinique
                            <input type="text" id="clinique" class="form-control" name='clinique' wire:model='clinique'>
                            @error('clinique') <small class="text-danger">{{$message}}</small> @enderror </br>
                        </label>
                        <label for="type" class="col-md-12">Type d'operation
                            <input type="text" id="type" class="form-control" name='type_operation' wire:model='type_operation'>
                            @error('type_operation') <small class="text-danger">{{$message}}</small> @enderror </br>
                        </label>
                        <label for="beneficiaire_id" class="col-md-12">Beneficiaire
                            <select name="beneficiaire_id" class="form-control" wire:model='beneficiaire_id'>
                                @foreach ($benef as $b)
                                    <option value="{{$b->id}}">{{$b->nom}}</option>
                                @endforeach
                            </select>
                            @error('date_soins') <small class="text-danger">{{$message}}</small> @enderror </br>
                        </label>
                        <label for="document" class="col-md-12">Images du dossier de prise en charge rempli
                            <input type="file" class="form-control" name='document' wire:model='document'>
                            @error('document') <small class="text-danger">{{$message}}</small> @enderror </br>
                        </label>   
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

    <!-- Modifier Prise Modal -->
    <div wire:ignore class="modal fade" id="updatePriseModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifier Prise en charge</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <label for="clinique" class="col-md-12">Nom de la clinique
                            <input type="text" id="clinique" class="form-control" name='clinique' wire:model='clinique'>
                            @error('clinique') <small class="text-danger">{{$message}}</small> @enderror </br>
                        </label>
                        <label for="type" class="col-md-12">Type d'operation
                            <input type="text" id="type" class="form-control" name='type_operation' wire:model='type_operation'>
                            @error('type_operation') <small class="text-danger">{{$message}}</small> @enderror </br>
                        </label>
                        <label for="beneficiaire_id" class="col-md-12">Beneficiaire
                            <select name="beneficiaire_id" class="form-control" wire:model='beneficiaire_id'>
                                @foreach ($benef as $b)
                                    <option value="{{$b->id}}">{{$b->nom}}</option>
                                @endforeach
                            </select>
                            @error('date_soins') <small class="text-danger">{{$message}}</small> @enderror </br>
                        </label>
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
                                    aria-label="Name: activate to sort column descending" style="width: 179.15px;">
                                    Nom Béneficiaire
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending" style="width: 179.15px;">
                                    Clinique
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending" style="width: 179.15px;">
                                    Type d'operation
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending" style="width: 179.15px;">
                                    Dossier PC
                                </th>
                                <th style="width: 179.15px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prs as $c)
                            <tr role="row" class="odd">
                                <td>{{$c->beneficiaire['nom']}}</td>
                                <td>{{$c->clinique}}</td>
                                <td>{{$c->type_operation}}</td>
                                <td>
                                    <a class="btn btn-secondary btn-sm" href="{{asset('storage/'.$ds)}}">
                                        <i class="fa fa-download mr-2"></i> Voir Dossier
                                    </a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm text-white" data-toggle="modal"
                                        data-target="#updatePriseModal" wire:click.prevent="edit({{$c->id}})">
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