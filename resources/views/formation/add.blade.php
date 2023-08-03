<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Nouveau  Formation</title>
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
                        <h2>Ajout nouvelle  formation</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary btn-view" href="{{ route('liste_formation') }}"> 
                            <i class="fa fa-list-alt"></i>
                            <span class="text-view">Aller à la liste</span>
                        </a>
                    </div>
                </div>
            </div>
            @if(Session::has('success'))
            <div class="alert alert-success mb-1 mt-1" role="alert">
                {{Session::get('success')}}
            
            </div>
            @endif
          
            <form method="POST" action="{{route('add.formation.submit')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>titre</strong>
                        <input type="text" name="titre" class="form-control"   placeholder="Enter titre formation" >
                        @if ($errors->has('titre'))
                        <div class="alert alert-danger mt-1 mb-1">  {{$errors->first('titre')}}</div>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Institution</strong>
                        <input type="text" name="institution" class="form-control"   placeholder="Enter institution" >
                        @if ($errors->has('institution'))
                        <div class="alert alert-danger mt-1 mb-1">  {{$errors->first('institution')}}</div>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>annee</strong>
                        <input type="text" name="annee" class="form-control"   placeholder="Enter  annee" >
                        @if ($errors->has('annee'))
                        <div class="alert alert-danger mt-1 mb-1">  {{$errors->first('annee')}}</div>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <button type="submit" class="btn btn-success ml-3"><i class="fa fa-spinner"></i> Enregitrer</button>
                </div>
              
            </form>
        </div>
    </div>

    
</body>
</html>