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

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="css/heroes.css" rel="stylesheet">
  </head>
  <body>
    
<main>
  <div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="img/Student-library.svg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6">
        @auth
        <h1 class="display-5 fw-bold lh-1 mb-3">Welcome back, {{ auth()->user()->name }}</h1>
        <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut a est provident autem repudiandae consequuntur dolorum illum hic, aperiam praesentium sint ipsa soluta blanditiis aliquam incidunt dignissimos officia neque ullam asperiores perferendis distinctio, cum non.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <form action="/logout" method="post">
                @csrf
                <button href="/logout" class="btn btn-primary btn-lg px-4 me-md-2">Sign out</button>
            </form>
        </div>
        @else
        <h1 class="display-5 fw-bold lh-1 mb-3">Sistem Informasi Perpustakaan SMP Negeri 21 Tasikmalaya</h1>
        <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut a est provident autem repudiandae consequuntur dolorum illum hic, aperiam praesentium sint ipsa soluta blanditiis aliquam incidunt dignissimos officia neque ullam asperiores perferendis distinctio, cum non.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <a href="/login" class="btn btn-primary btn-lg px-4 me-md-2">Sign in</a>
        </div>
        @endauth
      </div>
    </div>
  </div>
</main>

  </body>
</html>
