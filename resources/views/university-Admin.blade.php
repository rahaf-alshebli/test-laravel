@extends('layouts.app')

@extends('layouts.nav')

@section('content')


    <div class="container">

        @if ($message = Session::get('success'))
            <div class="alert alert-success text-center">
                {{ $message }}
            </div>
        @endif


        <h1 class="text-center">All university</h1>
        <a class="btn btn-success" href="{{ route('admin.university-Admin.create') }}">Add a university</a>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-sm float-end"> Go Back</a>
        <br><br>

        <table class="table table-striped">
            <thead>
                <th>name_university	</th>
                <th>name_of_building</th>
                <th>address</th>
                <th>Image</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>



                {{-- {{$categories}}
{{$rooms}} --}}


                @foreach ($universities as $university)
                    <tr>
                        <td>{{ $university->id }}</td>
                        <td>{{ $university->name_university }}</td>
                        <td>{{ $university->address }} </td>
                        <td>{{ $university->name_of_building }} </td>


                        <td></td>

                        <td><img width="50px" height="50px" src="{{ asset('images/' . $university->logo_image) }}"></td>
                        <td><a href="{{ route('admin.roomsAdmin.edit', $university->id) }}"
                                class="btn btn-warning btn-sm">Edit</a></td>
                        <form class="float-end" method="post" action="{{ route('admin.roomsAdmin.destroy', $university->id) }}">
                            @csrf
                            @method('DELETE')
                            <td><input onclick="return confirm('Are you sure you want to delete this Room?')" type="submit"
                                    class="btn btn-danger btn-sm" value="Delete" /></td>
                        </form>



                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>







@endsection
