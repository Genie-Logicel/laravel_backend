<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Modification étude</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/etude.css') }}" >
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Modification de l'étude de « {{ $etudes->domaine }} »</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary btn-view" href="{{ route('etude.index') }}" enctype="multipart/form-data">
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
        <form action="{{ route('etude.update',$etudes->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Votre domaine d'etude</strong>
                        <input type="text" name="domaine" value="{{ $etudes->domaine }}" class="form-control">
                        @error('domaine')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Niveau</strong>
                        <select type="text" name="niveau" class="form-control" placeholder="Entrer votre niveau">
                            <OPTgroup label="Premièr cycle"> 
                                <option value="6eme" {{ $etudes->niveau == '6eme' ? 'selected' : '' }}>6ème</option>
                                <option value="5eme" {{ $etudes->niveau == '5eme' ? 'selected' : '' }}>5ème</option>
                                <option value="4eme" {{ $etudes->niveau == '4eme' ? 'selected' : '' }}>4ème</option>
                                <option value="3eme" {{ $etudes->niveau == '3eme' ? 'selected' : '' }}>3ème</option>
                            </OPTgroup>

                            <OPTgroup label="Second cycle"> 
                                <option value="2nde" {{ $etudes->niveau == '2nde' ? 'selected' : '' }}>2nde</option>
                                <option value="1ere" {{ $etudes->niveau == '1ere' ? 'selected' : '' }}>1ère</option>
                                <option value="tle" {{ $etudes->niveau == 'tle' ? 'selected' : '' }}>Tle</option>
                            </OPTgroup>

                            <OPTgroup label="Licence"> 
                                <option value="l1" {{ $etudes->niveau == 'l1' ? 'selected' : '' }}>L1</option>
                                <option value="l2" {{ $etudes->niveau == 'l2' ? 'selected' : '' }}>L2</option>
                                <option value="l3" {{ $etudes->niveau == 'l3' ? 'selected' : '' }}>L3</option>
                            </OPTgroup>

                            <OPTgroup label="Master">
                                <option value="m1" {{ $etudes->niveau == 'm1' ? 'selected' : '' }}>M1</option>
                                <option value="m2" {{ $etudes->niveau == 'm2' ? 'selected' : '' }}>M2</option>
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
                        <input type="text" name="institution" class="form-control" value="{{ $etudes->institution }}">
                        @error('institution')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <button type="submit" class="btn btn-success ml-3"><i class="fa fa-check-square-o"></i> Valider</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>