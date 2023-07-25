<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Competence</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    
    <div class="container" >
        @if(Session::has('success'))
        <div class="alert alert-primary alert-dismissible" role="alert">
            {{Session::get('success')}}
            
        </div>
        @endif
        <div> 
            <a href="{{route('add_competence')}}">AJOUTER COMPETENCE</a>
        </div><br>
        <div class="row">

        <div class="d-flex flex-wrap" id="icons-container">
       
        
        @foreach($competences as $dep)
        
            <div class="card icon-card  text-center mb-4 mx-4">
                <div class="card-body">
                    
                    <i class="bx bxl-bitcoin mb-2"></i>
                    <p class="icon-name text-capitalize text-truncate mb-0">{{$dep->nom}}</p>
                    
                    <p class="icon-name text-capitalize text-truncate mb-0">{{$dep->description}}</p>
                    <a class="dropdown-item" href="{{ route('delete_competence',['id'=>$dep->id])}}" onclick="return confirm('Voulez-vous supprimer?')"><i style="color:#ff3e1d !important">Supprimer</i> </a>
                    <a class="dropdown-item" href="{{ route('edit_competence',['id'=>$dep->id])}}" onclick="return confirm('Voulez-vous modifier?')"><i style="color:#03c3ec !important">Modifier</i></a>
                    
                </div>
            </div>
            
        @endforeach
        <br>
                       
                        
                    </div>
        </div>
         
    </div>
</div>

</div>
    </div>
    
</body>
</html>