<?php

namespace App\Http\Controllers;

use App\Exports\InvoicesExport;
use App\Exports\InvoicesExport2;
use App\Exports\InvoicesExport3;
use App\Exports\InvoicesExport4;
use App\Exports\InvoicesExport5;
use App\Exports\InvoicesExport6;
use App\Imports\UsersImport;
use App\Imports\UsersImport2;
use App\Imports\UsersImport3;
use App\Imports\UsersImport4;
use App\Imports\UsersImport5;
use App\Imports\UsersImport6;
use App\Models\Admin;
use App\Models\Auth;
use App\Models\Clentitog;
use App\Models\Drektor;
use App\Models\Ichkitavar;
use App\Models\Itogo;
use App\Models\Itogodok;
use App\Models\Karzina;
use App\Models\Tavar;
use App\Models\User;
use App\Models\Userdok;
use App\Models\Usere;
use App\Models\Usta;
use App\Models\Usta2;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;

class AuthController extends Controller
{
    public function login2()
    {
      return view("auth.login2");
    }
    
    public function typpe()
    {
        $num = 11000; 
        $num2 = 150.6; 
        $float = (float)$num;
        $int = (float)$num2;

        echo var_dump($float / $int);
    }
    public function exports() 
    {
        return Excel::download(new InvoicesExport, 'invoices.xlsx');
    }

    public function exports2() 
    {
        return Excel::download(new InvoicesExport2, 'invoices.xlsx');
    }

    public function exports3() 
    {
        return Excel::download(new InvoicesExport3, 'invoices.xlsx');
    }

    public function exports4() 
    {
        return Excel::download(new InvoicesExport4, 'invoices.xlsx');
    }

    public function exports5() 
    {
        return Excel::download(new InvoicesExport5, 'invoices.xlsx');
    }

    public function exports6() 
    {
        return Excel::download(new InvoicesExport6, 'invoices.xlsx');
    }

    public function imports(Request $request) 
    {
        Excel::import(new UsersImport(), $request->file('import'));
        return back();
    }
    
    public function import2(Request $request) 
    {
        Excel::import(new UsersImport2(), $request->file('import'));
        return back();
    }
    
    public function import3(Request $request) 
    {
        Excel::import(new UsersImport3(), $request->file('import'));
        return back();
    }
    
    public function import4(Request $request) 
    {
        Excel::import(new UsersImport4(), $request->file('import'));
        return back();
    }

    public function import5(Request $request) 
    {
        Excel::import(new UsersImport5(), $request->file('import'));
        return back();
    }
    
    public function import6(Request $request) 
    {
        Excel::import(new UsersImport6(), $request->file('import'));
        return back();
    }
    
    public function login()
    {
      return view("auth.login");
    }
  
