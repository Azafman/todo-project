<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="shortcut icon" href="../assets/img/line.png" type="image/x-icon">
    <title>{{$nomePagina ?? 'Todo - Inicio'}}</title>
</head>
<body>
    <div class="container">
        <div class="side-bar">
            <img src="../assets/img/logo.png" alt="">
        </div>
        <div class="content">
            <nav>
                {{$btn ?? null}}
            </nav>
            <main>
                {{-- $slot é a variável padrão, ou se--}}
                {{$slot}}
            </main>
        </div>
    </div>
</body>
</html>
