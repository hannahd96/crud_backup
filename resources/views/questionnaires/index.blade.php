
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
               <h2> Questionnaires </h2>
                  <ul>
                    <li>As System Admin, you can Create, Read, Update and Delete questionnaires from the table below. </li>
                  </ul>
                  
                    <div class="input-group">
                      <input type="text" class="form-control" id="myInput" onkeyup="searchTable()" placeholder="Search questionnaires.." autocomplete="off"> 
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </span>
                    </div>
                      <a href="{{ url('questionnaires.create') }}" class="btn btn-outline-light" id="create_btn">Create New Questionnaire</a>
                    <!-- Search Results -->
                    <div class="results">

                    <div class="panel-body">
                          @if (count($questionnaires) === 0)
                              <p>There are no questionnaires!</p>
                          @else
                              <table class="table table-striped" id="myTable">
                                  <thead>
                                      <th>Title</th>
                                      <th>Description</th>
                                      <th>Action</th>
                                  </thead>
                                  
                                  <tbody>
                              @foreach ($questionnaires as $questionnaire)
                                      <tr>
                                          <td>{{ $questionnaire->title }}</td>
                                          <td>{{ $questionnaire->description }}</td>
                                          <td>
                                            <a href="{{ route('questionnaires.show', array('questionnaire' => $questionnaire)) }}"
                                               id="crud_btn" style="color:white;"><i class="fas fa-eye"></i></a>
                                            
                                            <form style="display:inline-block" action="{{ route('questionnaires.destroy', array('questionnaire' => $questionnaire)) }}" method="POST">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" id="crud_btn"><i class="fas fa-trash"></i></a>
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