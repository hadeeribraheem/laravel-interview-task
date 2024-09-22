<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>

    <style>
        table {
            width: 95%;
            border-collapse: collapse;
            margin: 50px auto;
        }

        th {
            background: #3498db;
            color: white;
            font-weight: bold;
        }

        td,
        th {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
            font-size: 18px;
        }


    </style>

</head>

<body>
<div style="width: 95%; margin: 0 auto;">
    <div style="width: 50%; float: left;">
        <h1>All User Details</h1>
    </div>
</div>

<table style="position: relative; top: 50px;">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Phone</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($allusers as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->phone }}</td>

        </tr>
    @endforeach
    </tbody>
</table>

</body>

</html>
