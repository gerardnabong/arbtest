
<!doctype html>
<html lang="en">
  <head>
     
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
      
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  
    


  </head>
  <body class="text-center">
    <form class="form-signin">

     
        <div class="container jumbotron text-center">

            <h1 class="h3 mb-3 font-weight-normal">Please Log In</h1>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input  id="username" placeholder="Email address" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword"  placeholder="Password" required>
            
            <button class="btn btn-primary btn-rg" href="/public/dashboard">Sign in</button>
            
        </div>


  
</form>

</body>
</html>
