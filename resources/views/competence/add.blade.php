<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Nouveau  compétence</title>
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
                        <h2>Ajout nouveau  compétence</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary btn-view" href="{{ route('liste_competence') }}"> 
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
          
            <form method="POST" action="{{route('add.competence.submit')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nom</strong>
                        <input type="nom" name="nom" class="form-control"   placeholder="Enter nom competence" >
                        @if ($errors->has('nom'))
                        <div class="alert alert-danger mt-1 mb-1">  {{$errors->first('nom')}}</div>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nom</strong>
                        <input type="description" name="description" class="form-control"   placeholder="Enter description competence" >
                        @if ($errors->has('description'))
                        <div class="alert alert-danger mt-1 mb-1">  {{$errors->first('description')}}</div>
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