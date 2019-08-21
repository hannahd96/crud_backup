@extends('layouts.app')
@section('content')


    <div class="container">
            <h2>System Admin Control Panel</h2>
                <br>
                    <a href="#" class="btn btn-success">Manage Questionnaires</a>
                    <br><br>
                        <ul>    
                            <li>Create, Read, Update and Delete Questionnaires</li>
                            <li>Assign Questionnaires to users</li>
                        </ul>
                    <br>
                    <hr>
                    <br>
                    <a href="{{ url('questions') }}" class="btn btn-warning">Manage Questions</a>
                    <br><br>
                        <ul>
                            <li>Create, Read, Update and Delete Questions from the Database</li>
                        </ul>
            </div>
        </div>
    </div>


@endsection