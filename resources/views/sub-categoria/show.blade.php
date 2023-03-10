@extends('layouts.app')

@section('template_title')
    {{ $subCategoria->name ?? 'Show Sub Categoria' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Sub Categoria</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('subcategoria.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Categoria Id:</strong>
                            {{ $subCategoria->categoria_id }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $subCategoria->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
