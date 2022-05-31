<div>
    <div>
        <div class="card">
            <div class="header">
                <h3><i>Dossier médical numéro : {{$dossier->num_dossier}}</i></h3>
                <div class="float-right">
                    <a href="{{route('dossier.index')}}" class="btn btn-success">Retour</a>
                    <button class="btn btn-danger" wire:click.prevent="confirmDelete({{$dossier->id}})">Supprimer</button>
                </div>
            </div>
            <div class="body">
                <div class="row">
                    <div class="col-md-4">
                        <h4 class="text-info">Infos dossier</h4>
                        <p><b>Date de depot :</b> {{$dossier->date_depot}}</p>
                        <p><b>Date des soins :</b> {{$dossier->date_soins}}</p>
                        <p><b>Frais consultations :</b> {{$dossier->frais_consultation}} dh</p>
                        <p><b>Frais pharmacie :</b> {{$dossier->frais_pharmacie}} dh</p>
                        <p><b>Frais Analyse :</b> {{$dossier->frais_analyse}} dh</p>
                        <p>
                            @if ($dossier->statut == 'Remboursé')
                                <h4><span class="badge badge-success">Dossier {{$dossier->statut}}</span></h4>
                            @else
                                <h4><span class="badge badge-danger">Dossier {{$dossier->statut}}</span></h4>
                            @endif
                        </p>
                    </div>
                    <div class="col-md-4">
                        <h4 class="text-info">Infos Béneficiaire</h4>
                        <p><b>Nom complet :</b> {{$dossier->beneficiaire['nom']}}</p>
                        <p><b>Lient de parenté :</b> {{$dossier->beneficiaire['lien_parente']}}</p>
                        <p><b>Date de naissance :</b> {{$dossier->beneficiaire['date_naissance']}}</p>
                        <p><h4><span class="badge badge-success">{{$dossier->beneficiaire['statut']}}</span></h4></p>
                    </div>
                    <div class="col-md-4">
                        <h4 class="text-info">Infos Adhérent</h4>
                        <p><b>Nom complet :</b> {{$dossier->user['name']}}</p>
                        <p><b>Email :</b> {{$dossier->user['email']}}</p>
                        @if ($dossier->user->role['name'])
                            <p><b>Role :</b> {{$dossier->user->role['name']}}</p>
                        @endif
                    </div>
                </div>
                
                <h4 class="text-info">Document Justificatif</h4>
                @if (json_decode($dossier->documents) == null)
                <div class="alert alert-danger" role="alert">
                    Aucun Document Trouvé !!
                </div>
                @else
                    <div class="row">
                        @foreach (json_decode($dossier->documents) as $ds)
                            <div class="col-md-3">
                                <img src="{{asset('storage/'.$ds)}}" alt="image" class="img-thumbnail">
                            </div>
                        @endforeach
                    </div>
                @endif
                
                <div class="row mt-3">
                    <div class="col-md-4">
                        <h5>Total des Frais : <b>{{$dossier->total}} dh</b></h5>
                    </div>
                    @if ($dossier->statut == 'Remboursé')
                        <div class="col-md-4">
                            <h5>Date Remboursement: <b>{{$dossier->date_remboursement}}</b></h5>
                        </div>
                        <div class="col-md-4">
                            <h5>Frais Remboursé : <b class="text-muted">{{$dossier->frais_rembourse}} dh</b></h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>