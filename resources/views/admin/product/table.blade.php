@foreach ($products as $product)                
    <tr>
        <td>{{$product->id}}</td>
        <td>{{$product->name}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->quantity}}</td>
        <td>
            @if ($product->category)
                <a href="{{route('admin.products.show', $product->category)}}" class="link_item">{{$product->category->name}}</a>                                        
            @endif
        </td>
        <td>
            @if ($product->user)
                <a href="{{route('admin.products.show', $product->user)}}" class="link_item">{{$product->user->name}}</a>                                        
            @endif
        </td>
        <td>
            <a href="{{route('admin.products.show', $product)}}" class="btn btn-info">Show</a>
            <a href="{{route('admin.products.edit', $product)}}" class="btn btn-primary">Edit</a>
            <button type="button" class="btn btn-danger delete" data-url="{{route('admin.products.destroy', $product)}}" >Delete</button>                     
        </td>
    </tr>                            
@endforeach

<tr>
    <td colspan="4">
        {!!$products->links()!!}
    </td>
    {!!$products->links()!!}
</tr>

