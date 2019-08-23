
@extends('layouts.app')

@section('content')

<head>

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
  
  <script>
    // search bar function filters through DB
    function searchTable() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            /* loops through tables contents */
          td = tr[i].getElementsByTagName("td")[0];
          if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
            } else {
              tr[i].style.display = "none";
            }
          }       
        }
      }
      
      // hide #back-top first
      $("#back-top").hide();

      // fade in #back-top
        $(function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 300) {
                    $('#back-top').fadeIn();
                } else {
                    $('#back-top').fadeOut();
                }
            });

            // scroll body to 0px on click
            $('#back-top a').click(function () {
                $('body,html').animate({
                    scrollTop: 0
                }, 800);
                return false;
            });
        });

  </script>
</head>


    <div class="container">
    <a href="{{url('admin/routes')}}" class="back_button"><i class="fas fa-chevron-circle-left"></i></a>
    <div class="row justify-content-center">
        
            <div class="col-md-8">
               <h2> Questions </h2>
                  <ul>
                    <li>As System Admin, you can Create, Read, Update and Delete questions from the table below. </li>
                    <li>To add a question to your questionnaire, click the plus button beside the appropriate question.</li>
                  </ul>
                  
                    <div class="input-group">
                      <input type="text" class="form-control" id="myInput" onkeyup="searchTable()" placeholder="Search questions.." autocomplete="off"> 
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </span>
                    </div>
                      <a href="{{ route('questions.create') }}" class="btn btn-info" id="create_btn">Create New Question</a>
                    <!-- Search Results -->
                    <div class="results">

                    <div class="panel-body">
                          @if (count($questions) === 0)
                              <p>There are no questions!</p>
                          @else
                              <table class="table table-striped" id="myTable">
                                  
                                      <th>Question</th>
                                      <th>Action</th>
                                  </thead>
                                  
                                  <tbody>
                              @foreach ($questions as $question)
                                      <tr>
                                         
                                          <td>{{ $question->content }}</td>
                                          <td>
                                          <a href="{{ route('question.addToContent', ['id' => $question->id]) }}"><i class="far fa-plus-square" id="add_button"></i></a>
                                            <a href="{{ route('questions.show', array('question' => $question)) }}"
                                               id="crud_btn" class="btn btn-outline-secondary btn-sm">View</a>
                                            <a href="{{ route('questions.edit', array('question' => $question)) }}"
                                                id="crud_btn" class="btn btn-warning btn-sm">Edit</a>
                                            <form style="display:inline-block" method="POST" action="{{ route('questions.destroy', array('question' => $question)) }}">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" id="crud_btn" class="btn btn-danger btn-sm">Delete</a>
                                            </form>
                                          </td>
                                      </tr>
                              @endforeach
                                  </tbody>
                              </table>
                          @endif
                      </div>
                      </div>    
            </div>
        </div>
    </div>
    <div id="scroll_top_auto" style="float:right; text-align:right;">
        <p id="back-top">
            <a href="#top" class="up_button">
              <i class="fas fa-arrow-circle-up"></i>
            </a>
        </p>
    </div>
@endsection