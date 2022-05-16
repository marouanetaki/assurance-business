<div>

    <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#addDossierModal-lg">
        <i class="fa fa-plus-circle mr-2"></i>Ajouter un Dossier medical
    </button>


    <!-- Ajout Dossier Modal -->
    <div wire:ignore.self class="modal fade bd-example-modal-lg" id="addDossierModal-lg" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter nouveaux Dossier Medical</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  enctype="multipart/form-data">
                        <div class="row">
                            <label for="date_depot" class="col-md-6 mt-3">Beneficiaire
                                <select name="beneficiaire_id" class="form-control" wire:model='beneficiaire_id'>
                                    @foreach ($benef as $b)
                                        <option value="{{$b->id}}">{{$b->nom}}</option>
                                    @endforeach
                                </select>
                            </label>    
                            
                            <label for="date" class="col-md-6 mt-3">Date Soins
                                <input type="date" id="date" class="form-control" name='date_soins' wire:model='date_soins'>
                                @error('date_soins') <small class="text-danger">{{$message}}</small> @enderror </br>
                            </label>
                        </div>
                        <div class="row">
                            <label for="frais" class="col-md-6">Frais Consultation 
                                <input type="number" id="frais" class="form-control" name='frais_consultation' wire:model='frais_consultation'>
                                @error('frais_consultation') <small class="text-danger">{{$message}}</small> @enderror </br>
                            </label>
                            <label for="frais" class="col-md-6">Frais Pharmacie 
                                <input type="number" id="frais" class="form-control" name='frais_pharmacie' wire:model='frais_pharmacie'>
                                @error('frais_pharmacie') <small class="text-danger">{{$message}}</small> @enderror </br>
                            </label>
                        </div>
                        <div class="row">
                            <label for="frais_analyse" class="col-md-6">Frais Analyses/Radiographie 
                                <input type="number" id="frais_analyse" class="form-control" name='frais_analyse' wire:model='frais_analyse'>
                                @error('frais_analyse') <small class="text-danger">{{$message}}</small> @enderror </br>
                            </label>
                            <label for="documents" class="col-md-6">Images justificatif (Analyse, médicaments...)
                                <input type="file" class="form-control" name='documents[]' wire:model='documents' multiple required>
                                @error('documents') <small class="text-danger">{{$message}}</small> @enderror </br>
                            </label>
                        </div>
                    
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

    <!-- Modifier Dossier Modal -->
    <div wire:ignore class="modal fade bd-example-modal-lg" id="updateDossierModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifier ce dossier </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  enctype="multipart/form-data">
                        <div class="row">
                            <label for="date_depot" class="col-md-6 mt-3">Beneficiaire
                                <select name="beneficiaire_id" class="form-control" wire:model='beneficiaire_id'>
                                    @foreach ($benef as $b)
                                        <option value="{{$b->id}}">{{$b->nom}}</option>
                                    @endforeach
                                </select>
                            </label>    
                            
                            <label for="date" class="col-md-6 mt-3">Date Soins
                                <input type="date" id="date" class="form-control" name='date_soins' wire:model='date_soins'>
                                @error('date_soins') <small class="text-danger">{{$message}}</small> @enderror </br>
                            </label>
                        </div>
                        <div class="row">
                            <label for="frais" class="col-md-6">Frais Consultation 
                                <input type="number" id="frais" class="form-control" name='frais_consultation' wire:model='frais_consultation'>
                                @error('frais_consultation') <small class="text-danger">{{$message}}</small> @enderror </br>
                            </label>
                            <label for="frais" class="col-md-6">Frais Pharmacie 
                                <input type="number" id="frais" class="form-control" name='frais_pharmacie' wire:model='frais_pharmacie'>
                                @error('frais_pharmacie') <small class="text-danger">{{$message}}</small> @enderror </br>
                            </label>
                        </div>
                        <div class="row">
                            <label for="frais_analyse" class="col-md-6">Frais Analyses/Radiographie 
                                <input type="number" id="frais_analyse" class="form-control" name='frais_analyse' wire:model='frais_analyse'>
                                @error('frais_analyse') <small class="text-danger">{{$message}}</small> @enderror </br>
                            </label>
                        </div>
                    
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
                                <th style="width: 40px">Id</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending" style="width: 70.15px;">
                                    Numero Dossier
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending" style="width: 179.15px;">
                                    Nom Béneficiaire
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending" style="width: 179.15px;">
                                    Date de soins
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending" style="width: 179.15px;">
                                    Statut
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending" style="width: 179.15px;">
                                    Total
                                </th>
                                <th style="width: 179.15px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ds as $c)
                            <tr role="row" class="odd">
                                <td><b>{{$c->id}}</b></td>
                                <td>{{$c->num_dossier}}</td>
                                <td>{{$c->beneficiaire['nom']}}</td>
                                <td>{{$c->date_soins}}</td>
                                <td>
                                    @if ($c->statut == "Remboursé")
                                        <b><span class="text-success">{{$c->statut}}</span></b>
                                    @elseif ($c->statut == "En Cours")
                                        <b><span class="text-warning">{{$c->statut}}</span></b>
                                    @else
                                        <b><span class="text-danger">{{$c->statut}}</span></b>
                                    @endif
                                </td>
                                <td>{{$c->total}} DH</td>
                                <td>
                                    <a href="{{ route('dossier.detail',$c->id) }}">
                                        <button type="button" class="btn btn-primary btn-sm text-white">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </a>
                                    <button type="button" class="btn btn-warning btn-sm text-white" data-toggle="modal"
                                        data-target="#updateDossierModal" wire:click.prevent="edit({{$c->id}})">
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