@extends('layouts.main')

@section('title', 'Pagina Principal')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um Evento</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
</div>
<div id="events-container" class="col-md-12">
    @if($search)
    <h2>Buscando Por: "{{ $search }}"</p>
    </h2>
    @else
    <h2>Próximos Eventos</h2>
    @endif
    <p class="subtitle">Veja os eventos dos proximos dias</p>
    <div id="cards-container" class="row">
        @foreach($events as $event)
        <div class="card col-md-3">

            <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}">
            <div class="card-body">
                <p class="card-date">{{ date('d/m/Y', strtotime($event->date)) }}</p>
                <h5 class="card-title">{{ $event->title }}</h5>
                <p class="card-participants">{{ count($event->users) }} Participante(s)</p>
                <a href="/events/{{ $event->id }}" class="btn btn-primary">Saber Mais</a>

            </div>


        </div>
        @endforeach



        @if(count($events) == 0 && $search)
        <p>Não foi possivel localizar um evento com: "{{ $search }}"!</p>
        @elseif(count($events) == 0)
        <p>Não há eventos disponíveis</p>
        @endif
    </div>
    <a href="/" class="btn btn-secondary ">Voltar para a tela inicial</a>
</div>

@endsection