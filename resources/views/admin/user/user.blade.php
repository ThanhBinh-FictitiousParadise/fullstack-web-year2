<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-compatible" content = "ie=edge">
    <title>document</title>
</head>
<body>
<table border="1" cellspacing ="0" cellpadding="5">
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Email</td>
        <td>Level</td>
    </tr>
    @foreach($users as $user)
        <tr>
            <td>{{$user->users_id}}</td>
            <td>{{$user->user_full}}</td>
            <td>{{$user->user_mail}}</td>
            <td>
                @if($user->user_level == 1)
                    Admin
                @else
                    Member
                @endif
            </td>
        </tr>
    @endforeach
</table>
</body>
</html>
