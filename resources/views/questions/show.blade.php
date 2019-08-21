@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Question: {{ $question->content }}
                </div>

                <div class="panel-body">
                    <table class="table table-hover">
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
                    <a href="{{ route('questions.index') }}" class="btn btn-default">Back</a>
                    <a href="{{ route('questions.edit', array('question' => $question)) }}"
                       class="btn btn-warning">Edit</a>
                    <form style="display:inline-block" method="POST" action="{{ route('questions.destroy', array('question' => $question)) }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="form-control btn btn-danger">Delete</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
