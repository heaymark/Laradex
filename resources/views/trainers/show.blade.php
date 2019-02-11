@extends('layouts.app')

@section('title', 'Trainer Show')

@section('content')


<img style="height:200px; width:200px; background-color:#EFEFEF; margin:20px" class="card-img-top rounded-circle mx-auto d-block" src="/images/{{$trainer->avatar}}" alt="Card image cap">
<h5 class="card-title text-center">{{$trainer->name}}</h5>
<div class="text-center">  
    <p>Some quick example text to build on the card title and make up the bulk of the card's content Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis ratione impedit dignissimos, ullam similique enim praesentium, accusantium asperiores minima aspernatur quia veniam repellat at voluptatem voluptas consequatur quidem iusto eius!.</p>
    <a href="/trainers/{{$trainer->slug}}/edit" class="btn btn-primary">Editar</a>
</div>



@endsection