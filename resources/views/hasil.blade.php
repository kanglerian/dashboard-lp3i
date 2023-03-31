<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  @auth
    <h1>{{ Auth::user()->name }}</h1>
    <a href="{{ route('logout') }}">Logout</a>
  @endauth
  <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum nobis natus repudiandae exercitationem neque? Error vero magni facere veritatis voluptatem molestiae ipsum in ex fugit eligendi, necessitatibus rerum nobis iure nihil corrupti sit suscipit et consectetur. Nihil laudantium, rem fugiat necessitatibus recusandae dignissimos, officia cum eaque atque, vero assumenda distinctio enim sit? Libero ullam natus deleniti expedita id accusamus quasi repellat voluptatibus aperiam sed harum incidunt iste, quos fuga culpa fugiat reiciendis alias maxime cum nam iure corporis! Illo similique dolore, velit quod ipsam praesentium rerum eum aspernatur ducimus deleniti atque, repudiandae recusandae autem ipsum minima. Esse recusandae illo atque?</p>
</body>
</html>