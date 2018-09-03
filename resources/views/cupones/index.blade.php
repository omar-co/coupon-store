@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-8 offset-2">
            <h2 class="text-center">Cupones</h2>
        </div>

        <div class="col-12 mb-2">
            <a href="{{ route('cupones.create') }}" class="btn btn-success float-right">Nuevo</a>
        </div>

        <div class="col-9 offset-2">
            <table class="table table-striped table-hover table-sm table-bordered">
                <thead>
                    <th>ID</th>
                    <th>Cupon</th>
                    <th>Puntos</th>
                    <th>¿Usado?</th>
                </thead>
                <tbody>
                    @forelse($cupones as $cupon)
                        <tr>
                            <th>{{ $cupon->id }}</th>
                            <th> {{ $cupon->string }}</th>
                            <th> {{ $cupon->points }}</th>
                            <th> {{ $cupon->used }}</th>
                        </tr>
                    @empty
                        <div class="w-100 p-3">
                            <div class="alert alert-dark text-center">
                                No existen Cupones.
                            </div>
                        </div>
                    @endforelse

                </tbody>
            </table>
            @if($cupones->count())
                <div class="container">
                    {{ $cupones->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection