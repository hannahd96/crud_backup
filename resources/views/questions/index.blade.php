
@extends('layouts.app')

@section('content')
<!-- <head>
   
     <style>
      input[type=text], select {
      width: 60%;
      padding: 6px 14px;
      margin: 2px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type=submit] {
      width: 60%;
      background-color: #4CAF50;
      color: white;
      padding: 6px 14px;
      margin: 2px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type=submit]:hover {
      background-color: #45a049;
    }  
  </style>
   <script>
        // hide #back-top first
$("#back-top").hide();

// fade in #back-top
$(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
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

    function myFunction() {
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

    function sortTable() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[0];
      y = rows[i + 1].getElementsByTagName("TD")[0];
      //check if the two rows should switch place:
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        //if so, mark as a switch and break the loop:
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}

function sortTableOldest() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[4];
      y = rows[i + 1].getElementsByTagName("TD")[4];
      //check if the two rows should switch place:
      if (Number(x.innerHTML) > Number(y.innerHTML)) {
        //if so, mark as a switch and break the loop:
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}

</script>

</head>     -->

    <div class="container" id="top-row">
        <div class="row justify-content-center">
        <a href="{{url('admin/routes')}}" class="btn btn-link">Back</a>
            <div class="col-md-8">
               <h2> Questions </h2>
                   
                    <a href="{{ route('questions.create') }}" class="add_button" alt="Add Question"><i class="far fa-plus-square"></i></a>
                                       <!-- SEARCHBAR -->
                      <!-- <div class="search-container">
                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search questions.." 
                         title="Type in a name" autocomplete="off" name = "search">

                         <button onclick="sortTable()" class="btn btn-warning" id="sort_btn" style="float:right; margin-right:15px;">A-Z</button>
                         <button onclick="sortTableOldest()" class="btn btn-success" id="sort_btn" style="float:right; margin-right:15px;">Oldest to Newest</button>

                      </div> -->
                   
                    
                    <div class="panel-body">
                          @if (count($questions) === 0)
                              <p>There are no questions!</p>
                          @else
                              <table class="table table-striped">
                                      <th>ID</th>
                                      <th>Question</th>
                                      <th>Action</th>
                                  </thead>
                                  
                                  <tbody>
                              @foreach ($questions as $question)
                                      <tr>
                                          <td>{{ $question->id }}</td>
                                          <td>{{ $question->content }}</td>
                                          <td>
                                            <a href="{{ route('questions.show', array('question' => $question)) }}"
                                               class="btn btn-default">View</a>
                                            <a href="{{ route('questions.edit', array('question' => $question)) }}"
                                               class="btn btn-warning">Edit</a>
                                            <form style="display:inline-block" method="POST" action="{{ route('questions.destroy', array('question' => $question)) }}">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="form-control btn btn-danger">Delete</a>
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
<!-- </div>
<div id="scroll_top_auto" style="float:right; text-align:right;">
        <p id="back-top">
            <a href="#top"><span style="font-size:40px;">^</span></a>
        </p>
    </div> -->
@endsection