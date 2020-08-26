<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Slide;

class AdminSlidesController extends Controller
{
    public function index()
    {
        $slides = Slide::orderBy('id','ASC')->limit(10)->get();
        $viewData = [
            'slides'=>$slides,
        ];
        return view('admin::slide.index',$viewData);
    }

    public function create()
    {
          return view('admin::slide.create');
    }

    public function store(Request $request)
    {
        $slide = new Slide();
        if ($request->hasFile('avatar'))
        {
            $file=upload_image('avatar');
            if (isset($file['name']))
            {
                $slide->s_avatar=$file['name'];
            }

        }
        $slide->save();
        return redirect()->back()->with('success','Lưu thành công');
    }

    public function delete($id)
    {
        \DB::table('slides')->where('id',$id)->delete();
        return redirect()->back()->with('success', 'Xóa thành công');
    }
}
