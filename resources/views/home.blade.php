@extends('layouts.app')
@section('content')

<div class="container">
    @if(\Session::has('error'))
        <div class="alert alert-danger">
            {{\Session::get('error')}}
        </div>
    
    @endif
    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                Welcome, {{ Auth::user()->name }}. Click below to view the System Control Panel for Admins.
                    <div class="panel-body">
                        <?php if(auth()->user()->isAdmin == 1){
                                ?>
                                <div class="panel-body">
                                    <a href="{{url('admin/routes')}}" class="btn btn-primary">System Admin Control Panel</a>

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

@endsection