@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    User: {{ $user->name }}
                </div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>ID</td>
                                <td>{{ $user->id }}</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('users.index') }}" class="btn btn-default">Back</a>
                    <a href="#"
                       class="btn btn-warning">Edit</a>
                    <form style="display:inline-block" method="POST" action="#">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="form-control btn btn-danger">Delete</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
