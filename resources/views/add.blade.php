<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>jobs.at coding exercise</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <style type="text/css">
            .isActive-1{
                background: #d4edda;
            }
            .isActive-0{
                background: #f8d7da;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1 class="text-center">Add Job</h1>
            <div class="container-fluid">
                <div class="row">
                    <div clas="col-sm-7">
                        <a class="btn btn-primary" href="{{ url('/') }}">View</a>
                    </div>
                </div>
            </div>
            <form id="addJobForm">
                <div class="row justify-content-sm-center">
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label>Job Title</label>
                            <input class="form-control" placeholder="Job title" name="title">
                        </div>
                        <div class="form-group">
                            <label>Select Company</label>
                            <select class="form-control" name="company_id">
                                <option value=''>Select Company</option>
                                <option value='1'>Stroman LLC</option>
                                <option value='2'>Swaniawski-Towne</option>
                                <option value='3'>Schiller-Cummings</option>
                            </select>                        
                        </div>
                        <div class="form-group">
                            <label>Job Title</label>
                            <textarea class="form-control" name="description" placeholder="Enter Description"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <input class="form-control" name="location" placeholder="Enter Location">
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary" type="button" id="savebtn">Save</button>&nbsp;&nbsp;
                            <button class="btn btn-default" type="reset">Cancel</button>
                        </div>
                      </div>  
                </div>
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#savebtn').on('click',function(){
                    var myForm = document.getElementById('addJobForm');
                    var formData = new FormData(myForm);
                    $.ajax({
                        method: 'POST',
                        url: 'api/addJob',
                        processData: false,
                        contentType: false,
                        data:formData,
                        success:function(data){
                            if(data.status == 200){
                                window.location.href="/";
                            }
                        },
                        error: function(err){

                        }
                    })    
                })
            })
        </script>
    </body>
</html>
