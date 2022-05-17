<div class="container rounded bg-white">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5 mb-3" width="150px" src="{{asset('storage/'.$usr->avatar)}}">
                <span class="font-weight-bold">{{ $usr->name }}</span>
                <span class="text-black-50">{{$usr->email}}</span>
                <span> </span>
            </div>
        </div>
        <div class="col-md-8">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Paramétre du Profile</h4>
                </div>
                <div class="row mt-2 pl-3">
                    <form>
                        <label class="labels col-md-12">Nom Complet
                            <input type="text" class="form-control" wire:model="name" required>
                            @error('name') <small class="text-danger">{{$message}}</small> @enderror
                        </label>
                        
                        <label class="labels col-md-12">Email
                            <input type="text" class="form-control" wire:model="email" required>
                            @error('email') <small class="text-danger">{{$message}}</small> @enderror
                        </label>

                        <label class="labels col-md-12">Telephone
                            <input type="tel" class="form-control" wire:model="tel" required>
                            @error('tel') <small class="text-danger">{{$message}}</small> @enderror
                        </label>

                        <label class="labels col-md-12">Date de naissance
                            <input type="date" class="form-control" wire:model="date_naissance" required>
                            @error('date_naissance') <small class="text-danger">{{$message}}</small> @enderror
                        </label>

                        <label class="labels col-md-12">Entreprise
                            <input type="text" class="form-control" disabled>
                        </label>

                        <label class="labels col-md-12">Password
                            <input type="password" class="form-control" wire:model="password" required>
                            <small class="text-info">Si vous ne voulez pas modifier votre password, merci de réecrire l'ancien</small><br>
                            @error('password') <small class="text-danger">{{$message}}</small> @enderror
                        </label>
                    </form>
                </div>
                <div class="mt-5"><button class="btn btn-primary" type="button" wire:click.prevent='update()'>Save Profile</button></div>
            </div>
        </div>
    </div>
</div>