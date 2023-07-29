<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste étude</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
</head>
<body>
    <div class="row container-fluid">
        <div class="col-1">
            @include('layout.sidebar')
        </div>
        <div  class="col-11 p-5">
            <div class="">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Liste des études enregistrer</h2>
                        </div>
                        <div class="pull-right mb-2">
                            <a class="btn btn-success btn-create" href="{{ route('etude.create') }}">
                                <i class="fa fa-plus"></i>
                                <span class="text-create">Nouvelle étude</span>
                            </a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p><i class="fa fa-check-circle"></i>{{ $message }}</p>
                </div>
                @endif

                @if ($message = Session::get('error'))
                <div class="alert alert-danger">
                    <p><i class="fa fa-remove-circle"></i>{{ $message }}</p>
                </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Domaine</th>
                            <th>Niveau</th>
                            <th>Institution</th>
                            <th style="width: 170px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($etudes as $etd)
                        <tr>
                            <td>{{ $etd->id }}</td>
                            <td>{{ $etd->domaine }}</td>
                            <td>
                                @switch ($etd->niveau )
                                @case('6eme')
                                Sixième
                                @break

                                @case('5eme')
                                Cinqième
                                @break

                                @case('4eme')
                                Quatrième
                                @break

                                @case('3eme')
                                Troisième
                                @break

                                @case('2nde')
                                Seconde
                                @break

                                @case('1ere')
                                Première
                                @break

                                @case('tle')
                                Terminale
                                @break

                                @case('l1')
                                Première année
                                @break

                                @case('l2')
                                Deuxieme année
                                @break

                                @case('l3')
                                Troisième année
                                @break

                                @case('m1')
                                Master one
                                @break

                                @default
                                Master two
                                @endswitch

                            </td>
                            <td>{{ $etd->institution }}</td>
                            <td>
                                <form action="{{ route('etude.destroy',$etd->id) }}" method="Post" class="table-action">
                                    <a class="btn btn-warning btn-edit" href="{{ route('etude.edit',$etd->id) }}"><i class="fa fa-edit"></i><span class="text-edit">Modifier</span></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-delete"><i class="fa fa-trash-o"></i><span class="text-delete">Supprimer</span></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $etudes->links() !!}
            </div>
        </div>
    </div>
</body>
</html>
