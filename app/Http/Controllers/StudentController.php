<?php

namespace App\Http\Controllers;

use App\Models\StudentInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class StudentController extends Controller
{
     //----add student--
     public function add(){
        return view('admin.student-info.add-info');
    }

    //----insert student--
    public function insert(Request $request){
        $request->validate([
            'name'=>'required',
            'roll'=>'required',
            'clg_name'=>'required',
            'father_name'=>'required',
            'mother_name'=>'required',
            'phn_number'=>'required',
            'image'=>'required|mimes:jpg,png,jpeg',
        ]);

        $image_name = $request->image;
        $extension = $image_name->extension();
        $new_name = time().'student'.'.'.$extension;
        Image::make($image_name)->save(public_path('uploads/student/'.$new_name));

        StudentInfo::insert([
            'name'=>$request->name,
            'roll'=>$request->roll,
            'clg_name'=>$request->clg_name,
            'father_name'=>$request->father_name,
            'mother_name'=>$request->mother_name,
            'phn_number'=>$request->phn_number,
            'image'=>$new_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('status', 'Student Info Insert Successfully');
    }
    // view student --
    public function view(){
        $all_student = StudentInfo::all();
        return view('admin.student-info.view-info',[
            'all_student'=>$all_student,
        ]);
    }
    // edit student --
    public function edit($id){
        $student_id_info = StudentInfo::find($id);
        return view('admin.student-info.edit-info',[
            'student_id_info'=>$student_id_info,
        ]);
    }
    public function update(Request $request){
        $request->validate([
            'name'=>'required',
            'roll'=>'required',
            'clg_name'=>'required',
            'father_name'=>'required',
            'mother_name'=>'required',
            'phn_number'=>'required',
        ]);

        if($request->image == ''){
            StudentInfo::find($request->student_id)->update([
                'name'=>$request->name,
                'roll'=>$request->roll,
                'clg_name'=>$request->clg_name,
                'father_name'=>$request->father_name,
                'mother_name'=>$request->mother_name,
                'phn_number'=>$request->phn_number,
            ]);
            return redirect(route('view.info'))->with('status','Student Info update Successfully !.');
        }
        else{
            $request->validate([
                'image'=>'required|mimes:jpg,png,jpeg',
            ]);
            $image_id = StudentInfo::find($request->student_id);
            $image_name = $image_id->image;
            $image_location = public_path('uploads/student/'.$image_name);
            unlink($image_location);

            $file_image = $request->image;
            $extension = $file_image->extension();
            $new_image_name = time().'students'.'.'.$extension;
            Image::make($file_image)->save(public_path('uploads/student/'.$new_image_name));

            StudentInfo::find($request->student_id)->update([
                'name'=>$request->name,
                'roll'=>$request->roll,
                'clg_name'=>$request->clg_name,
                'father_name'=>$request->father_name,
                'mother_name'=>$request->mother_name,
                'phn_number'=>$request->phn_number,
                'image'=>$new_image_name,
            ]);
            return redirect(route('view.info'))->with('status','Student Info update Successfully !.');
        }
    }

    //---destory---
    public function destroy($id){
        $image_id = StudentInfo::find($id);
        $image_name = $image_id->image;
        $image_location = public_path('uploads/student/'.$image_name);
        unlink($image_location);

        StudentInfo::find($id)->delete();
        return redirect(route('view.info'))->with('status','Student Info Delete Successfully !.');
    }
    //---status_change
    public function status_change($id){
        $get_status = StudentInfo::select('status')->where('id', $id)->first();
        if($get_status->status == 1){
            $status = 0;
        }
        else{
            $status = 1;
        }
        StudentInfo::where('id',$id)->update([
            'status'=>$status,
        ]);
        return redirect(route('view.info'))->with('status','Your Status Changed Successfully !.');
    }
}
