<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Company;

use App\Http\Requests\Admin\CompanyRequest;

class CompanyController extends Controller
{

    const _Per_Page = 7;

    public function __construct(){
        $this -> companys = new Company();
    }


    public function index(Request $request){
        $title = 'Companys List';
        $keywords = null;
        // search
        if(!empty($request->keywords)){
            $keywords = $request ->keywords;
        }
        $companyList = $this ->companys -> getAllCompany($keywords, self::_Per_Page);
        return view('admins.views.companys.list', compact('title', 'companyList'));
    }

    public function getAdd(){
        $title = 'Add new Company';
        return view('admins.views.companys.add', compact('title'));
    }


    public function postAdd(CompanyRequest $request){
        $dataInsert =[
            'cp_name' => $request->cp_name,
            'cp_email' => $request->cp_email,
            'cp_phoneNumber' => $request->cp_phoneNumber,
            'cp_address' => $request->cp_address,
        ];
        $this ->companys ->addCompany($dataInsert);
        return redirect() -> route('admin.company.index')-> with('msg', 'Successfully added new company!');
    }

    public function getEdit(Request $request, $id =0){
        $title = 'Edit company information';
        if(!empty($id)){
            $companyDetail = $this->companys ->getEdit($id);
            if(!empty($companyDetail[0])){
                $request ->session()->put('cp_id', $id);
                $companyDetail = $companyDetail[0];
            }else{
                return redirect()->route('admin.company.index')->with('msg', 'Company does not exist!');
            }
        }else{
            return redirect()->route('admin.company.index')->with('msg', 'Link does not exist!');
        }

        return view('admins.views.companys.edit', compact('title','companyDetail'));
    }

    public function postEdit(CompanyRequest $request){
        $id = session('cp_id');
        if(empty($id)){
            return back()->with ('msg', 'Link does not exist!');
        }

        $dataUpdate = [
            'cp_name' => $request->cp_name,
            'cp_email' => $request->cp_email,
            'cp_phoneNumber' => $request->cp_phoneNumber,
            'cp_address' => $request->cp_address,
        ];
        $this->companys -> postEdit($dataUpdate, $id);
        return redirect()->route('admin.company.index')->with('msg', 'Update company information successfully!');

    }

    public function delete($id =0){
        if(!empty($id)){
        $companyDetail =  $this ->companys ->getEdit($id);
            if(!empty($companyDetail[0])){
                $delete = $this ->companys->deleteCompany($id);
                if($delete){
                    $msg = 'Company removal successful!';
                }else{
                    $msg = 'You cannot remove the company at this time. Please try again later!';
                }
            }else{
                $msg ='Company does not exist!';
            }
        }else{
            $msg = 'Link does not exist!';
        }
    return redirect()->route('admin.company.index')->with('msg', $msg);
    }

}
