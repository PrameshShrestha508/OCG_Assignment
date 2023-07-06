<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<body>
<div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Student
                            <a href="{{url('student')}}" class="btn btn-primary btn-sm float-end">Back</a>
                        </h3>
                    </div>
                    

                    <div class="card-body">
                        <form action="{{url('student/store')}}" method="POST">
                            @csrf
                           
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control"/>
                                    @error('name')<small class="text-danger"> {{$message}} </small>@enderror
                                    
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control"/>
                                    @error('email')<small class="text-danger"> {{$message}} </small>@enderror
                                    
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Address</label>
                                    <input type="text" name="address" class="form-control"/>  
                                    @error('address')<small class="text-danger"> {{$message}} </small>@enderror 
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Date</label>
                                    <input type="date" name="dob" class="form-control"/>  
                                    @error('dob')<small class="text-danger"> {{$message}} </small>@enderror 
                                </div>
    
                                <div class="col-md-12 mb-3">
                                    <button type="submit" class="btn btn-primary float-end" >Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</html>