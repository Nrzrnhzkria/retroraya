<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>HUN Members</title>
    </head>
    <body>
        <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">HUN ID</th>
                <th scope="col">Name</th>
                <th scope="col">IC No</th>
                <th scope="col">Email</th>
                <th scope="col">Phone No</th>     
            </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$members->hun_id}}</td>
            <td>{{$members->name}}</td>
            <td>{{$members->ic_no}}</td>
            <td>{{$members->email}}</td>
            <td>{{$members->phone_no}}</td>
        </tr>
        </tbody>
        </table>
    </body>
</html>