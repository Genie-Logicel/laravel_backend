<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Modification autre compétence</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
</head>

<body>
    <div class="row container-fluid">
        <div class="col-1">
            @include('layout.sidebar')
        </div>
        <div class="col-11 p-5">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Modification d'autre compétence « {{ $autres->nom }} »</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary btn-view" href="{{ route('autre-competence.index') }}" enctype="multipart/form-data">
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
            <form action="{{ route('autre-competence.update',$autres->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Votre compétence</strong>
                            <input type="text" name="nom" value="{{ $autres->nom }}" class="form-control">
                            @error('nom')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Description</strong>
                            <textarea name="description" class="form-control" rows="5">{{ $autres->description }}</textarea>
                            @error('description')
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
    </div>
</body>

</html>