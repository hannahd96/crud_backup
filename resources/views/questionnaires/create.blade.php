@extends('layouts.app')

@section('content')
<div class="container">
<a href="{{url('admin/routes')}}" class="back_button"><i class="fas fa-chevron-circle-left"></i></a>
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <h2>Create new questionnaire</h2>
    

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
                    <form method="POST" action="{{ route('questionnaires.store') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group"> 
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" autocomplete="off" value="{{ old('title') }}" placeholder="Enter Questionnaire title">
                                </div>
                                <div class="form-group"> 
                                    <label for="description">Description</label>
                                    <textarea type="text" class="form-control" id="description" name="description" autocomplete="off" value="{{ old('description') }}" 
                                              rows=2 placeholder="Enter Questionnaire description">
                                    </textarea>
                                </div>
                                <div class="form-group"> 
                                    <label for="question_one">Question One</label>
                                    <select class = "form-control" name="question_one">
                                        @foreach ($questions as $question)
                                        <option value="{{ $question->id }}">{{ $question->content }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group"> 
                                    <label for="question_two">Question Two</label>
                                    <select class = "form-control" name="question_two">
                                        @foreach ($questions as $question)
                                        <option value="{{ $question->id }}">{{ $question->content }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group"> 
                                    <label for="question_three">Question Three</label>
                                    <select class = "form-control" name="question_three">
                                        @foreach ($questions as $question)
                                        <option value="{{ $question->id }}">{{ $question->content }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group"> 
                                    <label for="question_four">Question Four</label>
                                    <select class = "form-control" name="question_four">
                                        @foreach ($questions as $question)
                                        <option value="{{ $question->id }}">{{ $question->content }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group"> 
                                    <label for="question_five">Question Five</label>
                                    <select class = "form-control" name="question_five">
                                        @foreach ($questions as $question)
                                        <option value="{{ $question->id }}">{{ $question->content }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <a href="{{ route('questionnaires.index') }}" class="btn btn-warning" style="margin-right:20px">Cancel</a>
                                <button type="submit" class="btn btn-success pull-right">Submit</button>
                            </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection





