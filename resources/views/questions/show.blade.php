@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <h2>Question: {{ $question->content }}</h2> 
                </div>

                <div class="panel-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>ID</td>
                                <td>{{ $question->id }}</td>
                            </tr>
                            <tr>
                                <td>Question</td>
                                <td>{{ $question->content }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <a href="{{ route('questions.index') }}" id="crud_btn" class="btn btn-light">Back</a>
                    <a href="{{ route('questions.edit', array('question' => $question)) }}"
                    class="btn" style="background-color:#b33670; color:white;">Edit</a>
                    <form style="display:inline-block" method="POST" action="{{ route('questions.destroy', array('question' => $question)) }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" id="crud_btn" class="btn" style="background-color:#f1ba54">Delete</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
