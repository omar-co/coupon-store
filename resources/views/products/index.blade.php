@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            @auth
                @if(Auth::user()->admin)
                    <div class="col-12 mb-2">
                        <a href="{{ route('products.create') }}" class="btn btn-success float-right">Nuevo</a>
                    </div>
                @endif
            @endauth
            @forelse($products as $product)
                <div class="col-sm-12 col-md-6 col-lg-4 pb-3">
                    <div class="card">
                        <div class="card-header">
                            Producto: {{ $product->name }}
                        </div>

                        <div class="card-footer">
                            Puntos: {{ $product->points }}
                            @auth
                                <div class="float-right">
                                    @auth
                                        @if(!Auth::user()->admin)
                                    <a href="" class="btn btn-primary btn-sm">Comprar</a>
                                        @endif
                                    @endauth
                                    @if(Auth::user()->admin)
                                        <a href="{{ route('products.edit',['products' => $product->id]) }}" class="btn btn-secondary btn-sm">Editar</a>
                                        <form action="{{ route('products.destroy', ['prodducts' => $product->id]) }}" method="POST" class="float-right">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-danger btn-sm" value="Eliminar" />
                                        </form>
                                    @endif
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            @empty
                <div class="w-100 p-3">
                    <div class="alert alert-dark text-center">
                        No existen productos.
                    </div>
                </div>
            @endforelse

            @if($products->count())
                <div class="container">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </div>

@endsection