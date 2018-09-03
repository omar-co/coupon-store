@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <h2 class="text-center">Mi Perfil</h2>
            </div>

            <div class="col-12 mb-2 float-left">
                <h3>Puntos Disponibles: {{ auth()->user()->points }}</h3>
                <hr>
                <div class="card">
                    <div class="card-header">Redimir Cupón</div>
                    <div class="card-body">
                        <form action="{{ route('cupones.redimir') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="cupon">Cupón:</label>
                                <input type="text" class="form-control" id="cupon" name="string"
                                       value="{{ old('string') }}">
                            </div>

                            <div class="form-group">
                                <input type="submit" class="form-control btn btn-primary" value="Redimir">
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header">Mis Cupones Redimidos</div>
                    <div class="card-body table-responsive">
                        <table class="table">
                            <thead>
                            <th>Cupón</th>
                            <th>Puntos</th>
                            </thead>
                            <tbody>
                            @forelse($cupones as $cupon)
                                <tr>
                                    <th>{{ $cupon->string }}</th>
                                    <th>{{ $cupon->points }}</th>
                                </tr>
                            @empty
                                <tr>
                                    <th colspan="2">
                                        <div class="alert alert-dark text-center">
                                            No existen Cupones.
                                        </div>
                                    </th>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header">Mis Productos</div>
                    <div class="card-body table-responsive">
                        <table class="table ">
                            <thead>
                            <th>Nombre</th>
                            <th>Puntos</th>
                            </thead>
                            <tbody>
                            @forelse($products as $product)
                                <tr>
                                    <th>{{ $product->name }}</th>
                                    <th>{{ $product->points }}</th>
                                </tr>
                            @empty
                                <tr>
                                    <th colspan="2">
                                        <div class="alert alert-dark text-center">
                                            No existen Productos.
                                        </div>
                                    </th>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection