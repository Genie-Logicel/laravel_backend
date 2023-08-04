<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste autre compétence</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/etude.css') }}" >
</head>
<body>
    
<div class="container mt-2">
        <div class="row">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left mb-2">
                        <h2>Modifier formation</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary btn-view" href="{{route('liste_formation') }}"> 
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
            <form method="post" action="{{ route('formation.submit',[ 'id' =>$for->id ])}}">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Titre</strong>
                        <input type="titre" name="titre" value="{{$for->titre}}" class="form-control"  >
                        @if ($errors->has('titre'))
                        <div class="alert alert-danger mt-1 mb-1">   {{$errors->first('titre')}}</div>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Institution</strong>
                        <input type="institution" name="institution" class="form-control"  value="{{$for->institution}}">
                        @if ($errors->has('institution'))
                        <div class="alert alert-danger mt-1 mb-1">    {{$errors->first('institution')}}</div>
                        @endif
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Date</strong>
                        <input type="annee" name="annee" class="form-control"  value="{{$for->annee}}">
                        @if ($errors->has('annee'))
                        <div class="alert alert-danger mt-1 mb-1">    {{$errors->first('annee')}}</div>
                        @endif
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <button type="submit" class="btn btn-success ml-3"><i class="fa fa-spinner"></i> Modifier</button>
                </div>
            </form>
        </div>
    </div>

    
</body>
</html>