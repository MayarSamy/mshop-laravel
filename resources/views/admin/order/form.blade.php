@csrf
<div class="row">
    {{-- customers list --}}
    <div class="col-md-6">
        <div class="form-group">
            <label for="customer_id">customer Name</label>
            <select name="customer_id" id="customer_id" class="form-control">
                <option value>Not set</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}"
                        {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>
            @if ($errors->first('customer_id'))
                <span class="text-danger">
                    {{ $errors->first('customer_id') }}
                </span>
            @endif
        </div>
    </div>

    {{-- order date --}}
    <div class="col-md-6">
        <div class="form-group">
            <label for="date">Order Date</label>
            <input type="date" id="date" name="date" class="form-control" value="{{ old('date') }}">
            @if ($errors->first('date'))
                <span class="text-danger">
                    {{ $errors->first('date') }}
                </span>
            @endif

        </div>
    </div>

    {{-- payment method list--}}
    <div class="form-group">
            <label for="payment_id">Payment Method</label>
            <select name="payment_id" id="payment_id" class="form-control">
                <option value>Not set</option>
                @foreach($payments as $payment)
                    <option value="{{ $payment->id }}"
                        {{ old('payment_id') == $payment->id ? 'selected' : '' }}>
                        {{ $payment->name }}
                    </option>
                @endforeach
            </select>
            @if ($errors->first('payment_id'))
                <span class="text-danger">
                    {{ $errors->first('payment_id') }}
                </span>
            @endif
    </div>
</div>

{{-- order items table --}}
<div class="row mt-3">
        <h3>Order Items
            @if ($errors->first('products'))
                <span class="text-danger">
                    {{ $errors->first('products') }}
                </span>
            @endif

        </h3>
        {{-- add new row button--}}
        <div class="col text-right" >
            <button type="button" class="btn btn-dark" id="btn-add-new-row">Add item</button>
        </div>
    <table class="table mt-2">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody id="products-list">

            {{-- if there was data before saving with errors --}}
            @if (old('products'))
                @foreach(old('products') as $rowId => $rowProduct)
                    <tr id="product-{{$rowId}}">

                        {{-- product list --}}
                        <td>
                            <select name="products[{{$rowId}}][product_id]"
                                    class="form-control input-product-product_id"
                                    row-id="product-{{$rowId}}">
                                @foreach($products as $product)
                                    @if ($product->id == $rowProduct['product_id'])
                                        <option value="{{ $product->id }}" selected data-price="{{ $product->price }}" data-quantity="{{ $product->quantity}}">
                                            {{ $product->name }} | {{ $product->price }}
                                        </option>
                                    @else
                                        <option value="{{ $product->id }}" data-price="{{ $product->price }}" data-quantity="{{ $product->quantity}}">
                                            {{ $product->name }} | {{ $product->price }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>

                            @if ($errors->first('products.' . $rowId . '.product_id'))
                                <span class="text-danger">
                                    {{ $errors->first('products.' . $rowId . '.product_id') }}
                                </span>
                            @endif
                        </td>

                        {{-- product order quantity --}}
                        <td>
                            <input type="number"
                                    name="products[{{$rowId}}][quantity]"
                                    value="{{ $rowProduct['quantity'] ?? 1 }}"
                                    row-id="product-{{$rowId}}"
                                    class="form-control input-product-quantity">
                            @if ($errors->first('products.' . $rowId . '.quantity'))
                                <span class="text-danger">
                                    {{ $errors->first('products.' . $rowId . '.quantity') }}
                                </span>
                            @endif
                        </td>

                        {{-- product price --}}
                        <td>
                            <input type="number"
                                    name="products[{{$rowId}}][price]"
                                    class="form-control input-product-price"
                                    row-id="product-{{$rowId}}"
                                    value="{{ $rowProduct['price']?? 1 }}"
                                    readonly>
                            @if ($errors->first('products.' . $rowId . '.price'))
                                <span class="text-danger">
                                    {{ $errors->first('products.' . $rowId . '.price') }}
                                </span>
                            @endif
                        </td>

                        {{-- product order total --}}
                        <td>
                            <input type="number"
                                    name="products[{{$rowId}}][total]"
                                    class="form-control input-product-total"
                                    row-id="product-{{$rowId}}"
                                    value="{{ $rowProduct['total'] == 0 ? $rowProduct['price'] : $rowProduct['total'] }}"
                                    readonly>

                            @if ($errors->first('products.' . $rowId . '.total'))
                                <span class="text-danger">
                                    {{ $errors->first('products.' . $rowId . '.total') }}
                                </span>
                            @endif
                        </td>

                        {{-- remove button --}}
                        <td>
                            <button type="button" class="btn btn-danger row-delete" row-id="product-{{$rowId}}">Remove</button>
                        </td>
                    </tr>
                @endforeach

                {{-- if there wasn't data --}}
                @else
                <tr id="product-1">

                    {{-- product list --}}
                    <td>
                        <select name="products[1][product_id]"
                                class="form-control input-product-product_id"
                                row-id="product-1">
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                    {{ $product->name }} | {{ $product->price }}
                                </option>
                            @endforeach
                        </select>
                    </td>

                    {{-- product order quantity --}}
                    <td>
                        <input type="number"
                                name="products[1][quantity]"
                                value="1"
                                row-id="product-1"
                                class="form-control input-product-quantity">
                    </td>

                    {{-- product price --}}
                    <td>
                        <input type="number"
                                name="products[1][price]"
                                class="form-control input-product-price"
                                row-id="product-1"
                                value="{{ $products->first()->price }}"
                                readonly>
                    </td>

                    {{-- product order total --}}
                    <td>
                        <input type="number"
                                name="products[1][total]"
                                class="form-control input-product-total"
                                row-id="product-1"
                                value="{{ $products->first()->price }}"
                                readonly>
                    </td>

                    {{-- remove button --}}
                    <td>
                        <button type="button" class="btn btn-danger row-delete" row-id="product-1">Remove</button>
                    </td>
                </tr>
            @endif

        </tbody>

    </table>
</div>

{{-- save order button --}}
<div class="text-center">
    <button type="submit" class="btn btn-success" id="btn-save-order">Save</button>
</div>

@section('js')
    <script>

        //adding new row
        $(document).on('click', '#btn-add-new-row', function () {
            const rowId = Date.now();
            const productRow =       
                `<tr id="product-${rowId}">

                    // product list
                    <td>
                        <select name="products[${rowId}][product_id]"
                        row-id="product-${rowId}"
                        class="form-control  input-product-product_id">
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                    {{ $product->name }} | {{ $product->price }}
                                </option>
                            @endforeach
                        </select>
                    </td>

                    // product order quantity
                    <td>
                        <input type="number"
                        name="products[${rowId}][quantity]"
                        value="1"
                        row-id="product-${rowId}"
                        class="form-control input-product-quantity">
                    </td>

                    // product price
                    <td>
                        <input type="number"
                        name="products[${rowId}][price]"
                        row-id="product-${rowId}"
                        value="{{ $products->first()->price }}"
                        readonly
                        class="form-control input-product-price">
                    </td>

                    // product order total
                    <td>
                        <input type="number"
                        name="products[${rowId}][total]"
                        row-id="product-${rowId}"
                        readonly
                        value="{{ $products->first()->price }}"
                        class="form-control input-product-total">
                    </td>

                    // remove button
                    <td>
                        <button type="button" class="btn btn-danger row-delete" row-id="product-${rowId}">Remove</button>
                    </td>
                </tr>`;
            $('#products-list').append(productRow);
        });

        //removimg row
        $(document).on('click', '.row-delete', function () {
            const rowId = '#' + $(this).attr('row-id');
            $(rowId).remove();
        });

        //changing the total of the row on changing the quantity
        $(document).on('keyup', '.input-product-quantity', function () {
            const rowId = '#' + $(this).attr('row-id'),
                productQuantity = $(this).children("option:selected").data('quantity');
                calculateTotal(rowId);
        });

        //changing the product price to the selected product price 
        $(document).on('change', '.input-product-product_id', function () {
            const rowId = '#' + $(this).attr('row-id'),
                price = $(this).children("option:selected").data('price');
            $(`${rowId} .input-product-price`).val(price);
            calculateTotal(rowId);
        });


        // Functions

        //calculating the row total 
        function calculateTotal(rowId) {
            const quantity = $(`${rowId} .input-product-quantity`).val(),
                price = $(`${rowId} .input-product-price`).val(),
                total = price * quantity;

            $(`${rowId} .input-product-total`).val(total);
        }

        // function validateQuantity(rowId) {
        //     const quantity = $(`${rowId} .input-product-quantity`).val();
        //     if($(quantity > quantity) {
                
        //         }
        // }

        //calculateOrderTotal()
    </script>
@endsection
