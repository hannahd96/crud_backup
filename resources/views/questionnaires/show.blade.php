@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>{{ $questionnaire->title }}</h2>
                </div>

                <div class="panel-body">
                    <table class="table">
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
                    <br>
                    <a href="{{ route('questionnaires.index') }}" class="btn btn-light">Back</a>
                    <form style="display:inline-block" method="POST" action="#">
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
