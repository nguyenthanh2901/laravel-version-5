<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(10);

        $viewData = [
            'contacts' => $contacts
        ];

        return view('admin::contact.index',$viewData);
    }

    public function action(Request $request,$action,$id)
    {
        $contact = Contact::find($id);
        switch ($action)
        {
            case  'status':
                $contact->c_status = $contact->c_status == 1 ? 0 : 1;
                $contact->save();
                break;
        }

        return redirect()->back();
    }
    public function delete($id)
    {
        \DB::table('contacts')->where('id',$id)->delete();
        return redirect()->back()->with('success','Xóa thành công');
    }
}
