<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<body>
<div class="card">
    <div class="card-header">
                            <h3>Student
                                <a href="{{url('student/create')}}" class="btn btn-primary btn-sm float-end">Add Student</a>
                            </h3>
    </div>
                    <div class="card-header">
                        <form action="{{route('student.filter') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                   <select name="status" class="form-select">
                                        <option value="all"{{ $filterType === 'all' ? 'selected' : '' }}>All</option>
                                        <option value="upcoming" {{ $filterType === 'upcoming' ? 'selected' : '' }}>Upcoming Birthday</option>
                                        <option value="upcoming_within_7_days" {{ $filterType === 'upcoming_within_7_days' ? 'selected' : '' }}>Upcoming Birthday Within 7 days</option>
                                        <option value="finished_last_7_days" {{ $filterType === 'finished_last_7_days' ? 'selected' : '' }}>Finished birthday of the last 7 days</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                            </div>

                        </form>
                    </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>DOB</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                
                                    <tr>
                                        <td>{{$student->id}}</td>
                                        <td>{{$student->name}}</td>
                                        <td>{{$student->email}}</td>
                                        <td>{{$student->address}}</td>
                                        <td>{{$student->dob}}</td>
                                        
                                        <td><a 
                                            href="student/{{$student->id}}/delete" 
                                            class="btn btn-danger"
                                            >Delete</a>
                                         </td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        <div>
                    </div>
</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
      
      $(document).ready(function () {
   
   $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });
 
   /*------------------------------------------
   --------------------------------------------
   When click user on Show Button
   --------------------------------------------
   --------------------------------------------*/
   $('body').on('click', '#delete-student', function () {

     var userURL = $(this).data('url');
     var trObj = $(this);

     if(confirm("Are you sure you want to remove this user?") == true){
           $.ajax({
               url: userURL,
               type: 'DELETE',
               dataType: 'json',
               success: function(data) {
                   alert(data.success);
                   trObj.parents("tr").remove();
               }
           });
     }

  });
   
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> 
</html>
                   
                   