@extends('layouts.app')
@extends('layouts.nav')
@section('content')

    <div class="container col-6 mt-2">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-header">Add a name_university
                <a href="{{ route('admin.university-Admin.index') }}" class="btn btn-secondary btn-sm float-end"> Go Back</a>
            </div>
           

            <div class="card-body">
                <form method="post" action="{{ route('admin.university-Admin.store') }}" enctype="multipart/form-data">
                    @csrf
                    
                    
                    <div class="row mb-3">
                        <label class="col-sm-3 col-label-form">name_university</label>
                        <div class="col-sm-9">
                            <input type="text" name="name_university" rows="6" class="form-control">
                        </div>
                    </div>
                    
                    
                    

                    
                    <div class="row mb-4">
                        <label class="col-sm-3 col-label-form">Select a name_of_building</label>
                        <div class="col-sm-9">
                            <select name="name_of_building" class="form-control">

                                <option value="none" selected="" disabled="">Select a name_of_building</option>
                                @foreach ($rooms as $room)
                                    <option value="{{ $room->id }}">{{ $room->	room_id }}</option>
                                @endforeach


                            </select>
                         
                        </div>
                    </div>

                            
                            

                            <div class="row mb-3">
                                <label class="col-sm-3 col-label-form">address</label>
                                <div class="col-sm-9">
                                    <input type="text" name="address" rows="6" class="form-control">
                                </div>
                            </div>


                            <div class="row mb-4">
                                <label class="col-sm-3 col-label-form">Image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="logo_image" />
                                </div>
                            </div>
                            <div class="text-center">
                                <input type="submit" class="btn btn-primary float-end" value="Add" />
                            </div>
                </form>
            </div>
        </div>
    </div>
@endsection
