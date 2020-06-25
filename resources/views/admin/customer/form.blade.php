@csrf
    
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{isset($customer)? $customer->name: '' }}">
        @if ($errors->first('name'))
            <span class="text-danger">
                {{$errors->first('name')}}
            </span>
        @endif 
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="{{isset($customer)? $customer->email: '' }}" cols="30" rows="10" class="form-control">
        @if ($errors->first('email'))
            <span class="text-danger">
                {{$errors->first('email')}}
            </span>
        @endif 
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" value="{{isset($customer)? $customer->password: '' }}" cols="30" rows="10" class="form-control">
        @if ($errors->first('password'))
            <span class="text-danger">
                {{$errors->first('password')}}
            </span>
        @endif 
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-success">Save</button>
    </div>