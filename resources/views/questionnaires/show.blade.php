@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Questionnaire: {{ $questionnaire->title }}
                </div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>Title</td>
                                <td>{{ $questionnaire->title }}</td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td>{{ $questionnaire->description }}</td>
                            </tr>
                            
                            <tr>
                                <td>Question One</td>
                                <td>{{ $questionnaire->question->content }}</td>
                            </tr>
                            <tr>
                                <td>Question Two</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Question Three</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Question Four</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Question Five</td>
                                <td></td>
                            </tr>
                            

                        </tbody>
                    </table>
                    <a href="{{ route('questionnaires.index') }}" class="btn btn-default">Back</a>
                    <a href="#"
                       class="btn btn-warning">Edit</a>
                    <form style="display:inline-block" method="POST" action="#">
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
