
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h2>Create New Hero</h2>
<a href="{{url('/myheroes')}}">View Teams</a> | <a href="{{url('/myheroes/createteam')}}">Create New Team</a>

    <form name="add-form" id="add-form" method="post" action="{{url('myheroes/createhero')}}">
        @csrf
        <div>
            <label>Name: </label>
            <input type="text" id="name" name="name" class="form-control" autocomplete="off">
        </div>

        <div>
            <label>Side: </label>
            <select name="side" id="side">
                <option value="">Select</option>
                <option value="light">LIGHT</option>
                <option value="dark">DARK</option>
            </select>
        </div>

        <div>
            <label>HP: </label>
            <input type="number" id="hit_points" name="hit_points" autocomplete="off" />
        </div>

        <div>
            <label>Attack: </label>
            <input type="number" id="attack" name="attack" autocomplete="off">
        </div>


        <div>
            <label>Special Ability: </label>
            <select name="ability" id="ability">
                <option value="">Select</option>
                <option value="sword">Sword</option>
                <option value="axe">Axe</option>
                <option value="lance">Lance</option>
            </select>
        </div>
        <hr />

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $eachError)
            <li>{{$eachError}}</li>
        @endforeach
    </ul>
@endif

</body>
</html>




