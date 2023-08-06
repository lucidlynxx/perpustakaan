<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Perpustakaan | {{ $title }}</title>
    
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    {{-- Bootstrap-icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    
  </head>
  <body class="text-center">
    
        <div class="row">
            <h1 class="h4 fw-normal"><i class="bi bi-book"></i> Sistem Informasi Perpustakaan</h1>
            <h1 class="h4 fw-normal">SMP Negeri 21 Tasikmalaya</h1>
            <main class="form-signin w-100 m-auto">
              
                <form action="/login" method="POST">
                  @csrf
                  <h1 class="h5 mb-3 fw-normal">Please sign in</h1>
                  
                  <div class="form-floating">
                    <input type="text" class="form-control @error('username')
                    is-invalid
                    @enderror" name="username" id="username" placeholder="Username" autofocus required value="{{ old('username') }}">
                    <label for="username">Username</label>
                    @error('username')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  
                  <div class="form-floating">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                  </div>
                  
                  <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                </form>
                
            </main>
            <p class="h6 mt-5 mb-3">
                Hand-crafted with <i class="bi bi-suit-heart-fill text-danger"></i> by
                <strong>{{ $author }}</strong>
            </p>
        </div>

        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

        @include('sweetalert::alert')
  </body>
</html>
