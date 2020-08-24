@extends('layouts.default')
@section('mainTitle','Create User')
@section('mainContent')

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">                
              </div>
              <div class="card-body">
              <form action="/userdata" method="post" enctype="multipart/form-data">
              @csrf
                <div class="container">
                <div class="row">
                <div class="col-3"><label>Email</label></div>
                <div class="col-4"><input type="text" value="{{ old('email') ?? '' }}" class="form-control" id="email" name="email" placeholder="Enter Email"></div>
                <div class="text-danger">@error('email')<strong>{{ $message }}</strong>@enderror</div>
                </div>
                <div class="row">&nbsp;</div>
                <div class="row">
                <div class="col-3"><label>First Name</label></div>
                <div class="col-4"><input type="text" class="form-control" value="{{ old('firstname') ?? '' }}" id="firstname" name="firstname" placeholder="Enter First Name"></div>
                <div class="text-danger">@error('firstname')<strong>{{ $message }}</strong>@enderror</div>
                </div>

                <div class="row">&nbsp;</div>
                <div class="row">
                <div class="col-3"><label>Last Name</label></div>
                <div class="col-4"><input type="text" class="form-control" id="lastname" value="{{ old('lastname') ?? '' }}" name="lastname" placeholder="Enter Last Name"></div>
                <div class="text-danger">@error('lastname')<strong>{{ $message }}</strong>@enderror</div>
                </div>

                <div class="row">&nbsp;</div>
                <div class="row">
                <div class="col-3"><label>Admin User</label></div>
                <div class="col-4">
                <select class="form-control" id="is_admin" name="is_admin">
                <option value="">Select Admin User Type</option>
                <option value="1" {{ (old('is_admin') && old('is_admin') == 1  )  ? 'selected' : '' }}>Yes</option>
                <option value="2" {{ ( old('is_admin') &&  old('is_admin') == 2 )  ? 'selected' : '' }}>No</option>                
                </select>
                </div>                
                <div class="text-danger">@error('is_admin')<strong>{{ $message }}</strong>@enderror</div>
                </div>
                
                <div class="row">&nbsp;</div>
                <div class="row">
                <div class="col-3"><label>Username</label></div>
                <div class="col-4"><input type="text" value="{{ old('username') ?? '' }}" class="form-control" name="username" id="username" placeholder="Enter Username"></div>
                <div class="text-danger">@error('username')<strong>{{ $message }}</strong>@enderror</div>
                </div>
                <div class="row">&nbsp;</div>
                <div class="row">
                <div class="col-3"><label>Password</label></div>
                <div class="col-4"><input type="password" value="{{ old('password') ?? '' }}" class="form-control" name="password" id="password" placeholder="Enter Password"></div>
                <div class="text-danger">@error('password')<strong>{{ $message }}</strong>@enderror</div>
                </div>
                
                <div class="row">&nbsp;</div>
                <div class="row">
                <div class="col-3"><label>Gender</label></div>
                <div class="col-4">
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="1" {{ (old('gender') && old('gender')==1 )? 'checked':'' }} >
                        <label class="form-check-label"><strong>Male</strong></label> 
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input class="form-check-input" type="radio" name="gender" id="female" value="2" {{ (old('gender') && old('gender')==2 )? 'checked':'' }} >
                        <label class="form-check-label"><strong>Female</strong></label>
                    </div>
                </div>
                </div>
                <div class="text-danger">@error('gender')<strong>{{ $message }}</strong>@enderror</div>
                </div>

                <div class="row">&nbsp;</div>
                <div class="row">
                <div class="col-3"><label>Technology Proficient</label></div>
                <div class="col-4">
                <div class="form-check">
                @foreach($techLangsArr as $techData)
                    <input type="checkbox" value="{{ $techData->id }}" class="form-check-input" id="tech_1" name="techids[]"
                    {{ (old('techids') && in_array($techData->id, old('techids')) )? 'checked':'' }} >
                    <label class="form-check-label">{{ $techData->name }}</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 @endforeach   
                  </div>
                </div>
                <div class="text-danger">@error('techids')<strong>{{ $message }}</strong>@enderror</div>
                 </div>

                 <div class="row">&nbsp;</div>
                <div class="row">
                <div class="col-3"><label>City</label></div>
                <div class="col-4">
                <select class="form-control" id="city" name="city">
                <option value="">Select City</option>
                @foreach($cityArr as $cityData)
                <option value="{{ $cityData->id }}" 
                {{ (old('city') && old('city') == $cityData->id )?  'selected':'' }}>
                {{ $cityData->name }}</option>
                @endforeach
                </select>
                </div>
                <div class="text-danger">@error('city')<strong>{{ $message }}</strong>@enderror</div>
                </div>

                <div class="row">&nbsp;</div>
                <div class="row">
                <div class="col-3"><label>Address</label></div>
                <div class="col-4">
                <textarea class="form-control" name="address" rows="3" placeholder="Enter Address">{{
                  old('address') ?? ''
                }}</textarea>
                </div>
                <div class="text-danger">@error('address')<strong>{{ $message }}</strong>@enderror</div>
                </div>

                <div class="row">&nbsp;</div>
                <div class="row">
                <div class="col-3"><label for="exampleInputEmail1">Mobile Number</label></div>
                <div class="col-4"><input type="number" maxlength="10" class="form-control" 
                id="mob_num" name="mob_num" value="{{ old('mob_num') ?? '' }}" placeholder="Enter Mobile Number"></div>
                <div class="text-danger">@error('mob_num')<strong>{{ $message }}</strong>@enderror</div>
                </div>

                <div class="row">&nbsp;</div>
                <div class="row">
                <div class="col-3"><label>Uplad Avtar</label></div>
                <div class="col-4">                
                  <input type="file" id="avtar" name="avtar" value=" {{ old('avtar') ?? ''}} "/>                
                </div>
                <div>{{ old('avtar') ?? '' }}</div>
                <div class="text-danger">@error('avtar')<strong>{{ $message }}</strong>@enderror
                </div>
                </div>

                <div class="row">&nbsp;</div>
                <div class="row">
                <div class="col-3"></div>
                <div class="col-4">
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>                  
                </div>
                </div>
                </div>

              </form>
              <!-- /.card-body -->
              
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    @endsection