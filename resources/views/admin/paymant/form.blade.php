@csrf
    
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{isset($payment)? $payment->name: '' }}">
        @if ($errors->first('name'))
            <span class="text-danger">
                {{$errors->first('name')}}
            </span>
        @endif 
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{isset($payment)? $payment->description: '' }}</textarea>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-success">Save</button>
    </div>