@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>User: {{ $user->name }}</h2>
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
                    <form style="display:inline-block" method="POST" action="#">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" id="crud_btn" class="btn btn-sm" style="background-color:#f1ba54">Delete</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
