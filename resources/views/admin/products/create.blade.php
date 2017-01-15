@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Product
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'admin.products.store', 'enctype' => 'multipart/form-data']) !!}

                        @include('admin.products.partials.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
