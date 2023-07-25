<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    
    <div class="container" style="position: relative;margin-top: 10%;margin-right: -9%;">
        <div class="row">
           
            <div class="col-xxl">
                <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Ajouter role</h5>
                
                </div>
                @if(Session::has('success'))
                <div class="alert alert-primary alert-dismissible" role="alert">
                    {{Session::get('success')}}
                   
                 </div>
                @endif
            <div class="card-body">
            <form method="POST" action="{{route('add.role.submit')}}">
                @csrf
                <div class="form-group">
                    <label for="nom">Nom role</label>
                    <input type="nom" name="nom" class="form-control"   placeholder="Enter nom role" >
                    @if ($errors->has('nom'))
                    <small class="form-text text-muted">  {{$errors->first('nom')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">description compentence</label>
                    <input type="description" name="description" class="form-control"   placeholder="Enter description role" >
                    @if ($errors->has('description'))
                    <small class="form-text text-muted">  {{$errors->first('description')}}</small>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
                <a href="{{route('liste_role')}}">liste</button>
            </form>
            </div>
    </div>
</div>

</div>
    </div>
    
</body>
</html>