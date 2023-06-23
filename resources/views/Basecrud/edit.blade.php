@extends('welcome')
@section('content')
    <div class="container">
        <form action="{{route('update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="form-label">Name</label>
                <input type="hidden" name="id" id="id" value="{{$data->id}}">
                <input type="text" name="name" id="name" class="form-control" value="{{$data->name}}">
                <label class="form-label">Gender</label><br>
                <input type="radio" name="status" value="male" {{($data->status == 'male'?'checked':'')}}/>Male
                <input type="radio" name="status" value="female" {{($data->status == 'female'?'checked':'')}}/>Female<br>

                <input type="checkbox" name="hobby[]" id="name" class="form-check-input" value="Dance">Dance
                <input type="checkbox" name="hobby[]" id="name" class="form-check-input" value="Cricket">Cricket
                
                <span><img src="{{asset('image/'. $data->image)}}" style="height:100px;width:100px;"/></span>
                <input type="file" name="image" class="form-control">

            
            <input type="submit" name="submit" id="submit">
        </div>
        </form>
    </div>
@endsection