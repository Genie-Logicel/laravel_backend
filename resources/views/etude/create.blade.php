<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Nouvelle étude</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
</head>

<body>
    <div class="container-fluid row">
        <div class="col-1">
            @include('layout.sidebar')
        </div>
        <div class="col-11 p-5">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left mb-2">
                        <h2>Ajout nouvelle étude</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary btn-view" href="{{ route('etude.index') }}"> 
                            <i class="fa fa-list-alt"></i>
                            <span class="text-view">Aller à la liste</span>
                        </a>
                    </div>
                </div>
            </div>
            @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
            @endif
            <form action="{{ route('etude.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Domaine</strong>
                            <input type="text" name="domaine" class="form-control" placeholder="Entrer votre domaine">
                            @error('domaine')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                   
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Niveau</strong>
                            <select type="text" name="niveau" class="form-control">                            
                                <option disabled selected>Veuillez selectionner votre niveau</option>
                                <OPTgroup label="Premièr cycle"> 
                                    <option value="6eme">6ème</option>
                                    <option value="5eme">5ème</option>
                                    <option value="4eme">4ème</option>
                                    <option value="3eme">3ème</option>
                                </OPTgroup>
    
                                <OPTgroup label="Second cycle"> 
                                    <option value="2nde">2nde</option>
                                    <option value="1ere">1ère</option>
                                    <option value="tle">Tle</option>
                                </OPTgroup>
    
                                <OPTgroup label="Licence"> 
                                    <option value="l1">L1</option>
                                    <option value="l2">L2</option>
                                    <option value="l3">L3</option>
                                </OPTgroup>
    
                                <OPTgroup label="Master">
                                    <option value="m1">M1</option>
                                    <option value="m2">M2</option>
                                </OPTgroup>
                            </select>
                            @error('niveau')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
    
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Institution</strong>
                            <input type="text" name="institution" class="form-control" placeholder="Entrer votre institution">
                            @error('institution')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
    
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <button type="submit" class="btn btn-success ml-3"><i class="fa fa-spinner"></i> Enregitrer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>