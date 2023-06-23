<?php
Namespace App\Http\Controllers;

use App\Models\Basecrud;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;



class BasecrudController extends Controller
{
    public function index(){
        $data = Basecrud::get();
        return view('index',compact('data'));
    }
    public function create(){
        return view('Basecrud.create');
    }   
    public function store(Request $request)
    {
        
        // dd($request->name);
        
        $data = new Basecrud();
        $image=$request->file('image');
        $imagename =time().'.'.$image->getClientOriginalExtension();
        $request->image->move(public_path('image'),$imagename);
        $data->image=$imagename;
        $data->name = $request->name;
        $data->status = $request->status;
        $data->hobby = implode(',', $request->hobby);
        $data->save();
        return redirect()->route('index',compact('data'));
    }
    public function destroy($id){
        // Basecrud::where('id',$id)->delete();
        $news = Basecrud::findOrFail($id);
        $image_path = public_path("image/".$news->image);

    if(file_exists($image_path)){
        File::delete( $image_path);
    }
        $news->delete();
        return redirect()->route('index');
    }
    public function edit($id)
    {
        $data = Basecrud::where('id',$id)->first();
        return view('Basecrud.edit',compact('data'));
    }
    public function update(Request $request)
    {
        $data = Basecrud::find($request->id);
        $data->name = $request->name;
        $data->status = $request->status;
        $data->hobby = implode(',', $request->hobby);

        if ($request->hasFile('image'))
        {
            $destination = public_path("image/".$data->image);
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $image=$request->file('image');
            $imagename =time().'.'.$image->getClientOriginalExtension();
            $request->image->move(public_path('image/'),$imagename);
            $data->image=$imagename;                       
        }
        
        // $data->name = $request->name;
      
    
        $data->save();
        return redirect()->route('index');
    
    }
    }

    

