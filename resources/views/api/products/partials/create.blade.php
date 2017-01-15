<!-- Trigger the modal with a button -->
<button type="button" id="loadNewProduct" class="btn btn-default">
    New Product
</button>

<!-- Modal -->
<div id="loadNewProductPopup" class="modal  fade" role="dialog">
    <div class="modal-dialog cs-modal-fullscreen">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Media files</h4>
            </div>
            <div class="modal-body">
                <form role="form">
                    <!-- Name Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('name', 'Name:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'productName']) !!}
                    </div>

                    <!-- Unit Price Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('unit_price', 'Unit Price:') !!}
                        {!! Form::text('unit_price', null, ['class' => 'form-control', 'id' => 'productUnitPrice']) !!}
                    </div>

                    <!-- Quantity Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('quantity', 'Quantity:') !!}
                        {!! Form::text('quantity', null, ['class' => 'form-control', 'id' => 'productQuantity']) !!}
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnStoreProduct" data-url="{!! route('api.products.store') !!}" data-url-product-list="{!! route('api.products.index') !!}"> Save </button>
            </div>
        </div>

    </div>
</div>