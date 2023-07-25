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
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Liste des autres compétences enregistrer</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success btn-create" href="{{ route('autre-competence.create') }}">
                        <i class="fa fa-plus"></i>
                        <span class="text-create">Nouvelle autre compétence</span>
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
                    <th>Nom</th>
                    <th>Description</th>
                    <th style="width: 170px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($autres as $autr)
                    <tr>
                        <td>{{ $autr->id }}</td>
                        <td>{{ $autr->nom }}</td>
                        <td>{{ $autr->description }}</td>
                        <td>
                            <form action="{{ route('autre-competence.destroy',$autr->id) }}" method="Post" class="table-action">
                                <a class="btn btn-warning btn-edit" href="{{ route('autre-competence.edit',$autr->id) }}"><i class="fa fa-edit"></i><span class="text-edit">Modifier</span></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-delete"><i class="fa fa-trash-o"></i><span class="text-delete">Supprimer</span></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $autres->links() !!}
    </div>
</body>
</html>