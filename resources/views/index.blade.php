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
            <h1 class="text-center">Recent Jobs at Coding Exercise</h1>
            <div class="container-fluid">
                <div class="row">
                    <div clas="col-sm-5">
                        <div class="form-group">
                            <input class="form-control" placeholder="Search Job" id="searchFilter">
                        </div>
                    </div>&nbsp;&nbsp;&nbsp;
                    <div clas="col-sm-7 text-right">
                        <a class="btn btn-primary" href="{{ url('add') }}">Add</a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Job Title</th>
                        <th>Company Name</th>
                        <th>Description</th>
                        <th>Location</th>
                        <th>Published Time</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                var jobData = [];
                $.ajax({
                    method:'GET',
                    url: 'api/jobs',
                    success:function(data){
                        jobData = data.data;
                        $.each(data.data,function(i,v){
                            $('tbody').append('<tr class="isActive-'+v.active+'"><td>'+v.title+'</td><td>'+v.name+'</td><td>'+v.description+'</td><td>'+v.location+'</td><td>'+new Date(v.published_at).toISOString().slice(0,10)+'</td></tr>');
                        })
                    },
                    error: function(err){

                    }
                })

                $('#searchFilter').on('change',function(){
                    var thisVal = $(this).val().toLowerCase().trim();
                    $('tbody tr').remove();
                    $.each(jobData,function(i,v){
                        if(v.title.toLowerCase().indexOf(thisVal) > -1){
                            $('tbody').append('<tr class="isActive-'+v.active+'"><td>'+v.title+'</td><td>'+v.name+'</td><td>'+v.description+'</td><td>'+v.location+'</td><td>'+new Date(v.published_at).toISOString().slice(0,10)+'</td></tr>');
                        }
                    })
                })
            })
        </script>
    </body>
</html>
