{{$name}}


{{$user['name']}}

{{$obj->name}}
<form method="post" action="/users">
    {{csrf_field()}}
    <input type="text" name="name">
    <input type="submit" name="xxx">
</form>
