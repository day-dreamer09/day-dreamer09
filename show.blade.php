@extends('dashboard.template')
@section('dashboard-content')
<h1 class="h3 mb-3"><strong>Turkish Cusine</strong></h1>

<div class="row">
    <div class="col-12  d-flex">
        <div class="card flex-fill">
            <div class="card-header">
                @include('dashboard.partials.alert')
                <h5 class="card-title mb-0">Menu</h5>
            </div>
            <table class="table table-hover my-0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Chief Name</th>
                        <th>Image</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                  @foreach($menu as  $menudata)
                  <tr>
                    <td>{{ $menudata->id  }}</td>
                  
                  <td>{{ $menudata->title  }}</td>
                  <td>{{ $menudata->Description  }}</td>
                  <td>{{ $menudata->Price  }}</td>
                  <td>{{ $menudata->Made_by  }}</td>
                    <td>
                        <img src="{{ asset($menudata->image) }}" height="100px" width="120px" alt="">
                    </td>
                    <td> <a href="{{ route('menu.destroy', $menudata->id) }}" class="btn btn-danger">Delete</a>
                        <a href="{{ route('menu.edit', $menudata->id) }}" class="btn btn-info">Edit</a>
                    </td>
                </tr>
                  @endforeach
            </tbody>    
            </table>
        </div>
    </div>
</div>
<form id="logout-form" method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form>
@endsection
