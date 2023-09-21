<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Team</title>
</head>
<body>

<h2>Create New Team</h2>
<a href="{{url('/myheroes')}}">View Teams</a> | <a href="{{url('/myheroes/createhero')}}">Create New Hero</a>
    <form method="post" action="{{url('myheroes/createteam')}}">
        @csrf
    <div>
        <label>Name</label>
        <input type="text" name="name" />
    </div>

    <div>
        <label>Side</label>
        <select name="side" id="side">
            <option value="">select</option>
            <option>light</option>
            <option>dark</option>
        </select>
    </div>
        <div>
            <label>Select 3 Heroes</label>
            @if(!empty($heroes))
                <ul>
                @foreach($heroes as $eachHero)
                        <li><label><input type="checkbox" id="{{$eachHero->id}}" name="hero[]" data-side="{{$eachHero->side}}" class="hero-list" value="{{$eachHero->id}}" disabled />{{$eachHero->id}} | {{$eachHero->name}} | {{$eachHero->side}}</label></li>
                @endforeach
                </ul>

            @endif
        </div>



    <div>
        <button type="submit" id="submit" disabled>SUBMIT</button>
    </div>
    </form>
<hr />


@if($errors->any())
    <ul>
    @foreach($errors->all() as $eachError)
            <li>{{$eachError}}</li>
    @endforeach
    </ul>
@endif



</body>
</html>

<script type="application/javascript">

    // HANDLE  THE CHECKBOXES
    let listArray = [];
    let checkboxes = document.querySelectorAll('.hero-list');

    document.getElementById('side').addEventListener('change',function (){

        listArray = [];
        document.getElementById('submit').disabled = true;

        for(let checkbox of checkboxes){

            checkbox.checked = false;

            console.log(checkbox.dataset.side + ' ' + this.value);
            if(checkbox.dataset.side === this.value){
                checkbox.disabled = false;
            }else{
                checkbox.disabled = true;
            }

        }

    });

    for(let checkbox of checkboxes){


        checkbox.addEventListener('click',function(){

            if(this.checked === true){
                // console.log(this.value);
                listArray.push(this.value);
            }else{
                var index = listArray.indexOf(this.value);
                listArray.splice(index,this.value);
            }

            if(parseInt(listArray.length) > 2 && parseInt(listArray.length) < 6){

                document.getElementById('submit').disabled = false;

            }else{
                document.getElementById('submit').disabled = true;
            }

        });
    }
</script>

