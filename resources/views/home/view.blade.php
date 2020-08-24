@extends('layouts.default')
@section('mainTitle','User List')
@section('mainContent')
<div class="container-fluid">
<div class="row">
    <div class="col-12">
    <!-- Default box -->
    <div class="card">
        <div class="card-body">
              <table id="userDataGrid" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Admin Users</th>
                  <th>UserName</th>
                  <th>Email</th>
                  <th>Details</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($userData["allUser"] as $user)
                <tr>
                  <td>{{ $user->firstname }}</td>
                  <td>{{ $user->lastname }}</td>
                  <td>{{ ($user->is_admin==1) ? "Yes":"No" }}</td>
                  <td>{{ $user->username }}</td>
                  <td>{{ $user->email }}</td>
                  @if($user->is_admin==2)
                  <td><a href="/userdata/{{ $user->id }}">Details</a></td>
                  @else
                  <td></td>
                  @endif
                </tr>
                @endforeach
                </tbody>                
              </table>
            </div>
        

    </div>        
    </div>
    <!-- /.card -->
    </div>
</div>
</div>
 @endsection   
 @section('scriptContent')
 <script>
  $(function () {
    $("#userDataGrid").DataTable();    
  });
</script>
@endSection