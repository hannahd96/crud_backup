@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <h2>Add new question</h2>
                

                <div class="panel-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('questions.store') }}">
                    <!-- csrf token prevents against cross-site request forgery attacks-->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                       
                        <div class="form-group">
                            <label for="content">Question</label>
                            <input type="text" class="form-control" id="content" name="content" autocomplete="off" value="{{ old('content') }}" />
                        </div>
                        <a href="{{ route('questions.index') }}" class="btn btn-light" style="margin-right:20px">Cancel</a>
                        <button type="submit" class="btn btn-dark pull-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
