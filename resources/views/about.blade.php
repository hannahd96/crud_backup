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
            <h2>About</h2>
                <p> 
                    This is a Stack Application built using Laravel PHP Framework and connects to data stored in a MySQL database. The application 
                    allows the System Administrator to manipulate the data stored in the database by enabling CRUD functionality (Create, Read, Update, Delete).
                    The main objective of the application is to provide an admin with a control panel to create questionnaires for normal users to complete.
                </p>
        </div>
        <div class="col-md-3">
            <h2>Technology</h2>
                <p id="about_para_one">
                    <ul>
                        <li>Laravel - Open source PHP web Framework</li>
                        <li>Bootstrap - Opensource CSS Framework</li>
                        <li>phpMyAdmin - Open source Administration tool for MySQL</li>
                    </ul>
                </p>
                
            <h2>Contact</h2>
                <b>Phone: </b> <p>0851234567</p>
                <b>Email: </b> <p>help@stackapp.com</p>
        </div>
    </div>
</div>
</div>
@endsection
