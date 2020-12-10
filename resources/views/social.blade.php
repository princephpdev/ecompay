<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>Social Login App</title>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
      <style>
         .mt40{
         margin-top: 40px;
         }
      </style>
   </head>
   <body>
      <div class="container">
         <div class="row">
            <div class="col-lg-12 mt40">
               <div class="card-header" style="background: #0275D8;">
                  <h2>Login using FB/google/github</h2>
               </div>
            </div>
         </div>

        
            <div class="mx-auto">
                <a href="{{ url('social/redirect')}}" class="btn btn-primary">
                    Login with Google
                </a>
            </div>
        
        
      </div>
   </body>
</html>