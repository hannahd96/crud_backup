@extends('layouts.app')
@section('content')


    <div class="container">
        <h2>System Admin Control Panel</h2>
            <br>
                <div class="row">
                    <div class="col-md-6" id="admin_panel_item">
                        <h4>Manage Questionnaires <a href="#" id="admin_panel_btn" class="btn btn-success btn-sm">Next</a></h4>
                            <ul>    
                                <li>Create, Read, Update and Delete Questionnaires</li>
                                <li>Assign Questionnaires to users</li>
                            </ul>
                    </div>
                    
                    <div class="col-md-6" id="admin_panel_item">
                        <h4>Manage Users <a href="{{ url('users') }}" id="admin_panel_btn" class="btn btn-info btn-sm">Next</a></h4>
                            <ul>    
                                <li>Read, Update and Delete Users</li>
                            </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6" id="admin_panel_item">
                        <h4>Manage Questions <a href="{{ url('questions') }}" id="admin_panel_btn" class="btn btn-warning btn-sm">Next</a></h4>
                            <ul>
                                <li>Create, Read, Update and Delete Questions from the Database</li>
                            </ul>
                    </div>
                    <div class="col-md-6" id="admin_panel_item">
                        <h4>Manage Questionnaire Submissions <a href="#" id="admin_panel_btn" class="btn btn-danger btn-sm">Next</a></h4>
                            <ul>
                                <li>Read and Delete Questionnaire Submissions from the Database</li>
                            </ul>
                    </div>
                </div>  
                  
                </div>
    </div>
 
@endsection