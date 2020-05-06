<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Todo List</title>
    <link rel="stylesheet" href="/public/css/app.css"/>
  </head>
  <body>
    @include('inc.navbar')
    <div class="container">
      @include('inc.messages')
      @yield('content')
    </div>
    <footer id="footer">
      <p class="text-center">
        Copyright &copy; 2020 TodoList
      </p>
    </footer>
  </body>
</html>