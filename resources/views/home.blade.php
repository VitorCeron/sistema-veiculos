@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex align-items-center mb-3">
        <h3>Lista de veículos</h3>
    </div>

    <div class="card-body mb-3">
        <form method="GET" action="{{ route('home') }}">
            <div class="row g-3">
                <div class="form-group col-2 mr-2">
                    <label for="name" class="mb-0">Nome</label>
                    <input
                        type="text"
                        class="form-control form-control-sm"
                        id="name"
                        name="filter[name]"
                        placeholder="Ex: Gol"
                        autocomplete="off"
                        value="{{ request()->filter['name'] ?? '' }}"
                        >
                </div>

                <div class="form-group col-2 mr-2">
                    <label for="brand" class="mb-0">Marca</label>
                    <input
                        type="text"
                        class="form-control form-control-sm"
                        id="brand"
                        name="filter[brand]"
                        placeholder="Ex: Volkswagem"
                        autocomplete="off"
                        value="{{ request()->filter['brand'] ?? '' }}"
                        >
                </div>

                <div class="form-group col-2 mr-2">
                    <label for="city" class="mb-0">Cidade</label>
                    <input
                        type="text"
                        class="form-control form-control-sm"
                        id="city"
                        name="filter[city]"
                        placeholder="Ex: São Paulo"
                        autocomplete="off"
                        value="{{ request()->filter['city'] ?? '' }}"
                        >
                </div>

                <div class="form-group col-4 d-flex align-items-end">
                    <a class="btn btn-secondary btn-sm" href="{{ route('home') }}" style="margin-right: 10px">
                        <i class="fas fa-trash icon-font-awesome"></i>
                    </a>

                    <button type="submit" class="btn btn-secondary btn-sm">
                        <i class="fas fa-search icon-font-awesome"></i>
                        Pesquisar
                    </button>
                </div>
            </div>
        </form>
    </div>

    @if (session('message'))
        <div class='alert alert-success w-100'>
            {{ session('message') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-9">
            @forelse ($items as $item)
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img  src="{{ asset('assets/images/'.$item->image)}}" class="img-fluid rounded-start">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title mb-2">{{ $item->name }}</h5>
                            <p class="card-text text-secondary mb-2">{{ $item->description }}</p>

                            <h5>R$ {{ $item->price }}</h5>

                            <div class="actions">
                                <a href="{{route('vehicle.edit', $item->id)}}" class="btn btn-primary">Editar</a>

                                <form title="Delete" method="post" action="{{route('vehicle.delete', $item->id)}}" class="d-inline ml-2">
                                    {!! method_field('DELETE') !!} {!! csrf_field() !!}
                                    <button class="btn btn-primary">
                                        Excluir
                                    </button>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                @empty
                    <div class="card text-center p-3 d-flex align-items-center">
                        <img src="{{ asset('assets/images/empty-state.jpg')}}" alt="empty-state" width="300"/>

                        <h4> Nenhum veículo encontrado </h4>
                    </div>
                @endforelse

            <div class="d-flex justify-content-center mt-3">
                {{ $items->withQueryString()->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection
