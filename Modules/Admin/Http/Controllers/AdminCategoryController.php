<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class AdminCategoryController extends Controller
{

    public function index()
    {
        $categories = Category::get();
        $category = Category::count();
        $viewData = [
            'category'=>$category,
          'categories'=>$categories
        ];
        return view('admin::category.index',$viewData);
    }
    public function create()
    {
        return view('admin::category.create');
    }
    public function store(RequestCategory $requestCategory)
    {
        $this->insertOrUpdate($requestCategory);
        return redirect()->back()->with('success','Thêm mới thành công');
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin::category.update', compact('category'));
    }
    public function update(RequestCategory $requestCategory,$id)
    {

        $this->insertOrUpdate($requestCategory,$id);
        return redirect()->back()->with('success','Cập nhật thành công');
    }
    public function insertOrUpdate ($requestCategory, $id='')
    {
            $category = new Category();
            if ($id) $category = Category::find($id);
            $category->c_name = $requestCategory->name;
            $category->c_slug = str_slug($requestCategory->name);
            $category->c_icon = str_slug($requestCategory->icon);
            $category->c_title_ceo  = $requestCategory->c_title_ceo ? $requestCategory->c_title_ceo : $requestCategory->name;
            $category->c_description = $requestCategory->c_description_ceo;

            
            if ($requestCategory->hasFile('avatar'))
            {
                $file=upload_image('avatar');
                if (isset($file['name']))
                {
                    $category->c_avartar=$file['name'];
                }
    
            }
            $category->save();
       
    }
    public function delete($id)
    {
        DB::table('categories')->where('id',$id)->delete();
        return redirect()->back()->with('success', 'Xóa thành công');
    }
    public function action($action, $id)
    {
        $messages = '';
        if($action)
        {
            $category = Category::find($id);
            switch ($action)
            {
                case 'delete':
                    $category->delete();
                    $messages = 'Xoá dữ liệu thành công';
                    break;
                case 'active':
                    $category->c_active = $category->c_active == 1 ? 0 : 1;
                    $messages = 'Cập nhật thành công';
                    $category->save();
                    break;
            }
        }
        return redirect()->back()->with('success',$messages);
    }
    
}


