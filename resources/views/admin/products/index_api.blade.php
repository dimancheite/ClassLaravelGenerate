@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Products API</h1>
        &nbsp;<button id="btnLoadProducts" data-url="{!! URL('/api/v1/products') !!}" type="button" class="btn btn-default">
            Load products
        </button>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('admin.products.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <table class="table table-responsive" id="products-table">
                    <thead>
                    <th>Name</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th colspan="3">Action</th>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