    public function loginuser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login' => 'required',
            'password' => 'required',
            'ok' => 'required',
        ]);
        if($validator->passes()){
            if($request->login == "Admin"){
                $user = Drektor::where('login','=',$request['login'])->first();
                if($user){ 
                    if($request->password == $user->password){            
                        $request->session()->put('IDIE',$user->id);
                        return response()->json(["data"=>200]);             
                    }else{
                        return response()->json(["data"=>404]);
                    }
            
                }else{
                    $request->validate([
                    'login'=>'required',
                    'password'=>'required',
                    ]);  
                    Drektor::create($request->all());   
                    $user = Drektor::where('login','=',$request['login'])->first();
                    if ($user) {         
                        $request->session()->put('IDIE',$user->id);
                        return response()->json(["data"=>200]);          
                    }
                }            
            }else{
                $user = Drektor::where('login','=',$request['login'])->first();
                if($user){
                    if($request->password == $user->password){            
                        $request->session()->put('IDIE',$user->id);
                        return response()->json(["data"=>200]);             
                    }else{
                        return response()->json(["data"=>404]);
                    }            
                }else{
                    return response()->json(["data"=>500]);
                }
            }
        }else{            
            return response()->json(['data'=>0, 'error'=>$validator->errors()->toArray()]);
        }
    }
     
    public function dashbord()
    {
        $foo = Itogo::find(1);
        $foo2 = Itogodok::find(1);
        $clents = User::all();
        $clentsdok = Userdok::all();
        if(Session::has('IDIE')){
            $brends = Drektor::where('id','=',Session::get('IDIE'))->first();
            if($brends->login == "Admin"){
                return view('sotuv',[
                    'brends'=>$brends,
                    'itogs'=>$foo,
                    'itogsdok'=>$foo2,
                    'clents'=>$clents,
                    'clentsdok'=>$clentsdok
                ]);
            }elseif($brends->login == "Admin2"){
                return view('sotuv',[
                    'brends'=>$brends,
                    'itogs'=>$foo,
                    'itogsdok'=>$foo2,
                    'clents'=>$clents,
                    'clentsdok'=>$clentsdok
                ]);
            }else{
                $data = Usere::paginate(20);
                $datae = Usta::all();
                return view('mijoz', [
                    'collection'=>$datae,
                    'brends'=>$brends,
                    'data2'=>$data,
                ]);
            }
        }else{
            return redirect('/logaut');
        }
    }
    public function logaut()
    {
        if(Session::has('IDIE')){
            Session::pull('IDIE');
            return redirect('/');
        }else{
            return redirect('/');
        }
    }

    public function profil()
    {
        // $dt= Carbon::now('Asia/Tashkent');  
        // $sana = $dt->toDateString();
        // $jonatilgan = Jonatilgan2::count();
        // $sana2 = Clentmalumot::where('sana', $sana)->first();
        if(Session::has('IDIE')){
            $brends = Drektor::where('id','=',Session::get('IDIE'))->first();
            return view('auth.password',[
                'brends'=>$brends,
                // 'jonatilgan'=>$jonatilgan,
                // 'sana2'=>$sana2,

            ]);
        }else{
            return redirect('/logaut');
        }        
    }

    public function setting()
    {
        // $dt= Carbon::now('Asia/Tashkent');  
        // $sana = $dt->toDateString();
        // $sana2 = Clentmalumot::where('sana', $sana)->first();
        // $jonatilgan = Jonatilgan2::count();
        if(Session::has('IDIE')){
            $brends = Drektor::where('id','=',Session::get('IDIE'))->first();
            return view('auth.setting',[
                'brends'=>$brends,
                // 'jonatilgan'=>$jonatilgan,
                // 'sana2'=>$sana2,

            ]);
        }else{
            return redirect('/logaut');
        }
    }

    public function mijozlar()
    {
        $data = Usere::paginate(20);
        $datae = Usta::all();
        $brends = Drektor::where('id','=',Session::get('IDIE'))->first();
        return view('mijoz', [
            'collection'=>$datae,
            'brends'=>$brends,
            'data2'=>$data,
        ]);
    }

    public function usta()
    {
       $data = Usta::all();
       $brends = Drektor::where('id','=',Session::get('IDIE'))->first();
       return view('usta', [
           'brends'=>$brends,
           'collection'=>$data,
       ]);
    }

    public function usracreate(Request $request)
    {
        $request->validate(['name'=>'required']);
        Usta::create($request->all());
        return back()->with('success', 'Muvofaqiyatli yaratildi');
    }
    
    public function editusta(Request $request)
    {
       $data = Usta::find($request->id);
       return response()->json(['success'=>$data]);
    }

    public function updateusta(Request $request)
    {
        Usta::find($request->id)->update($request->all());
        return redirect()->route('usta')->with('success', 'Muvofaqiyatli yangilandi');
    }

    public function deleteusta(Request $request)
    {
        Usta::find($request->id)->delete($request->id);
        return back()->with('success', 'Muvofaqiyatli o`chirildi');
    }

    public function store(Request $request)
    {
        $dt= Carbon::now('Asia/Tashkent');  
        $data1 = $dt->toDateTimeString();
        $request->validate([
            'name'=>'required',
            'tel'=>'required',
            'texnika'=>'required',
            'muammo'=>'required',
            'usta'=>'required',
        ]);
        Usere::create([
            'data'=>$data1,
            'name'=>$request->name,
            'tel'=>$request->tel,
            'texnika'=>$request->texnika,
            'muammo'=>$request->muammo,
            'usta'=>$request->usta,
            'xulosa'=>$request->xulosa,
            'summa'=>$request->summa,
        ]);
        return back()->with('success', 'Muvofaqiyatli yaratildi');
    }

    public function edit(Request $request)
    {
       $data = Usere::find($request->id);
       return response()->json(['success'=>$data]);
    }

    public function update(Request $request)
    {
        Usere::find($request->id)->update($request->all());
        return back();
    }

    public function search(Request $request)
    {
        $data = Usere::where('tel', "LIKE", '%'.$request->tel.'%')->paginate(50);
        $collection = Usta::all();
        $brends = Drektor::where('id','=',Session::get('IDIE'))->first();
        return view('mijoz', [
            'brends'=>$brends,
            'data2'=>$data,
            'collection'=>$collection
        ]);
    }
    public function mijozsearch(Request $request)
    {
        $data = Usere::where('name', "LIKE", '%'.$request->mijozsearch.'%')->paginate(50);
        $collection = Usta::all();
        $brends = Drektor::where('id','=',Session::get('IDIE'))->first();
        return view('mijoz', [
            'brends'=>$brends,
            'data2'=>$data,
            'collection'=>$collection
        ]);
    }

    public function aloqa(Request $request)
    {
        $data = Usere::find($request->id);
        if($data->vizp == 0){
            Usere::find($request->id)->update(['vizp'=>1]);
            return back()->with('success', 'Muvofaqiyatli bajarildi');
        }else{
            Usere::find($request->id)->update(['vizp'=>0]);
            return back()->with('success', 'Muvofaqiyatli bajarildi');
        }
    }

    public function otkazish(Request $request)
    {
        $data = Usere::find($request->id);
        Usta2::create([
            'data'=>$data->data,
            'name'=>$data->name,
            'tel'=>$data->tel,
            'texnika'=>$data->texnika,
            'muammo'=>$data->muammo,
            'usta'=>$data->usta,
            'xulosa'=>$data->xulosa,
            'vizp'=>$data->vizp,
            'summa'=>$data->summa,
        ]);
        Usere::find($request->id)->delete($request->id);
        return back()->with('success', 'Muvofaqiyatli bajarildi');
    }

    public function tugatilgan()
    {
        $usta = Usta::all();
        $brends = Drektor::where('id','=',Session::get('IDIE'))->first();
        return view('tugatilgan', [
            'brends'=>$brends,
            'usta'=>$usta
        ]);
    }

    public function searchb(Request $request)
    {
        $data = Usta2::whereBetween('created_at', [$request->data, $request->data2])->paginate(50);
        $brends = Drektor::where('id','=',Session::get('IDIE'))->first();
        return view('tugatilgan', [
            'brends'=>$brends,
            'data2'=>$data,
        ]);
    }

    public function mijjozz(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data = DB::table('usta2s')
            ->where('name', 'like', '%'.$query.'%')
            ->orWhere('usta', $query)
            ->orderBy('id', 'DESC')
            ->get();
        }
        else
        {
        $data = DB::table('usta2s')
            ->orderBy('id', 'DESC')
            ->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr>
                    <td>'.$row->data.'</td>
                    <td>'.$row->name.'</td>
                    <td>'.$row->tel.'</td>
                    <td>'.$row->texnika.'</td>
                    <td>'.$row->muammo.'</td>
                    <td>'.$row->xulosa.'</td>
                    <td>'.$row->usta.'</td>
                    <td>'.$row->summa.'</td>            
                    </tr>
                ';
            }
        }
        else
        {
        $output = '
            <tr>
                <td align="center" colspan="8">No Data Found</td>
            </tr>
            ';
        }
        $data = array(
            'table_data'  => $output,
        );

        echo json_encode($data);
        }
    }

    public function mijjozz2(Request $request)
    {
        if($request->ajax())
        {
            $output = '';     
            $data = DB::table('usta2s')->where('usta', $request->usta)->get();   
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
                    <tr>
                        <td>'.$row->data.'</td>
                        <td>'.$row->name.'</td>
                        <td>'.$row->tel.'</td>
                        <td>'.$row->texnika.'</td>
                        <td>'.$row->muammo.'</td>
                        <td>'.$row->xulosa.'</td>
                        <td>'.$row->usta.'</td>
                        <td>'.$row->summa.'</td>            
                        </tr>
                    ';
                }
            }
            $foo = Clentitog::find(1);
            if($foo){
                $foo->tavarshtuk = 0;
                $foo->shtuk = 0;
                $foo->foiz = 0;
                $foo->itog = 0;
                $foo->opshi = 0;
                $foo->save();            
                foreach ($data as $value) {
                    $fool2 = Clentitog::find(1);
                    $a = $fool2->opshi + $value->summa;
                    Clentitog::find(1)->update([
                        'tavarshtuk'=>$total_row,
                        'opshi'=>$a,
                    ]);
                }
            }else{
                Clentitog::create([
                    'tavarshtuk'=>0,
                    'shtuk'=>0,
                    'foiz'=>0,
                    'itog'=>0,
                    'opshi'=>0
                ]);
                foreach ($data as $value) {
                    $fool3 = Clentitog::find(1);
                    $a1 = $fool3->opshi + $value->summa;
                    Clentitog::find(1)->update([
                        'tavarshtuk'=>$total_row,
                        'opshi'=>$a1,
                    ]);
                }
            }
            $foo2 = Clentitog::find(1);
            return response()->json([
                'table_data'=>$output,
                'foo2'=>$foo2??[],
            ]);
        }
    }

    public function mijjozz3(Request $request)
    {
        if($request->ajax())
        {
            $output = '';     
            $data = Usta2::where('usta', $request->usta)->whereBetween('created_at', [$request->date, $request->date2])->get();   
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
                    <tr>
                        <td>'.$row->data.'</td>
                        <td>'.$row->name.'</td>
                        <td>'.$row->tel.'</td>
                        <td>'.$row->texnika.'</td>
                        <td>'.$row->muammo.'</td>
                        <td>'.$row->xulosa.'</td>
                        <td>'.$row->usta.'</td>
                        <td>'.$row->summa.'</td>            
                        </tr>
                    ';
                }
            }
            $foo = Clentitog::find(1);
            if($foo){
                $foo->tavarshtuk = 0;
                $foo->shtuk = 0;
                $foo->foiz = 0;
                $foo->itog = 0;
                $foo->opshi = 0;
                $foo->save();            
                foreach ($data as $value) {
                    $fool2 = Clentitog::find(1);
                    $a = $fool2->opshi + $value->summa;
                    Clentitog::find(1)->update([
                        'tavarshtuk'=>$total_row,
                        'opshi'=>$a,
                    ]);
                }
            }else{
                Clentitog::create([
                    'tavarshtuk'=>0,
                    'shtuk'=>0,
                    'foiz'=>0,
                    'itog'=>0,
                    'opshi'=>0
                ]);
                foreach ($data as $value) {
                    $fool3 = Clentitog::find(1);
                    $a1 = $fool3->opshi + $value->summa;
                    Clentitog::find(1)->update([
                        'tavarshtuk'=>$total_row,
                        'opshi'=>$a1,
                    ]);
                }
            }
            $foo2 = Clentitog::find(1);
            return response()->json([
                'table_data'=>$output,
                'foo2'=>$foo2??[],
            ]);
        }
    }

    public function servislar()
    {
        $brends = Drektor::where('id','=',Session::get('IDIE'))->first();
        return view('servislar', [
            'brends'=>$brends,
        ]);
    }
}