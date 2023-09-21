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

<h1>Teams List</h1>
<a href="{{url('myheroes/createteam')}}">Create New Team</a> | <a href="{{url('/myheroes/createhero')}}">Create Hero</a>
<table>
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>SIDE</th>
        <th>HEROES</th>
        <th>POWER</th>
    </tr>

    @foreach($teams as $team)
        <tr>
            <td>{{$team->id}}</td>
            <td>{{$team->name}}</td>
            <td>{{$team->side}}</td>
            <td>{{$team->allheroname}}</td>
            <td>{{$team->power}}</td>
            <td><button onclick="showDetails({{$team->id}})">View Details</button></td>
        </tr>
    @endforeach
</table>

<hr />



</body>
</html>

<script type="application/javascript">

    function showDetails(id){
        let url = '{{url('/team/details')}}';
        fetch(url+'/'+id)
            .then(response => response.text())
            .then((response) => {
                alert(response);
            })
            .catch(error => {
                // handle the error
                alert('ERROR ');
            }); // */

    }
</script>
