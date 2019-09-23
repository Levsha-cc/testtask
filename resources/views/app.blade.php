<!doctype html>
<html>
<head>
    <title>YouTube Search</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Тестовое задание</a>
    <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarSupportedContent">
        <form class="form-inline" method="get" action="/search">
            <input class="form-control" type="search" name="q" placeholder="Поиск" aria-label="Поиск">
            <button class="btn btn-outline-success" type="submit">Найти</button>
        </form>
    </div>
</nav>

<br/>
<br/>

<div class="container">
    @yield('content')
</div>

<br />
<br />
<br />
<br />
<br />
<br />
</body>


</html>
