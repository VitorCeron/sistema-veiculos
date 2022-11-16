@extends('layouts.app')

@section('content')

<div class="container">
	<div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Cadastrar/Editar veículo</h3>
    </div>

    <div class="card card-primary card-outline">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data"
                @if(isset($item))
                    action="{{ route('vehicle.update', $item->id) }}">
                    {!! method_field('PUT') !!}
                @else
                    action="{{ route('vehicle.store') }}">
                @endif
                {!! csrf_field() !!}

                <div class="row">
                    <div class="form-group col-sm-12 col-md-6 mb-3">
                        <label for="name">Nome</label>
                        <input class="form-control" id="name" name="name" value="{{isset($item) ? $item->name : old('name')}}" type="text" autocomplete="off">
                        @error('name')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-sm-12 col-md-6 mb-3">
                        <label for="brand">Marca</label>
                        <input class="form-control" id="brand" name="brand" value="{{isset($item) ? $item->brand : old('brand')}}" type="text" autocomplete="off">
                        @error('brand')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-12 col-md-6 mb-3">
                        <label for="vehicle_year">Ano</label>
                        <input class="form-control" id="vehicle_year" name="vehicle_year" value="{{isset($item) ? $item->vehicle_year : old('vehicle_year')}}" type="number" autocomplete="off">
                        @error('vehicle_year')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-sm-12 col-md-6 mb-3">
                        <label for="kilometers">KM</label>
                        <input class="form-control" id="kilometers" name="kilometers" value="{{isset($item) ? $item->kilometers : old('kilometers')}}" type="number" autocomplete="off">
                        @error('kilometers')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-12 col-md-6 mb-3">
                        <label for="city">Cidade</label>
                        <input class="form-control" id="city" name="city" value="{{isset($item) ? $item->city : old('city')}}" type="text" autocomplete="off">
                        @error('city')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-sm-12 col-md-6 mb-3">
                        <label for="type">Tipo de veículo</label>
                        <select class="form-select" id="type" name="type">
                            <option value="">Selecione uma opção</option>
                            <option
                                @if((isset($item) && $item->type == "Novo") || (isset($item) && $item->type == old('type'))) selected @endif
                            >
                                Novo
                            </option>
                            <option
                                @if((isset($item) && $item->type == "Usado") || (isset($item) && $item->type == old('type'))) selected @endif
                            >
                                Usado
                            </option>
                          </select>
                        @error('type')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-12 col-md-4 mb-3">
                        <label for="price">Preço</label>
                        <input class="form-control" id="price" name="price" value="{{isset($item) ? $item->price : old('price')}}" type="number" autocomplete="off">
                        @error('price')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-sm-12 col-md-8 mb-3">
                        <label for="description">Descrição</label>
                        <input class="form-control" id="description" name="description" value="{{isset($item) ? $item->description : old('description')}}" type="text" autocomplete="off">
                        @error('description')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-12 mb-3">
                        <label for="image">Foto</label>
                        <input class="form-control" id="image" name="image" value="{{isset($item) ? $item->image : old('image')}}" type="file">
                        @error('image')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-12 col-md-4 mb-3">
                        <label for="contact_name">Nome do vendedor</label>
                        <input class="form-control" id="contact_name" name="contact_name" value="{{isset($item) ? $item->contact_name : old('contact_name')}}" type="text" autocomplete="off">
                        @error('contact_name')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-sm-12 col-md-4 mb-3">
                        <label for="contact_phone">Telefone do vendedor</label>
                        <input class="form-control" id="contact_phone" name="contact_phone" value="{{isset($item) ? $item->contact_phone : old('contact_phone')}}" type="text" autocomplete="off">
                        @error('contact_phone')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-sm-12 col-md-4 mb-3">
                        <label for="contact_mail">E-mail do vendedor</label>
                        <input class="form-control" id="contact_mail" name="contact_mail" value="{{isset($item) ? $item->contact_mail : old('contact_mail')}}" type="text" autocomplete="off">
                        @error('contact_mail')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button class="btn btn-success"><i class="fas fa-save icon-font-awesome"></i> Salvar</button>
            </form>
        </div>
    </div>
</div>
@endsection
