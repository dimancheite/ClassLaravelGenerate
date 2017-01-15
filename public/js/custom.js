$(document).ready(function() {

	function showModal(modalSelector) {
		$(modalSelector).modal('show');
		$(modalSelector).on('shown', function() {

		});
	}

	function hideModal(modalSelector) {
		$(modalSelector).modal('hide');
	}

	/**
	 * Add preview image before uploading
	 */
	previewImage = function(input) {
		var imagePreview, reader;
		imagePreview = $(input).nextAll('.' + $(input).data('image-preview'));
		if (input.files && input.files[0]) {
			reader = new FileReader();
			reader.onload = function(e) {
				imagePreview.attr('src', e.target.result);
				imagePreview.removeClass('hide');
			};
			reader.readAsDataURL(input.files[0]);
		} else {
			imagePreview.addClass('hide');
		}
	};

	/**
	 * New image preview
	 */
	$('.image-preview-option').on('change', function(){
		previewImage(this)
	});


	/**
	 * Get Products by api
	 */
	$('#btnLoadProducts').click(function() {
		console.log($(this).data('url'));
		$.ajax({
			url: $(this).data('url'),
			type: 'GET',
			datatype: 'JSON',
			success: function(response) {
				console.log(response);
			}
		});
	});

	/**
	 * Load medias to modal
	 */
	$('.ajax-load-media').click(function() {
		var token, url, data;
		token = $('input[name=_token]').val();
		url = $(this).data('url');
		data = {};

		$.ajax({
			url: url,
			headers: {'X-CSRF-TOKEN': token},
			data: data,
			type: 'GET',
			datatype: 'JSON',
			success: function (response) {
				if (response.status == 200) {
					var mediaList = $('.media-list');
					mediaList.html('');

					var rows = '<div class="row">';
					$.each(response.medias, function(index, file) {
						rows += '<div class="col-sm-4">';
							rows += '<img src="' + file + '" class="media-img-list-item">';
							rows += '<br><input type="radio" name="mediaImageSelect" class="media-img-select" data-image="' + file + '"> Choose';
						rows += '</div>';
						if ((index + 1) % 3 == 0) {
							rows += '</div><div class="row">';
						}
					});
					rows += '</div>';
					mediaList.html(rows);
				} else {
					console.log('Loading error...');
				}
			}
		});

		showModal('#loadMedia');
	});

	$('.btn-media-select').click(function() {
		var selected = $('.media-img-select:checked');
		if (selected.val()) {
			console.log(selected.data('image'));
			$('.media-img-preview').attr('src', selected.data('image'));
			$('.media-img-preview').removeClass('hide');
			hideModal('#loadMedia');
		}
	});

	function storeProducts(url, data, urlProductList) {
		console.log(url);
		console.log(data);
		$.ajax({
			url: url,
			data: data,
			type: 'POST',
			datatype: 'JSON',
			success: function (response) {
				if (urlProductList != '') {
					loadProducts(urlProductList);
				}
			}
		});
	}

	function loadProducts(url) {
		var data, productTable;
		data = {};
		productTable = $('#productsTable');

		productTable.html('');
		$.ajax({
			url: url,
			data: data,
			type: 'GET',
			datatype: 'JSON',
			success: function (response) {
				if (response.success) {
					var tr = '';
					$.each(response.data, function(index, product) {
						tr += '<tr>';
						tr += '<td>' + (index + 1) + '</td>';
						tr += '<td>' + product.name + '</td>';
						tr += '<td>' + product.unit_price + '</td>';
						tr += '<td>' + product.quantity + '</td>';
						tr += '<td>' + product.image + '</td>';
						tr += '<td><td>';
						tr += '</tr>';
					});
					productTable.html(tr);
				} else {
					alert('Cannot load products');
				}
			}
		});
	}

	$('#loadProduct').click(function() {
		loadProducts($(this).data('url'));
	});

	$('#loadNewProduct').click(function() {
		showModal('#loadNewProductPopup');
	});

	$('#btnStoreProduct').click(function() {
		var data, name, unitPrice, quantity;
		name = $('#productName').val();
		unitPrice = parseFloat($('#productUnitPrice').val());
		quantity = parseInt($('#productQuantity').val());

		data = {
			name: name,
			unit_price: unitPrice,
			quantity: quantity
		};
		storeProducts($(this).data('url'), data, $(this).data('url-product-list'));
		hideModal('#loadNewProductPopup');
	});
});