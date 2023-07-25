<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste role</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/etude.css') }}" >
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Liste  role enregistrer</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success btn-create" href="{{ route('add_role') }}">
                        <i class="fa fa-plus"></i>
                        <span class="text-create">Nouvelle role</span>
                    </a>
                </div>
            </div>
        </div>
        @if(Session::has('success'))
        <div class="alert alert-primary alert-dismissible" role="alert">
            {{Session::get('success')}}
            
        </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th style="width: 170px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $com)
                    <tr>
                        <td>{{ $com->id }}</td>
                        <td>{{ $com->nom }}</td>
                        <td>{{ $com->description }}</td>
                        <td>
                            <a  class="btn btn-warning btn-edit" href="{{ route('delete_role',['id'=>$com->id])}}" onclick="return confirm('Voulez-vous supprimer?')"> <i class="fa fa-trash-o"></i></a>
                            <a class="btn btn-danger btn-delete" href="{{ route('edit_role',['id'=>$com->id])}}" onclick="return confirm('Voulez-vous modifier?')"><i class="fa fa-edit"></i></a>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
       
    </div>
</body>
</html>