@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <h2 class="text-center">Nuevo Cupón</h2>

                <form action="{{ route('cupones.store') }}" method="POST">
                    {{ csrf_field() }}
                    @method('POST')

                    <div class="form-group">
                        <label for="string">String</label>
                        <input type="text" class="form-control" id="string" name="string"
                               value="{{ old('string') ?: $cupon->string }}">
                    </div>

                    <div class="form-group">
                        <label for="points">Puntos</label>
                        <input type="number" class="form-control" id="points" name="points"
                               value="{{ old('points') }}">
                    </div>

                    <input type="submit" class="btn btn-primary" value="Guardar Cupón">
                    <a href="{{route('cupones.index')}}" class="btn btn-info">Volver al Listado</a>

                </form>
            </div>
        </div>
    </div>

@endsection