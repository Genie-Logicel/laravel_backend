<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste compétence</title>
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
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Liste compétences enregistrer</h2>
                        </div>
                        <div class="pull-right mb-2">
                            <a class="btn btn-success btn-create" href="{{ route('add_competence') }}">
                                <i class="fa fa-plus"></i>
                                <span class="text-create">Nouvelle compétence</span>
                            </a>
                        </div>
                    </div>
                </div>
                @if(Session::has('success'))
                <div class="alert alert-primary alert-dismissible" competence="alert">
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
                        @foreach ($competences as $com)
                        <tr>
                            <td>{{ $com->id }}</td>
                            <td>{{ $com->nom }}</td>
                            <td>{{ $com->description }}</td>
                            <td>
                                <a class="btn btn-warning btn-edit" href="{{ route('delete_competence',['id'=>$com->id])}}" onclick="return confirm('Voulez-vous supprimer?')"> <i class="fa fa-trash-o"></i></a>
                                <a class="btn btn-danger btn-delete" href="{{ route('edit_competence',['id'=>$com->id])}}" onclick="return confirm('Voulez-vous modifier?')"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
