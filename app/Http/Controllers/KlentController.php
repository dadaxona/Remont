<?php

namespace App\Http\Controllers;

use App\Models\Tavar;
use App\Models\User;
use App\Providers\KlentServis;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use App\Models\Adress;
use App\Models\Drektor;
use App\Models\Ichkitavar;
use App\Models\Itogo;
use App\Models\Karzina;
use App\Models\Updatetavr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\KlentController2;
use App\Models\Deletkarzina;
use App\Models\Ichkitavardok;
use App\Models\Itogodok;
use App\Models\Karzinadok;
use App\Models\Sqladpoytaxt;
use App\Models\Tavar2;
use App\Models\Tayyorsqlad;
use App\Models\Updatetavrdok;
use App\Models\Userdok;

class KlentController extends KlentController2
{
    public function tavar_live(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data = DB::table('tavars')
            ->where('name', 'like', '%'.$query.'%')
            ->orderBy('id', 'DESC')
            ->get();
        }
        else
        {
        $data = DB::table('tavars')
            ->orderBy('id', 'DESC')
            ->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr style="border-bottom: 1px solid;">
                    <td>'.$row->name.'</td>
                    <td>
                        <a href="javascript:void(0)" onclick="editPost2('.$row->id.')" style="color: green">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                            </svg>
                        </a>             
                        <a href="javascript:void(0)" onclick="deletePost2('.$row->id.')" class="mx-3" style="color: red">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                            </svg>
                        </a>
                    </td>
                </tr>
                ';
            }
        }
        else
        {
        $output = '
            <tr>
                <td align="center" colspan="5">No Data Found</td>
            </tr>
            ';
        }
        $data = array(
            'table_data'  => $output,
        );
        echo json_encode($data);
        }
    }

    public function tavar2_live(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data =Tavar2::where('name', 'like', '%'.$query.'%')->orderBy('id', 'DESC')->get();
        }
        else
        {
        $data = Tavar2::orderBy('id', 'DESC')->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr style="border-bottom: 1px solid;">
                    <td>'.$row->tavar->name.'</td>
                    <td>'.$row->name.'</td>
                    <td>
                        <a href="javascript:void(0)" onclick="editPost2('.$row->id.')" style="color: green">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                            </svg>
                        </a>             
                        <a href="javascript:void(0)" onclick="deletePost2('.$row->id.')" class="mx-3" style="color: red">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                            </svg>
                        </a>
                    </td>
                </tr>
                ';
            }
        }
        else
        {
        $output = '
            <tr>
                <td align="center" colspan="5">No Data Found</td>
            </tr>
            ';
        }
        $data = array(
            'table_data'  => $output,
        );

        echo json_encode($data);
        }
    }

    public function ichkitavartbody(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data =Ichkitavar::where('name', 'like', '%'.$query.'%')
                        ->orWhere('kod', 'like', '%'.$query.'%')
                        ->orderBy('id', 'DESC')->get();
        }
        else
        {
        $data = Ichkitavar::all();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                if($row->hajm <= $row->raqam){
                    $ror = "<td style='background-color: rgb(237, 0, 0); color: white;' class='pl-4'>$row->hajm</td>";
                }else{
                    $ror = "<td class='pl-4'>$row->hajm </td>";
                }

                $output .= '
                <tr id="row_'.$row->id.'" style="border-bottom: 1px solid">
                <td>'.$row->tavar->name.'</td>
                <td>'.$row->adress.'</td>
                <td>'.$row->tavar2->name.'</td>
                '.$ror.'
                <td>'.$row->summa.'</td>
                <td>'.$row->summa2.'</td>
                <td>'.$row->summa3.'</td>
                <td>'.$row->kod.'</td>
                <td>'.$row->updated_at .'</td>
                <td>
                  <a href="javascript:void(0)" onclick="editPost3('.$row->id.')" style="color: green">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                      <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                    </svg>
                  </a>                            
                  <a href="javascript:void(0)" onclick="deletePost3('.$row->id.')" class="mx-3" style="color: red">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                      <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                    </svg>
                  </a>
                </td>
              </tr>
                ';
            }
        }
        else
        {
        $output = '
            <tr>
                <td align="center" colspan="5">No Data Found</td>
            </tr>
            ';
        }
        $data = array(
            'table_data'  => $output,
        );

        return response()->json($data);
        }
    }

    public function tiklaslar(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data =Deletkarzina::where('name', 'like', '%'.$query.'%')->orderBy('id', 'DESC')->get();
        }
        else
        {
        $data = Deletkarzina::orderBy('id', 'DESC')->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr id="row2_'.$row->id.'" style="border-bottom: 1px solid">
                <td>'.$row->tavar->name.'</td>
                <td>'.$row->adress.'</td>
                <td>'.$row->tavar2->name.'</td>
                <td>'.$row->hajm.'</td> 
                <td>'.$row->summa.'</td>
                <td>'.$row->summa2.'</td>
                <td>'.$row->summa3.'</td>
                <td>'.$row->updated_at .'</td>
                <td>
                    <a href="javascript:void(0)" onclick="tiklash('.$row->id.')" style="color: green">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                            <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                        </svg>
                    </a>
                    <a href="javascript:void(0)" onclick="deletePro3('.$row->id.')" class="mx-3" style="color: red">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                        </svg>
                    </a>
                </td>
              </tr>
                ';
            }
        }
        else
        {
        $output = '
            <tr>
                <td align="center" colspan="5">No Data Found</td>
            </tr>
            ';
        }
        $data = array(
            'table_data'  => $output,
        );

        return response()->json($data);
        }
    }

    public function live_adress(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data = DB::table('adresses')
            ->where('adress', 'like', '%'.$query.'%')
            ->orderBy('id', 'DESC')
            ->get();
            
        }
        else
        {
        $data = DB::table('adresses')
            ->orderBy('id', 'DESC')
            ->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr id="row_'.$row->id.'" style="border-bottom: 1px solid;">
                <td>'. $row->adress.'</td>
                <td>
                  <a href="javascript:void(0)" onclick="editPosts2('.$row->id .')" style="color: green">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                      <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                    </svg>
                  </a>                            
                  <a href="javascript:void(0)" onclick="deletePost2('.$row->id.')" class="mx-3" style="color: red">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                      <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                    </svg>
                  </a>
                </td>
              </tr>
              ';
            }
        }
        else
        {
        $output = '
            <tr>
                <td align="center" colspan="5">No Data Found</td>
            </tr>
            ';
        }
        $data = array(
            'table_data'  => $output,
            'total_data'  => $total_row
        );

        echo json_encode($data);
        }
    }
    
    public function live_clentdok(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data = DB::table('userdoks')
            ->where('adress', 'like', '%'.$query.'%')
            ->orderBy('id', 'DESC')
            ->get();
            
        }
        else
        {
        $data = DB::table('userdoks')
            ->orderBy('id', 'DESC')
            ->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr id="rowdok_'.$row->id.'" style="border-bottom: 1px solid;">
                <td>'.$row->name.'</td>
                <td>'.$row->tel.'</td>
                <td>'.$row->firma.'</td>
                <td>'.$row->inn.'</td>
            
                <td>
                  <a href="javascript:void(0)" onclick="editPostdok('.$row->id.')" style="color: green">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                      <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                    </svg>
                  </a>                            
                  <a href="javascript:void(0)" onclick="deletePostdok('.$row->id.')" class="mx-3" style="color: red">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                      <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                    </svg>
                  </a>
                </td>
              </tr>
              ';
            }
        }
        else
        {
        $output = '
            <tr>
                <td align="center" colspan="5">No Data Found</td>
            </tr>
            ';
        }
        $data = array(
            'table_data'  => $output,
        );

        echo json_encode($data);
        }
    }

    public function live_clent(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data = DB::table('users')
            ->where('adress', 'like', '%'.$query.'%')
            ->orderBy('id', 'DESC')
            ->get();
            
        }
        else
        {
        $data = DB::table('users')
            ->orderBy('id', 'DESC')
            ->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr id="row_'.$row->id.'" style="border-bottom: 1px solid;">
                <td>'.$row->name.'</td>
                <td>'.$row->tel.'</td>
                <td>'.$row->firma.'</td>
                <td>'.$row->inn.'</td>
            
                <td>
                  <a href="javascript:void(0)" onclick="editPost('.$row->id.')" style="color: green">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                      <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                    </svg>
                  </a>                            
                  <a href="javascript:void(0)" onclick="deletePost('.$row->id.')" class="mx-3" style="color: red">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                      <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                    </svg>
                  </a>
                </td>
              </tr>
              ';
            }
        }
        else
        {
        $output = '
            <tr>
                <td align="center" colspan="5">No Data Found</td>
            </tr>
            ';
        }
        $data = array(
            'table_data'  => $output,
        );

        echo json_encode($data);
        }
    }

    public function index()
    {
        if(Session::has('IDIE')){
          $brends = Drektor::where('id','=',Session::get('IDIE'))->first();
          return view('tavar',[
              'brends'=>$brends
          ]);
        }else{
            return redirect('/logaut');
        }
    }
    
    public function indextip()
    {
        $data = Tavar::all();
        if(Session::has('IDIE')){
          $brends = Drektor::where('id','=',Session::get('IDIE'))->first();
          return view('tavartip',[
              'brends'=>$brends,
              'tovar'=>$data
          ]);
        }else{
            return redirect('/logaut');
        }
    }

    public function storead(Request $request, KlentServis $model)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'tel' => 'nullable',
            'firma' => 'nullable',
            'inn' => 'nullable',
        ]);
        if($validator->passes()){
            return $model->storead($request);
        }else{            
            return response()->json(['code'=>0, 'msg'=>'Малумотлар толдирилмаган', 'error'=>$validator->errors()->toArray()]);
        }
    }

    public function storedok(Request $request, KlentServis $model)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'tel' => 'nullable',
            'firma' => 'nullable',
            'inn' => 'nullable',
        ]);
        if($validator->passes()){
            return $model->storedok($request);
        }else{            
            return response()->json(['code'=>0, 'msg'=>'Малумотлар толдирилмаган', 'error'=>$validator->errors()->toArray()]);
        }
    }
    
    public function show($id)
    {
        $post = User::find($id);    
        return response()->json($post);
    }

    public function showdok($id)
    {
        $post = Userdok::find($id);    
        return response()->json($post);
    }
    
    public function live_admin(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data = Drektor::where('login', 'like', '%'.$query.'%')
                        ->orderBy('id', 'DESC')
                        ->get();            
        }
        else
        {
        $data = Drektor::orderBy('id', 'DESC')->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr id="row_'.$row->id.'" style="border-bottom: 1px solid;">
                <td class="ui-widget-content">'.$row->login.'</td>
                <td class="ui-widget-content">'.$row->password.'</td>            
                <td class="ui-widget-content">
                  <a href="javascript:void(0)" onclick="editPost('.$row->id.')" style="color: green">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                      <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                    </svg>
                  </a>                            
                  <a href="javascript:void(0)" onclick="deletePost('.$row->id.')" class="mx-3" style="color: red">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                      <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                    </svg>
                  </a>
                </td>
              </tr>
              ';
            }
        }
        else
        {
        $output = '
            <tr>
                <td align="center" colspan="4">No Data Found</td>
            </tr>
            ';
        }
        $data = array(
            'table_data'  => $output,
        );

        echo json_encode($data);
        }
    }

    public function live_ishchi(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data = Drektor::where('name', 'like', '%'.$query.'%')
                        ->orderBy('id', 'DESC')
                        ->get();            
        }
        else
        {
        $data = Drektor::orderBy('id', 'DESC')->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr id="row_'.$row->id.'" style="border-bottom: 1px solid;">
                <td class="ui-widget-content">'.$row->name.'</td>
                <td class="ui-widget-content">'.$row->login.'</td>
                <td class="ui-widget-content">'.$row->password.'</td>            
                <td class="ui-widget-content">
                  <a href="javascript:void(0)" onclick="editPost('.$row->id.')" style="color: green">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                      <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                    </svg>
                  </a>                            
                  <a href="javascript:void(0)" onclick="deletePost('.$row->id.')" class="mx-3" style="color: red">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                      <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                    </svg>
                  </a>
                </td>
              </tr>
              ';
            }
        }
        else
        {
        $output = '
            <tr>
                <td align="center" colspan="4">No Data Found</td>
            </tr>
            ';
        }
        $data = array(
            'table_data'  => $output,
        );

        echo json_encode($data);
        }
    }

    public function destroy($id, KlentServis $model)
    {
        return $model->delete($id);
    }

    public function destroydok($id, KlentServis $model)
    {
        return $model->deletedok($id);
    }

    public function store2(Request $request, KlentServis $model)
    {
        $validator = Validator::make($request->all(), [
            'addmore.*.name' => 'required',
        ]);
        if($validator->passes()){
            return $model->store2($request);
        }else{            
            return response()->json(['code'=>0, 'msg'=>'Малумотлар толдирилмаган', 'error'=>$validator->errors()->toArray()]);
        }
    }

    public function store2tip(Request $request, KlentServis $model)
    {
        $validator = Validator::make($request->all(), [
            'addmore.*.tavar_id' => 'required',
            'addmore.*.name' => 'required',
        ]);
        if($validator->passes()){
            return $model->store2tip($request);
        }else{            
            return response()->json(['code'=>0, 'msg'=>'Малумотлар толдирилмаган', 'error'=>$validator->errors()->toArray()]);
        }
    }

    public function show2(Request $request)
    {
        $post = Tavar2::find($request->id);    
        return response()->json($post);
    }

    public function shower2($id)
    {
        $post = Tavar::find($id);    
        return response()->json($post);
    }

    public function iidd3()
    {
        $post = Tavar::all();    
        return response()->json($post);
    }
 
    public function iidd4()
    {
        $post = Tavar2::all();    
        return response()->json($post);
    }
 
    public function edit3(KlentServis $model)
    {
        return $model->edit3();
    }
    
    public function update2(Request $request, KlentServis $model)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if($validator->passes()){
            return $model->update2($request);
        }else{            
            return response()->json(['code'=>0, 'msg'=>'Малумот киритилмади', 'error'=>$validator->errors()->toArray()]);
        }
    }
    public function updateer2(Request $request, KlentServis $model)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if($validator->passes()){
            return $model->updateer2($request);
        }else{            
            return response()->json(['code'=>0, 'msg'=>'Малумот киритилмади', 'error'=>$validator->errors()->toArray()]);
        }
    }

    public function delete2($id)
    {
        Tavar2::find($id)->delete($id);
        return response()->json(['msg'=>'Мувофакиятли очирилди']);
    }

    public function deleteer2($id)
    {
        Tavar::find($id)->delete($id);
        return response()->json(['msg'=>'Мувофакиятли очирилди']);
    }
    
        
    public function deleteishchi($id, KlentServis $model)
    {
        return $model->deleteishchi($id);
    }

    public function deleteadmin($id, KlentServis $model)
    {
        return $model->deleteadmin($id);
    }
    
    public function store3(Request $request, KlentServis $model)
    {
        $validator = Validator::make($request->all(), [
            'addmore.*.tavar_id' => 'required',
            'addmore.*.adress' => 'nullable',
            'addmore.*.tavar2_id' => 'required',
            'addmore.*.raqam' => 'nullable',
            'addmore.*.hajm' => 'required',
            'addmore.*.summa' => 'required|numeric',
            'addmore.*.summa2' => 'required|numeric',
            'addmore.*.summa3' => 'required|numeric',
            'addmore.*.kod' => 'nullable',
        ]);
        if($validator->passes()){
            return $model->store3($request);
        }else{            
            return response()->json(['code'=>0, 'msg'=>'Малумотлар толдирилмаган', 'error'=>$validator->errors()->toArray()]);
        }
    }

    public function storedd3(Request $request, KlentServis $model)
    {
        $validator = Validator::make($request->all(), [
            'tavar_id' => 'required',
            'adress' => 'nullable',
            'tavar2_id' => 'required',
            'raqam' => 'nullable',
            'hajm' => 'required',
            'summa' => 'required|numeric',
            'summa2' => 'required|numeric',
            'summa3' => 'required|numeric',
            'kod' => 'nullable',
        ]);
        if($validator->passes()){
            return $model->storedd3($request);
        }else{            
            return response()->json(['code'=>0, 'msg'=>'Малумотлар толдирилмаган', 'error'=>$validator->errors()->toArray()]);
        }
    }

    public function store3dok(Request $request, KlentServis $model)
    {
        $validator = Validator::make($request->all(), [
            'addmore.*.name' => 'required',
            'addmore.*.raqam' => 'nullable',
            'addmore.*.hajm' => 'required',
            'addmore.*.summa' => 'required|numeric',
            'addmore.*.summa2' => 'required|numeric',
            'addmore.*.summa3' => 'required|numeric',
            'addmore.*.kod' => 'nullable',
        ]);
        if($validator->passes()){
            return $model->store3dok($request);
        }else{            
            return response()->json(['code'=>0, 'msg'=>'Малумотлар толдирилмаган', 'error'=>$validator->errors()->toArray()]);
        }
    }
    
    public function updates(Request $request, KlentServis $model)
    {
        $validator = Validator::make($request->all(), [
            'tavar_id' => 'required',
            'adress' => 'nullable',
            'tavar2_id' => 'required',
            'raqam' => 'nullable',
            'hajm' => 'required',
            'summa' => 'required|numeric',
            'summa2' => 'required|numeric',
            'summa3' => 'required|numeric',
        ]);
        if($validator->passes()){
            return $model->updates($request);
        }else{            
            return response()->json(['code'=>0, 'msg'=>'Малумотлар толдирилмаган', 'error'=>$validator->errors()->toArray()]);
        }
    }

    public function updatesdok(Request $request, KlentServis $model)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'raqam' => 'nullable',
            'hajm' => 'required',
            'summa' => 'required|numeric',
            'summa2' => 'required|numeric',
            'summa3' => 'required|numeric',
        ]);
        if($validator->passes()){
            return $model->updatesdok($request);
        }else{            
            return response()->json(['code'=>0, 'msg'=>'Малумотлар толдирилмаган', 'error'=>$validator->errors()->toArray()]);
        }
    }
    
    public function edit4(Request $request)
    {
        $post = Ichkitavar::find($request->id);    
        return response()->json($post);
    }

    public function edit4dok(Request $request)
    {
        $post = Ichkitavardok::find($request->id);    
        return response()->json($post);
    }
    
    public function delete3($id, KlentServis $model)
    {
        return $model->delete3($id);
    }

    public function delete3dok($id, KlentServis $model)
    {
        return $model->delete3dok($id);
    }
    
    public function tiklash($id, KlentServis $model)
    {
        return $model->tiklash($id);
    }

    public function tiklashdok($id, KlentServis $model)
    {
        return $model->tiklashdok($id);
    }

    public function deleetemnu($id, KlentServis $model)
    {
        return $model->deleetemnu($id);
    }

    public function deleetemnudok($id, KlentServis $model)
    {
        return $model->deleetemnudok($id);
    }

    public function edit5(Request $request)
    {
        $post = Ichkitavar::find($request->id);    
        return response()->json($post);
    }

    public function store4(Request $request, KlentServis $model)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'raqam' => 'nullable',
            'hajm' => 'required',
            'summa' => 'required',
            'summa2' => 'required'
        ]);
        if($validator->passes()){
            return $model->store4($request);
        }else{            
            return response()->json(['code'=>0, 'msg'=>'Малумотлар толдирилмаган', 'error'=>$validator->errors()->toArray()]);
        }
    }

    public function adress()
    {
        $tavar = Tavar::paginate(10);
        if(Session::has('IDIE')){
          $brends = Drektor::where('id','=',Session::get('IDIE'))->first();
          return view('adress',[
              'brends'=>$brends,
              'tavar'=>$tavar,
          ]);
        }else{
            return redirect('/logaut');
        }
    }

    public function ombor()
    {
        $tavar = Tavar::paginate(10);
        if(Session::has('IDIE')){
          $brends = Drektor::where('id','=',Session::get('IDIE'))->first();
          return view('ombor',[
              'brends'=>$brends,
              'tavar'=>$tavar,
          ]);
        }else{
            return redirect('/logaut');
        }
    }
    public function storeishchi(Request $request, KlentServis $model)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'login' => 'required',
            'password' => 'required',
        ]);
        if($validator->passes()){
            return $model->storeishchi($request);
        }else{            
            return response()->json(['code'=>0, 'msg'=>'Малумотлар толдирилмаган', 'error'=>$validator->errors()->toArray()]);
        }
    }
    
    public function storeadmin(Request $request, KlentServis $model)
    {
        $validator = Validator::make($request->all(), [
            'login' => 'required',
            'password' => 'required',
        ]);
        if($validator->passes()){
            return $model->storeadmin($request);
        }else{            
            return response()->json(['code'=>0, 'msg'=>'Малумотлар толдирилмаган', 'error'=>$validator->errors()->toArray()]);
        }
    }

    public function showishchi($id)
    {
        $post = Drektor::find($id);    
        return response()->json($post);
    }

    public function showadmin($id)
    {
        $post = Drektor::find($id);    
        return response()->json($post);
    }

    public function index2()
    {
        $adress = Adress::paginate(10);
        if(Session::has('IDIE')){
          $brends = Drektor::where('id','=',Session::get('IDIE'))->first();
          return view('adress2',[
              'brends'=>$brends,
              'adress'=>$adress,
          ]);
        }else{
            return redirect('/logaut');
        }
    }

    public function pastavka(Request $request, KlentServis $model)
    {
        $validator = Validator::make($request->all(), [
            'addmore.*.adress' => 'required',
        ]);
        if($validator->passes()){
            return $model->pastavka($request);
        }else{            
            return response()->json(['code'=>0, 'msg'=>'Малумотлар толдирилмаган', 'error'=>$validator->errors()->toArray()]);
        }
    }

    public function show3($id)
    {
        $post = Adress::find($id);    
        return response()->json($post);
    }

    public function past()
    {
        $post = Adress::all();    
        return response()->json($post);
    }

    public function pastavkaupdate(Request $request, KlentServis $model)
    {
        return $model->pastavkaupdate($request);
    }

    public function delete4($id, KlentServis $model)
    {
        return $model->deletew4($id);
    }

    public function clents(KlentServis $model)
    {
        return $model->clents();
    }

    public function sazdat(Request $request, KlentServis $model)
    {
        return $model->sazdat($request);
    }

    public function sazdatdok(Request $request, KlentServis $model)
    {
        return $model->sazdatdok($request);
    }
    
    public function belgila(Request $request)
    {
        $post = Karzina::find($request->id);    
        return response()->json($post);
    }
    public function belgiladok(Request $request)
    {
        $post = Karzinadok::find($request->id);    
        return response()->json($post);
    }

    public function belgi2(Request $request)
    {
        $post = Karzina::find($request->id);    
        return response()->json($post);
    }

    public function belgi2dok(Request $request)
    {
        $post = Karzinadok::find($request->id);    
        return response()->json($post);
    }

    public function kursm()
    {
        $post = Itogo::find(1);    
        return response()->json($post);
    }

    public function kursmdok()
    {
        $post = Itogodok::find(1);    
        return response()->json($post);
    }
    
    public function usdkurd2(Request $request, KlentServis $model)
    {
        return $model->usdkurd2($request);
    }
    
    public function usdkurd2dok(Request $request, KlentServis $model)
    {
        return $model->usdkurd2dok($request);
    }

    public function sotuvdok(Request $request)
    {
        if($request->ajax())
        {
         $output = '';
         $query = $request->get('query');
         if($query != '')
         {
          $data = Karzinadok::where('name', 'like', '%'.$query.'%')
                            ->orderBy('id', 'DESC')
                            ->get();
         }
         else
         {
          $data = Karzinadok::orderBy('id', 'DESC')->get();
         }
         $total_row = $data->count();
         if($total_row > 0)
         {
          foreach($data as $row)
          {
           $output .= '
           <tr onclick="belgilashdok('.$row->id.')" style="border-bottom: 1px solid;">  
            <td>'.$row->name.'</td>
            <td>'.number_format($row->summa2, 3).'</td>
            <td>'.$row->soni.'</td>
            <td>'.$row->chegirma.'</td>
            <td>'.number_format($row->itog, 3).'</td>
            <td>'.$row->hajm.'</td>
           </tr>
           ';
          }
         }
         $data = array(
          'table_data'  => $output,
          'total_data'  => $total_row
         );   
         echo json_encode($data);
        }
    }

    public function sotuv(Request $request)
    {
        if($request->ajax())
        {
         $output = '';
         $query = $request->get('query');
         if($query != '')
         {
          $data = DB::table('karzinas')
            ->where('name', 'like', '%'.$query.'%')
            ->orderBy('id', 'DESC')
            ->get();
         }
         else
         {
          $data = DB::table('karzinas')
            ->orderBy('id', 'DESC')
            ->get();
         }
         $total_row = $data->count();
         if($total_row > 0)
         {
          foreach($data as $row)
          {
           $output .= '
           <tr onclick="belgilash('.$row->id.')" style="border-bottom: 1px solid;">  
            <td>'.$row->name.'</td>
            <td>'.number_format($row->summa2, 3).'</td>
            <td>'.$row->soni.'</td>
            <td>'.$row->chegirma.'</td>
            <td>'.number_format($row->itog, 3).'</td>
            <td>'.$row->hajm.'</td>
           </tr>
           ';
          }
         }
         $data = array(
          'table_data'  => $output,
          'total_data'  => $total_row
         );   
         echo json_encode($data);
        }
    }
    
    function live_searchdokon(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data = Ichkitavardok::where('name', 'like', '%'.$query.'%')->orderBy('id', 'DESC')->get();            
        }
        else
        {
        $data = Ichkitavardok::orderBy('id', 'DESC')->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr style="border-bottom: 1px solid;">
                <td>'.$row->name.'</td>
                <td>'.$row->hajm.'</td>
                <td>'.$row->summa2.'</td>
                <td>'.$row->summa3.'</td>
                </tr>
                ';
            }
        }
        else
        {
        $output = '
        <tr>
            <td align="center" colspan="5">No Data Found</td>
        </tr>
        ';
        }
        $data = array(
        'table_data'  => $output,
        );

        echo json_encode($data);
        }
    }

    function live_search(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data = Ichkitavar::where('name', 'like', '%'.$query.'%')
                            ->orWhere('kod', 'like', '%'.$query.'%')
                            ->orderBy('id', 'DESC')->get();            
        }
        else
        {
        $data = Ichkitavar::orderBy('id', 'DESC')->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr ondblclick="plus('.$row->id.')" style="border-bottom: 1px solid;" id="asdsad">
                <td>'.$row->name.'</td>
                <td>'.$row->hajm.'</td>
                <td>'.$row->summa2.'</td>
                <td>'.$row->summa3.'</td>
                </tr>
                ';
            }
        }
        else
        {
        $output = '
        <tr>
            <td align="center" colspan="5">No Data Found</td>
        </tr>
        ';
        }
        $data = array(
        'table_data'  => $output,
        'total_data'  => $total_row
        );

        echo json_encode($data);
        }
    }

    function live_searchdok(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data = Ichkitavardok::where('name', 'like', '%'.$query.'%')
                            ->orWhere('kod', 'like', '%'.$query.'%')
                            ->orderBy('id', 'DESC')->get();            
        }
        else
        {
        $data = Ichkitavardok::orderBy('id', 'DESC')->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr ondblclick="plusdok('.$row->id.')" style="border-bottom: 1px solid;" id="asdsaddok">
                <td>'.$row->name.'</td>
                <td>'.$row->hajm.'</td>
                <td>'.$row->summa2.'</td>
                <td>'.$row->summa3.'</td>
                </tr>
                ';
            }
        }
        else
        {
        $output = '
        <tr>
            <td align="center" colspan="5">No Data Found</td>
        </tr>
        ';
        }
        $data = array(
        'table_data'  => $output,
        'total_data'  => $total_row
        );

        echo json_encode($data);
        }
    }

    function sqladiskizapas(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data = Ichkitavar::where('name', 'like', '%'.$query.'%')->orderBy('id', 'DESC')->get();            
        }
        else
        {
        $data = Ichkitavar::orderBy('id', 'DESC')->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr data-id="'.$row->id.'" id="data" style="border-bottom: 1px solid;">
                <td>'.$row->tavar->name.'</td>
                <td>'.$row->name.'</td>
                <td>'.$row->hajm.'</td>
                <td>'.$row->summa.'</td>
                <td>'.$row->summa2.'</td>
                <td>'.$row->summa3.'</td>
                </tr>
                ';
            }
        }
        else
        {
        $output = '
        <tr>
            <td align="center" colspan="5">No Data Found</td>
        </tr>
        ';
        }
        $data = array(
            'table_data'  => $output,
        );

        echo json_encode($data);
        }
    }
    
    function sqladiskizapas2(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data = Sqladpoytaxt::where('name', 'like', '%'.$query.'%')->orderBy('id', 'DESC')->get();            
        }
        else
        {
        $data = Sqladpoytaxt::orderBy('id', 'DESC')->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr data-id="'.$row->id.'" id="asdsad" style="border-bottom: 1px solid;">
                <td>'.$row->tavar->name.'</td>
                <td>'.$row->name.'</td>
                <td>'.$row->hajm.'</td>
                <td>'.$row->summa.'</td>
                <td>'.$row->summa2.'</td>
                <td>'.$row->summa3.'</td>
                </tr>
                ';
            }
        }

        $data = array(
            'table_data'  => $output,
        );

        echo json_encode($data);
        }
    }

    function tbody3table(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
            $data = Tayyorsqlad::where('name', 'like', '%'.$query.'%')->orderBy('id', 'DESC')->get();            
        }
        else
        {
        $data = Tayyorsqlad::orderBy('id', 'DESC')->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr data-id="'.$row->id.'" id="asdsad" style="border-bottom: 1px solid;">
                <td>'.$row->tavar->name.'</td>
                <td>'.$row->name.'</td>
                <td>'.$row->hajm.'</td>
                <td>'.$row->summa.'</td>
                <td>'.$row->summa2.'</td>
                <td>'.$row->summa3.'</td>
                </tr>
                ';
            }
        }

        $data = array(
            'table_data'  => $output,
        );

        echo json_encode($data);
        }
    }

    public function tbody3table2(Request $request)
    {
        if($request->ajax())
        {
            $output = ''; 
            $data = Tayyorsqlad::whereBetween('updated_at', [$request->date1, $request->date2])->get(); 
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
                    <tr data-id="'.$row->id.'" id="asdsad" style="border-bottom: 1px solid;">
                    <td>'.$row->tavar->name.'</td>
                    <td>'.$row->name.'</td>
                    <td>'.$row->hajm.'</td>
                    <td>'.$row->summa.'</td>
                    <td>'.$row->summa2.'</td>
                    <td>'.$row->summa3.'</td>
                    </tr>
                    ';
                }
            }
            $data = array(
                'table_data'  => $output,
            );
            echo json_encode($data);
        }
    }

    public function plus(Request $request, KlentServis $model)
    {
        return $model->plus($request);
    }

    public function plusdok(Request $request, KlentServis $model)
    {
        return $model->plusdok($request);
    }

    public function minus(Request $request, KlentServis $model)
    {
        return $model->minus($request);
    }
    public function minusdok(Request $request, KlentServis $model)
    {
        return $model->minusdok($request);
    }
    
    public function udalit(Request $request, KlentServis $model)
    {
        return $model->udalit($request);
    }

    public function udalitdok(Request $request, KlentServis $model)
    {
        return $model->udalitdok($request);
    }

    public function yangilashdok(Request $request, KlentServis $model)
    {
        $validator = Validator::make($request->all(), [
            'soni' => 'required',
            'summo' => 'required',
            'summ' => 'required'
        ]);
        if($validator->passes()){
            return $model->yangilashdok($request);
        }else{            
            return response()->json(['code'=>0, 'msg'=>'Малумотни киритинг', 'error'=>$validator->errors()->toArray()]);
        }
    }

    public function yangilash(Request $request, KlentServis $model)
    {
        $validator = Validator::make($request->all(), [
            'soni' => 'required',
            'summo' => 'required',
            'summ' => 'required'
        ]);
        if($validator->passes()){
            return $model->yangilash($request);
        }else{            
            return response()->json(['code'=>0, 'msg'=>'Малумотни киритинг', 'error'=>$validator->errors()->toArray()]);
        }
    }

    public function tugle(Request $request, KlentServis $model)
    {
        return $model->tugle($request);
    }

    public function tugledok(Request $request, KlentServis $model)
    {
        return $model->tugledok($request);
    }
    
    public function rachot()
    {
        $data = Itogo::find(1);
        return response()->json($data);
    }

    public function rachotdok()
    {
        $data = Itogodok::find(1);
        return response()->json($data);
    }
    
    public function oplata(Request $request, KlentServis $model)
    {    
        return $model->oplata($request);        
    }

    public function oplatadok(Request $request, KlentServis $model)
    {
        return $model->oplatadok($request);      
    }


    public function zakazayt(Request $request, KlentServis $model)
    {
        return $model->zakazayt($request);
    }

    public function zakazaytdok(Request $request, KlentServis $model)
    {
        return $model->zakazaytdok($request);
    }
}
