@extends('company.layout');
@section('title')
    index
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 9 CRUD Example Tutorial</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('company.create') }}"> Create Company</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

     @php
      $i = 0;
     @endphp
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Address</th>
        <th scope="col">Action</th>
        
      </tr>
    </thead>

    <tbody>

        @foreach ( $companies as $company )
        <tr>
            <th scope="row">{{ ++$i }}</th>
            <td>{{ $company->name }}</td>
            <td>{{ $company->email }}</td>
            <td>{{ $company->address }}</td>
            <td>
                <form action="{{ route('company.destroy',$company->id) }}" method="Post">
                    <a class="btn btn-primary" href="{{ route('company.edit',$company->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>

            </td>
          </tr>
        @endforeach



    </tbody>
  </table>
  {!! $companies->links() !!}
</div>
@endsection