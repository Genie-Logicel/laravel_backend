<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste autre compétence</title>
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
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left mb-2">
                            <h2>Modifier role</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary btn-view" href="{{route('liste_role')}}">
                                <i class="fa fa-list-alt"></i>
                                <span class="text-view">Aller à la liste</span>
                            </a>
                        </div>
                    </div>
                </div>
                @if(Session::has('success'))
                <div class="alert alert-primary alert-dismissible" role="alert">
                    {{Session::get('success')}}

                </div>
                @endif
                <div class="card-body">
                    <form method="post" action="{{ route('role.submit',[ 'id' =>$role->id ])}}">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nom</strong>
                                    <input type="nom" name="nom" value="{{$role->nom}}" class="form-control">
                                    @if ($errors->has('nom'))
                                    <div class="alert alert-danger mt-1 mb-1"> {{$errors->first('nom')}}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Description</strong>
                                    <input type="description" name="description" class="form-control" value="{{$role->description}}">
                                    @if ($errors->has('description'))
                                    <div class="alert alert-danger mt-1 mb-1"> {{$errors->first('description')}}</div>
                                    @endif
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-success ml-3"><i class="fa fa-spinner"></i> Modifier</button>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
