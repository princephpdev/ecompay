<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>Instamojo Payment Gateway Integration In Laravel 8 - phpcodingstuff.com</title>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
      <style>
         .mt40{
         margin-top: 40px;
         }
      </style>
   </head>
   <body>
      <div class="container">
         @foreach($data as $value)
           <li> {{$value}} </li>
         @endforeach

         <h1>your transaction is Successfull</h1>
      </div>
        
   </body>
</html>