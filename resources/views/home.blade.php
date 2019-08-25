@extends('layouts.app')
@section('content')

<div class="container">
    @if(\Session::has('error'))
        <div class="alert alert-danger">
            {{\Session::get('error')}}
        </div>
    
    @endif
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
               <h2> Welcome, <b>{{ Auth::user()->name }}.</b></h2>
               
                <br><br>
                
                    <div class="centered-content">
                        <?php if(auth()->user()->isAdmin == 1){
                                ?>
                                <div class="panel-body">
                                Click below to view the System Control Panel for Admins.<br><br>
                                    
                                    <a href="{{ url('admin/routes') }}" id="admin_panel_btn" class="btn btn-sm animated-button victoria-four">Next</a> 
                                </div>
                                <?php 
                            } 
                                else echo '<div class="panel-heading">Normal User</div>';
                            ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

@endsection