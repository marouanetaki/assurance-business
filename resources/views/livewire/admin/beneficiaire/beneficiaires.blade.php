<div>

    <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#addBeneficiaireModal">
        <i class="fa fa-plus-circle mr-2"></i>Ajouter un Benficiaire
    </button>

    <!-- Ajout Beneficiaire Modal -->
    <div wire:ignore.self class="modal fade" id="addBeneficiaireModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter nouveaux Beneficiaire</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <label for="nom" class="col-md-12 mt-3">Nom Complet
                            <input type="text" id="nom" class="form-control" name='name' wire:model='nom'>
                        </label>
                        <label for="date" class="col-md-12 mt-3">Date Naissance
                            <input type="date" id="date" class="form-control" name='date_naissance' wire:model='date_naissance'>
                        </label>
                        <label for="lien" class="col-md-12 mt-3">Lien de Parenté
                            <select name="lien_parente" class="form-control" wire:model='lien_parente'>
                                <option value="Conjoint">Conjoint</option>
                                <option value="Conjointe">Conjointe</option>
                                <option value="Enfant">Enfant</option>
                            </select>
                        </label>
                        <label for="document" class="col-md-12 mt-3">Justificatif (Acte de naissance, Acte de marriage...)
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

    <!-- Modifier Beneficiaire Modal -->
    <div wire:ignore class="modal fade" id="updateBeneficiaireModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifier Beneficiaire</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" name="id" wire:model='ids'>
                        <label for="nom" class="mt-3">Nom Complet</label>
                        <input type="text" id="nom" class="form-control" name='nom' wire:model='nom'>
                        <label for="date" class="mt-3">Date Naissance </label>
                        <input type="date" id="date" class="form-control" name='date_naissance' wire:model='date_naissance'>
                        <label for="lien" class="mt-3">Lien de Parenté </label>
                        <select name="lien_parente" class="form-control" wire:model='lien_parente'>
                            <option value="Conjoint">Conjoint</option>
                            <option value="Conjointe">Conjointe</option>
                            <option value="Enfant">Enfant</option>
                        </select>
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
                    <table class="table table-striped text-center js-basic-example dataTable" 
                        role="grid" aria-describedby="DataTables_Table_0_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" aria-sort="ascending" style="width: 40.15px;">
                                    Id
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending" style="width: 179.15px;">
                                    Nom Béneficiaire
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending" style="width: 179.15px;">
                                    Date de naissance
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending" style="width: 179.15px;">
                                    Lient Parenté
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending" style="width: 179.15px;">
                                    Statut
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending" style="width: 179.15px;">
                                    Justificatif
                                </th>
                                <th style="width: 179.15px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($benef as $c)
                            <tr role="row" class="odd">
                                <td><b>{{$c->id}}</b></td>
                                <td>{{$c->nom}}</td>
                                <td>{{$c->date_naissance}}</td>
                                <td>{{$c->lien_parente}}</td>
                                <td>
                                    @if ($c->statut == "Actif")
                                        <span class="text-success">{{$c->statut}}</span>
                                    @else
                                        <span class="text-danger">{{$c->statut}}</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-secondary btn-sm" href="{{asset('storage/'.$c->document)}}">
                                        <i class="fa fa-download mr-2"></i> Voir document
                                    </a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm text-white" data-toggle="modal"
                                        data-target="#updateBeneficiaireModal" wire:click.prevent="edit({{$c->id}})">
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