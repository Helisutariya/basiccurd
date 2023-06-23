@extends('welcome')
@section('content')
    <div class="container">
        <form action="{{route('Basecrud.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control">

                <label class="form-label">Gender</label><br>
                <input type="radio" name="status" value="Male"/>Male
                <input type="radio" name="status" value="Female"/>Female<br>


                <label class="form-label">Hobby</label><br>
                <input type="checkbox" name="hobby[]" id="dance" value="dance"/>Dance
                <input type="checkbox" name="hobby[]" id="cricket" value="cricket"/>Cricket
                
                <label class="form-label">image</label><br>
                <input type="file" name="image" id="image" />
                
            </div>
            
            <input type="submit" name="submit" id="submit">
        </form>
    </div>
@endsection