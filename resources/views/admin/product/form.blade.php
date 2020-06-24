@csrf
    <div class="form-group">
        <label for="category_id">Parent category</label>
        <select name="category_id" id="category_id" class="form-control">
            <option value>Not set</option>
        @foreach ($categories as $rowCategory)            
            @if (isset($product) && $product->category && $rowCategory->id == $product->category->id)
                <option value="{{$rowCategory->id}}" selected>{{$rowCategory->name}}</option>                                
            @else
                <option value="{{$rowCategory->id}}">{{$rowCategory->name}}</option>
            @endif
        @endforeach              
        </select>
        @if ($errors->first('category_id'))
            <span class="text-danger">
                {{$errors->first('category_id')}}
            </span> 
        @endif     
    </div>

    <div class="form-group">
        <label for="user_id">Adding user</label>
        <select name="user_id" id="user_id" class="form-control">
            <option value>Not set</option>
        @foreach ($users as $rowUser)            
            @if (isset($product) && $product->user && $rowUser->id == $product->user->id)
                <option value="{{$rowUser->id}}" selected>{{$rowUser->name}}</option>                                
            @else
                <option value="{{$rowUser->id}}">{{$rowUser->name}}</option>
            @endif
        @endforeach              
        </select>    
    </div>

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{isset($product)? $product->name: '' }}">
        @if ($errors->first('name'))
            <span class="text-danger">
                {{$errors->first('name')}}
            </span>
        @endif 
    </div>

    <div class="form-group">
        <label for="price">price</label>
        <input type="number" name="price" id="price" class="form-control" value="{{isset($product)? $product->price: '' }}">
        @if ($errors->first('price'))
            <span class="text-danger">
                {{$errors->first('price')}}
            </span>
        @endif 
    </div>

    <div class="form-group">
        <label for="quantity">quantity</label>
        <input type="number" name="quantity" id="quantity" class="form-control" value="{{isset($product)? $product->quantity: '' }}">
        @if ($errors->first('quantity'))
            <span class="text-danger">
                {{$errors->first('quantity')}}
            </span>
        @endif 
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{isset($product)? $product->description: '' }}</textarea>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-success">Save</button>
    </div>