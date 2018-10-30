@extends('layouts.app')

@section('content')
    <div class="well container admin-container">
<h2>Roles List</h2>

<div class="row">
    <div class="col-md-12">
        <div class="pull-right">
            @if(Auth::user()->can('role-create'))
              <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">Create Role</a>
            @endif
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                  <th>Name</th>
                  <th>Description</th>
                  <th></th>
                </tr>
            </thead>
          <tbody>
            @foreach($roles as $role)
            <tr>
              <td>
                  {{$role->display_name}}
              </td>
              <td>{{$role->description}} </td>
              <td>
                  @if(Auth::user()->can('role-edit'))
                    <a href="{{ route('admin.roles.edit', $role->id)}}" class="btn-default btn-xs btn">Edit</a>
                  @endif
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
    </div>
        {!!  $roles->render(); !!}
    </div>
</div>
</div>

@endsection
