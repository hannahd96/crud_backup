<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

@extends('layouts.app')
@section('content')


    <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">System Admin Control Panel</div>
                <div class="panel-body">
                    <ul>
                        <li><a href="{{ url('questions') }}">Manage Questions</a></li>
                        <li><a href="#">Manage Questionnaires</a></li>
                    </ul>
                </div>
            </div>
    </div>


@endsection