@extends('layouts.app')

@section('content')

<div class="row" id="top-row">
    <div class="col-md-12">
      <!---->
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <h2 class="chunky_header">About</h2>
                <p> This is a Stack Application built using Laravel PHP Framework and connects to data stored in a MySQL database. The application 
                    allows the System Administrator to manipulate the data stored in the database by enabling CRUD functionality (Create, Read, Update, Delete).
                    The main objective of the application is to provide an admin with a control panel to create questionnaires for normal users to complete.
                </p>
        </div>
        <div class="col-md-3">
            <h2 class="chunky_header">Technology</h2>
                <p id="about_para_one">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                </p>
                
            <h2 class="chunky_header">Contact</h2>
                <b>Phone: </b> <p>0851234567</p>
                <b>Email: </b> <p>help@stackapp.com</p>
        </div>
    </div>
</div>
</div>
@endsection
