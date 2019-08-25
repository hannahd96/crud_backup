@extends('layouts.app')
@section('content')


    <div class="container">
        <h2><i class="fas fa-cogs" style="padding-right:8px;"></i>System Admin Control Panel</h2>
            <br>
                <div class="row">
                    <div class="col-md-6" id="admin_panel_item">
                        <h4>Manage Questionnaires<a href="{{ url('questionnaires') }}" id="admin_panel_btn" class="btn btn-sm animated-button victoria-four">Next</a> </h4> 
                         <br> 
                            <ul>    
                                <li>Create, Read, Update and Delete Questionnaires</li>
                                <li>Assign Questionnaires to users</li>
                            </ul>
                    </div>
                    
                    <div class="col-md-6" id="admin_panel_item">
                        <h4>Manage Users <a href="{{ url('users') }}" id="admin_panel_btn" class="btn btn-sm animated-button victoria-four">Next</a> </h4>
                            <br>    
                            <ul>    
                                <li>Read, Update and Delete Users</li>
                            </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6" id="admin_panel_item">
                        <h4>Manage Questions <a href="{{ url('questions') }}" id="admin_panel_btn" class="btn btn-sm animated-button victoria-four">Next</a> </h4>
                            <br>
                            <ul>
                                <li>Create, Read, Update and Delete Questions from the Database</li>
                            </ul>
                    </div>
                    <div class="col-md-6" id="admin_panel_item">
                        <h4>Manage Questionnaire Submissions <a href="#" id="admin_panel_btn" class="btn btn-sm animated-button victoria-four">Next</a> </h4>
                            <br>
                            <ul>
                                <li>Read and Delete Questionnaire Submissions from the Database</li>
                            </ul>
                    </div>
                </div>  
                  
                </div>
    </div>
 
@endsection