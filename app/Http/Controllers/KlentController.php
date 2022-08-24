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
use App\Models\Adressdok;
use App\Models\Arxiv;
use App\Models\Arxivdok;
use App\Models\Controltavar;
use App\Models\Deletkarzina;
use App\Models\Ichkitavardok;
use App\Models\Itogodok;
use App\Models\Javob;
use App\Models\Javobdok;
use App\Models\Karzina2;
use App\Models\Karzina2dok;
use App\Models\Karzina3;
use App\Models\Karzina3dok;
use App\Models\Karzinadok;
use App\Models\Pribl;
use App\Models\Pribldok;
use App\Models\Rasxod;
use App\Models\Rasxoddok;
use App\Models\Sqladpoytaxt;
use App\Models\Sqladpoytaxtdok;
use App\Models\Statistika;
use App\Models\Statistikadok;
use App\Models\Tavar2;
use App\Models\Tavar2dok;
use App\Models\Tavardok;
use App\Models\Tavarstatistika;
use App\Models\Tayyorsqlad;
use App\Models\Tayyorsqladdok;
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

    public function tavar_livedok(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data = DB::table('tavardoks')
            ->where('name', 'like', '%'.$query.'%')
            ->orderBy('id', 'DESC')
            ->get();
        }
        else
        {
        $data = DB::table('tavardoks')
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
                        <a href="javascript:void(0)" onclick="editPost2dok('.$row->id.')" style="color: green">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                            </svg>
                        </a>             
                        <a href="javascript:void(0)" onclick="deletePost2dok('.$row->id.')" class="mx-3" style="color: red">
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

    public function tavar2_livedok(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data =Tavar2dok::where('name', 'like', '%'.$query.'%')->orderBy('id', 'DESC')->get();
        }
        else
        {
        $data = Tavar2dok::orderBy('id', 'DESC')->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr style="border-bottom: 1px solid;">
                    <td>'.$row->tavardok->name.'</td>
                    <td>'.$row->name.'</td>
                    <td>
                        <a href="javascript:void(0)" onclick="editPost2dok('.$row->id.')" style="color: green">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                            </svg>
                        </a>             
                        <a href="javascript:void(0)" onclick="deletePost2dok('.$row->id.')" class="mx-3" style="color: red">
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

    public function live_adressdok(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data = Adressdok::where('adress', 'like', '%'.$query.'%')
            ->orderBy('id', 'DESC')
            ->get();
            
        }
        else
        {
        $data = Adressdok::orderBy('id', 'DESC')
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
                  <a href="javascript:void(0)" onclick="editPosts2dok('.$row->id .')" style="color: green">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                      <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                    </svg>
                  </a>                            
                  <a href="javascript:void(0)" onclick="deletePost2dok('.$row->id.')" class="mx-3" style="color: red">
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
        );

        echo json_encode($data);
        }
    }
    
    public function live_clentdok(Request $request)
    {
        $dt= Carbon::now('Asia/Tashkent');
        $data1 = $dt->toDateString();
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
                $arx = Arxivdok::where('userdok_id', $row->id)->where('karzs', ">", 0)->where('srok',"<=", $data1)->first();
                if($arx){
                    $foo ='<a href="javascript:void(0)" onclick="tolovdok('.$row->id.')" class="mx-3" style="color: blue">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-currency-exchange" viewBox="0 0 16 16">
                            <path d="M0 5a5.002 5.002 0 0 0 4.027 4.905 6.46 6.46 0 0 1 .544-2.073C3.695 7.536 3.132 6.864 3 5.91h-.5v-.426h.466V5.05c0-.046 0-.093.004-.135H2.5v-.427h.511C3.236 3.24 4.213 2.5 5.681 2.5c.316 0 .59.031.819.085v.733a3.46 3.46 0 0 0-.815-.082c-.919 0-1.538.466-1.734 1.252h1.917v.427h-1.98c-.003.046-.003.097-.003.147v.422h1.983v.427H3.93c.118.602.468 1.03 1.005 1.229a6.5 6.5 0 0 1 4.97-3.113A5.002 5.002 0 0 0 0 5zm16 5.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0zm-7.75 1.322c.069.835.746 1.485 1.964 1.562V14h.54v-.62c1.259-.086 1.996-.74 1.996-1.69 0-.865-.563-1.31-1.57-1.54l-.426-.1V8.374c.54.06.884.347.966.745h.948c-.07-.804-.779-1.433-1.914-1.502V7h-.54v.629c-1.076.103-1.808.732-1.808 1.622 0 .787.544 1.288 1.45 1.493l.358.085v1.78c-.554-.08-.92-.376-1.003-.787H8.25zm1.96-1.895c-.532-.12-.82-.364-.82-.732 0-.41.311-.719.824-.809v1.54h-.005zm.622 1.044c.645.145.943.38.943.796 0 .474-.37.8-1.02.86v-1.674l.077.018z"/>
                        </svg>
                    </a>';
                }else{
                    $foo ='<a href="javascript:void(0)" class="mx-3" style="color: black">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-currency-exchange" viewBox="0 0 16 16">
                            <path d="M0 5a5.002 5.002 0 0 0 4.027 4.905 6.46 6.46 0 0 1 .544-2.073C3.695 7.536 3.132 6.864 3 5.91h-.5v-.426h.466V5.05c0-.046 0-.093.004-.135H2.5v-.427h.511C3.236 3.24 4.213 2.5 5.681 2.5c.316 0 .59.031.819.085v.733a3.46 3.46 0 0 0-.815-.082c-.919 0-1.538.466-1.734 1.252h1.917v.427h-1.98c-.003.046-.003.097-.003.147v.422h1.983v.427H3.93c.118.602.468 1.03 1.005 1.229a6.5 6.5 0 0 1 4.97-3.113A5.002 5.002 0 0 0 0 5zm16 5.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0zm-7.75 1.322c.069.835.746 1.485 1.964 1.562V14h.54v-.62c1.259-.086 1.996-.74 1.996-1.69 0-.865-.563-1.31-1.57-1.54l-.426-.1V8.374c.54.06.884.347.966.745h.948c-.07-.804-.779-1.433-1.914-1.502V7h-.54v.629c-1.076.103-1.808.732-1.808 1.622 0 .787.544 1.288 1.45 1.493l.358.085v1.78c-.554-.08-.92-.376-1.003-.787H8.25zm1.96-1.895c-.532-.12-.82-.364-.82-.732 0-.41.311-.719.824-.809v1.54h-.005zm.622 1.044c.645.145.943.38.943.796 0 .474-.37.8-1.02.86v-1.674l.077.018z"/>
                        </svg>
                    </a>';
                }
                if($row->summa == 0){
                    $summa = '<a href="javascript:void(0)" onclick="sevdok('.$row->id.')" class="btn btn-danger p-1 m-0">
                    '.$row->summa.'
                    </a>';
                }else{
                    $summa = '<a href="javascript:void(0)" onclick="sevdok('.$row->id.')" class="btn btn-success p-1 m-0">
                    '.$row->summa.'
                    </a>'; 
                }
                $output .= '
                <tr id="row_'.$row->id.'" style="border-bottom: 1px solid;">
                <td>'.$row->name.'</td>
                <td>'.$row->tel.'</td>
                <td>'.$row->chatid.'</td>
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
                  '.$foo.'
                  '.$summa.'
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
        $dt= Carbon::now('Asia/Tashkent');
        $data1 = $dt->toDateString();
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data = DB::table('users')
            ->where('name', 'like', '%'.$query.'%')
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
                $arx = Arxiv::where('user_id', $row->id)->where('karzs', ">", 0)->where('srok',"<=", $data1)->first();
                if($arx){
                    $foo ='<a href="javascript:void(0)" onclick="tolov('.$row->id.')" class="mx-3" style="color: blue">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-currency-exchange" viewBox="0 0 16 16">
                            <path d="M0 5a5.002 5.002 0 0 0 4.027 4.905 6.46 6.46 0 0 1 .544-2.073C3.695 7.536 3.132 6.864 3 5.91h-.5v-.426h.466V5.05c0-.046 0-.093.004-.135H2.5v-.427h.511C3.236 3.24 4.213 2.5 5.681 2.5c.316 0 .59.031.819.085v.733a3.46 3.46 0 0 0-.815-.082c-.919 0-1.538.466-1.734 1.252h1.917v.427h-1.98c-.003.046-.003.097-.003.147v.422h1.983v.427H3.93c.118.602.468 1.03 1.005 1.229a6.5 6.5 0 0 1 4.97-3.113A5.002 5.002 0 0 0 0 5zm16 5.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0zm-7.75 1.322c.069.835.746 1.485 1.964 1.562V14h.54v-.62c1.259-.086 1.996-.74 1.996-1.69 0-.865-.563-1.31-1.57-1.54l-.426-.1V8.374c.54.06.884.347.966.745h.948c-.07-.804-.779-1.433-1.914-1.502V7h-.54v.629c-1.076.103-1.808.732-1.808 1.622 0 .787.544 1.288 1.45 1.493l.358.085v1.78c-.554-.08-.92-.376-1.003-.787H8.25zm1.96-1.895c-.532-.12-.82-.364-.82-.732 0-.41.311-.719.824-.809v1.54h-.005zm.622 1.044c.645.145.943.38.943.796 0 .474-.37.8-1.02.86v-1.674l.077.018z"/>
                        </svg>
                    </a>';
                }else{
                    $foo ='<a href="javascript:void(0)" class="mx-3" style="color: black">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-currency-exchange" viewBox="0 0 16 16">
                            <path d="M0 5a5.002 5.002 0 0 0 4.027 4.905 6.46 6.46 0 0 1 .544-2.073C3.695 7.536 3.132 6.864 3 5.91h-.5v-.426h.466V5.05c0-.046 0-.093.004-.135H2.5v-.427h.511C3.236 3.24 4.213 2.5 5.681 2.5c.316 0 .59.031.819.085v.733a3.46 3.46 0 0 0-.815-.082c-.919 0-1.538.466-1.734 1.252h1.917v.427h-1.98c-.003.046-.003.097-.003.147v.422h1.983v.427H3.93c.118.602.468 1.03 1.005 1.229a6.5 6.5 0 0 1 4.97-3.113A5.002 5.002 0 0 0 0 5zm16 5.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0zm-7.75 1.322c.069.835.746 1.485 1.964 1.562V14h.54v-.62c1.259-.086 1.996-.74 1.996-1.69 0-.865-.563-1.31-1.57-1.54l-.426-.1V8.374c.54.06.884.347.966.745h.948c-.07-.804-.779-1.433-1.914-1.502V7h-.54v.629c-1.076.103-1.808.732-1.808 1.622 0 .787.544 1.288 1.45 1.493l.358.085v1.78c-.554-.08-.92-.376-1.003-.787H8.25zm1.96-1.895c-.532-.12-.82-.364-.82-.732 0-.41.311-.719.824-.809v1.54h-.005zm.622 1.044c.645.145.943.38.943.796 0 .474-.37.8-1.02.86v-1.674l.077.018z"/>
                        </svg>
                    </a>';
                }
                if($row->summa == 0){
                    $summa = '<a href="javascript:void(0)" onclick="sev('.$row->id.')" class="btn btn-danger p-1 m-0">
                    '.$row->summa.'
                    </a>';
                }else{
                    $summa = '<a href="javascript:void(0)" onclick="sev('.$row->id.')" class="btn btn-success p-1 m-0">
                    '.$row->summa.'
                    </a>'; 
                }
                $output .= '
                <tr id="row_'.$row->id.'" style="border-bottom: 1px solid;">
                <td>'.$row->name.'</td>
                <td>'.$row->tel.'</td>
                <td>'.$row->chatid.'</td>
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
                  '.$foo.'
                  '.$summa.'
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
        $data2 = Tavardok::all();
        if(Session::has('IDIE')){
          $brends = Drektor::where('id','=',Session::get('IDIE'))->first();
          return view('tavartip',[
              'brends'=>$brends,
              'tovar'=>$data,
              'tovardok'=>$data2
          ]);
        }else{
            return redirect('/logaut');
        }
    }

    public function tidtolov(Request $request)
    {
        $dt= Carbon::now('Asia/Tashkent');
        $data1 = $dt->toDateString();
        $post = Arxiv::where('user_id', $request->id)->where('karzs', ">", 0)->where('srok', "<=", $data1)->first();    
        return response()->json($post);
    }

    public function tidtolovdok(Request $request)
    {
        $dt= Carbon::now('Asia/Tashkent');
        $data1 = $dt->toDateString();
        $post = Arxivdok::where('userdok_id', $request->id)->where('karzs', ">", 0)->where('srok', "<=", $data1)->first();    
        return response()->json($post);
    }

    public function tolash(Request $request)
    {
        $sta = Statistika::find(1);
        $fo = $request->karzs2 / 10;
        $ja = $sta->kassa + $request->karzs2 - $fo;
        $stat2 = $sta->foyda + $fo;
        $stat = $sta->pribl + $fo;
        Statistika::find(1)->update([
            "foyda"=>$stat2,
            "kassa"=>$ja,
            "pribl"=>$stat,
        ]);
        $arx = Arxiv::find($request->t_id2);
        $aaaa = $arx->itogs + $request->karzs2;
        $aaaa22 = $arx->karzs - $request->karzs2;
        Arxiv::find($request->t_id2)->update([
            "itogs"=>$aaaa,
            "karzs"=>$aaaa22,
            "srok"=>$request->datesrok
        ]);
        $javo = Javob::where('user_id', $request->id)->first();
        $javob2 = $javo->javob - $request->karzs2;
        Javob::where('user_id', $request->id)->update([
            'javob'=>$javob2
        ]);
        return response()->json(["msg"=>"Мувофакиятли туланди"]);
    }

    public function tolashdok(Request $request)
    {
        $sta = Statistikadok::find(1);
        $fo = $request->karzs2 / 10;
        $ja = $sta->kassa + $request->karzs2 - $fo;
        $stat2 = $sta->foyda + $fo;
        $stat = $sta->pribl + $fo;
        Statistikadok::find(1)->update([
            "foyda"=>$stat2,
            "kassa"=>$ja,
            "pribl"=>$stat,
        ]);
        $arx = Arxivdok::find($request->t_id2);
        $aaaa = $arx->itogs + $request->karzs2;
        $aaaa22 = $arx->karzs - $request->karzs2;
        Arxivdok::find($request->t_id2)->update([
            "itogs"=>$aaaa,
            "karzs"=>$aaaa22,
            "srok"=>$request->datesrok
        ]);
        $javo = Javobdok::where('userdok_id', $request->id)->first();
        $javob2 = $javo->javob - $request->karzs2;
        Javobdok::where('userdok_id', $request->id)->update([
            'javob'=>$javob2
        ]);
        return response()->json(["msg"=>"Мувофакиятли туланди"]);
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
                <td class="ui-widget-content">'.$row->count.'</td>
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

    public function store2dok(Request $request, KlentServis $model)
    {
        $validator = Validator::make($request->all(), [
            'addmore.*.name' => 'required',
        ]);
        if($validator->passes()){
            return $model->store2dok($request);
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

    public function store2tipdok(Request $request, KlentServis $model)
    {
        $validator = Validator::make($request->all(), [
            'addmore.*.tavardok_id' => 'required',
            'addmore.*.name' => 'required',
        ]);
        if($validator->passes()){
            return $model->store2tipdok($request);
        }else{            
            return response()->json(['code'=>0, 'msg'=>'Малумотлар толдирилмаган', 'error'=>$validator->errors()->toArray()]);
        }
    }

    public function show2(Request $request)
    {
        $post = Tavar2::find($request->id);
        return response()->json($post);
    }

    public function show2dok(Request $request)
    {
        $post = Tavar2dok::find($request->id);
        return response()->json($post);
    }

    public function shower2($id)
    {
        $post = Tavar::find($id);    
        return response()->json($post);
    }

    public function shower2dok($id)
    {
        $post = Tavardok::find($id);    
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

    public function update2dok(Request $request, KlentServis $model)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if($validator->passes()){
            return $model->update2dok($request);
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

    public function updateer2dok(Request $request, KlentServis $model)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if($validator->passes()){
            return $model->updateer2dok($request);
        }else{            
            return response()->json(['code'=>0, 'msg'=>'Малумот киритилмади', 'error'=>$validator->errors()->toArray()]);
        }
    }

    public function delete2($id)
    {
        Tavar2::find($id)->delete($id);
        Tavar2dok::find($id)->delete($id);
        return response()->json(['msg'=>'Мувофакиятли очирилди']);
    }

    
    public function delete2dok($id)
    {
        Tavar2dok::find($id)->delete($id);
        Tavar2::find($id)->delete($id);
        return response()->json(['msg'=>'Мувофакиятли очирилди']);
    }
    
    
    public function deleteer2($id)
    {
        Tavar::find($id)->delete($id);
        Tavardok::find($id)->delete($id);
        return response()->json(['msg'=>'Мувофакиятли очирилди']);
    }

    public function deleteer2dok($id)
    {
        Tavardok::find($id)->delete($id);
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
            'addmore.*.tavardok_id' => 'required',
            'addmore.*.adress' => 'nullable',
            'addmore.*.tavar2dok_id' => 'required',
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
            'tavardok_id' => 'required',
            'adress' => 'nullable',
            'tavar2dok_id' => 'required',
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

    public function pastavkadok(Request $request, KlentServis $model)
    {
        $validator = Validator::make($request->all(), [
            'addmore.*.adress' => 'required',
        ]);
        if($validator->passes()){
            return $model->pastavkadok($request);
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

    public function pastavkaupdatedok(Request $request, KlentServis $model)
    {
        return $model->pastavkaupdatedok($request);
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
            if($row->status == 0){
                $a ='<td style="color:#ff0c17">'.$row->name.'</td>';
                $a1 ='<td style="color:#ff0c17">'.number_format($row->summa2, 3).'</td>';
                $a2 ='<td style="color:#ff0c17">'.$row->soni.'</td>';
                $a3 ='<td style="color:#ff0c17">'.$row->chegirma.'</td>';
                $a4 ='<td style="color:#ff0c17">'.number_format($row->itog, 3).'</td>';
                $a5 ='<td style="color:#ff0c17">'.$row->hajm.'</td>';      
            }else{
                $a ='<td style="color: #0000bf">'.$row->name.'</td>';
                $a1 ='<td style="color: #0000bf">'.number_format($row->summa2, 3).'</td>';
                $a2 ='<td style="color: #0000bf">'.$row->soni.'</td>';
                $a3 ='<td style="color: #0000bf">'.$row->chegirma.'</td>';
                $a4 ='<td style="color: #0000bf">'.number_format($row->itog, 3).'</td>';
                $a5 ='<td style="color: #0000bf">'.$row->hajm.'</td>';
            }
           $output .= '
            <tr onclick="belgilashdok('.$row->id.')" style="border-bottom: 1px solid;">  
                '.$a.'
                '.$a1.'
                '.$a2.'
                '.$a3.'
                '.$a4.'
                '.$a5.'
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
            if($row->status == 0){
                $a ='<td style="color:#ff0c17">'.$row->name.'</td>';
                $a1 ='<td style="color:#ff0c17">'.number_format($row->summa2, 3).'</td>';
                $a2 ='<td style="color:#ff0c17">'.$row->soni.'</td>';
                $a3 ='<td style="color:#ff0c17">'.$row->chegirma.'</td>';
                $a4 ='<td style="color:#ff0c17">'.number_format($row->itog, 3).'</td>';
                $a5 ='<td style="color:#ff0c17">'.$row->hajm.'</td>';      
            }else{
                $a ='<td style="color: #0000bf">'.$row->name.'</td>';
                $a1 ='<td style="color: #0000bf">'.number_format($row->summa2, 3).'</td>';
                $a2 ='<td style="color: #0000bf">'.$row->soni.'</td>';
                $a3 ='<td style="color: #0000bf">'.$row->chegirma.'</td>';
                $a4 ='<td style="color: #0000bf">'.number_format($row->itog, 3).'</td>';
                $a5 ='<td style="color: #0000bf">'.$row->hajm.'</td>';
            }
           $output .= '
           <tr onclick="belgilash('.$row->id.')" style="border-bottom: 1px solid;">  
            '.$a.'
            '.$a1.'
            '.$a2.'
            '.$a3.'
            '.$a4.'
            '.$a5.'
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

    function sqladiskizapasdok(Request $request)
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
                <tr data-id="'.$row->id.'" id="datadok" style="border-bottom: 1px solid;">
                <td>'.$row->tavardok->name.'</td>
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
    function sqladiskizapas2dok(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data = Sqladpoytaxtdok::where('name', 'like', '%'.$query.'%')->orderBy('id', 'DESC')->get();            
        }
        else
        {
        $data = Sqladpoytaxtdok::orderBy('id', 'DESC')->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr data-id="'.$row->id.'" id="asdsaddok" style="border-bottom: 1px solid;">
                <td>'.$row->tavardok->name.'</td>
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
    function tbody3tabledok(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
            $data = Tayyorsqladdok::where('name', 'like', '%'.$query.'%')->orderBy('id', 'DESC')->get();            
        }
        else
        {
        $data = Tayyorsqladdok::orderBy('id', 'DESC')->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr data-id="'.$row->id.'" id="asdsaddok" style="border-bottom: 1px solid;">
                <td>'.$row->tavardok->name.'</td>
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
    public function tbody3table2dok(Request $request)
    {
        if($request->ajax())
        {
            $output = ''; 
            $data = Tayyorsqladdok::whereBetween('updated_at', [$request->date1, $request->date2])->get(); 
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
                    <tr data-id="'.$row->id.'" id="asdsaddok" style="border-bottom: 1px solid;">
                    <td>'.$row->tavardok->name.'</td>
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

    public function bot(Request $request, KlentServis $model)
    {
        return $model->bot($request);
    }

    public function botdok(Request $request, KlentServis $model)
    {
        return $model->botdok($request);
    }

    public function bot2()
    {
        $data = Karzina::all();
        return response()->json(['context'=>$data]);
    }

    public function bot2dok()
    {
        $data = Karzinadok::all();
        return response()->json(['context'=>$data]);
    }
    
    public function zakazayt(Request $request, KlentServis $model)
    {
        return $model->zakazayt($request);
    }

    public function zakazaytdok(Request $request, KlentServis $model)
    {
        return $model->zakazaytdok($request);
    }

    public function chd()
    {
        $data = Karzina2::where('status', 1)->get();
        return response()->json($data);
    }

    public function chd2()
    {
        Karzina2::where('status', 1)->update([
            'status' => 0
        ]);
    }

    public function chb()
    {
        $data = Karzina3::where('status', 1)->get();
        return response()->json($data);
    }

    public function chb2()
    {
        Karzina3::where('status', 1)->update([
            'status' => 0
        ]);
    }

    public function otmetka(Request $request)
    {
        $data = Karzina2::find($request->id);
        if($data->status == 1){
            $data->status = 0;
            $data->update();
            return response()->json(0);

        }else{
            $data->status = 1;
            $data->update();
            return response()->json(1);
        }
    }

    public function otmetka2(Request $request)
    {
        $data = Karzina3::find($request->id);
        if($data->status == 1){
            $data->status = 0;
            $data->update();
            return response()->json(0);

        }else{
            $data->status = 1;
            $data->update();
            return response()->json(1);
        }
    }

    public function chddok()
    {
        $data = Karzina2dok::where('status', 1)->get();
        return response()->json($data);
    }

    public function chd2dok()
    {
        Karzina2dok::where('status', 1)->update([
            'status' => 0
        ]);
    }

    public function chbdok()
    {
        $data = Karzina3dok::where('status', 1)->get();
        return response()->json($data);
    }

    public function chb2dok()
    {
        Karzina3dok::where('status', 1)->update([
            'status' => 0
        ]);
    }

    public function otmetkadok(Request $request)
    {
        $data = Karzina2dok::find($request->id);
        if($data->status == 1){
            $data->status = 0;
            $data->update();
            return response()->json(0);

        }else{
            $data->status = 1;
            $data->update();
            return response()->json(1);
        }
    }

    public function otmetka2dok(Request $request)
    {
        $data = Karzina3dok::find($request->id);
        if($data->status == 1){
            $data->status = 0;
            $data->update();
            return response()->json(0);

        }else{
            $data->status = 1;
            $data->update();
            return response()->json(1);
        }
    }

    public function pribl()
    {
        if(Session::has('IDIE')){
            $brends = Drektor::where('id','=',Session::get('IDIE'))->first();
            return view('pribl',[
                'brends'=>$brends,
            ]);
        }else{
            return redirect('/logaut');
        }
    }

    public function getel(Request $request)
    {
        if($request->data2){
            return  $this->getel1($request);
        }else{
            return  $this->getel2($request);
        }
    }
    public function getel1($request)
    {
        if($request->ajax())
        {
            $output = '';
            $output2 = '';
            $ichki = Ichkitavar::all();
            $data = Karzina2::whereBetween("created_at", [$request->data, $request->data2])->get();
            $data2 = Karzina3::whereBetween("created_at", [$request->data, $request->data2])->get();
            $data222 = Arxiv::whereBetween("created_at", [$request->data, $request->data2])->get();
            $ras = Rasxod::whereBetween("created_at", [$request->data, $request->data2])->get();
            $foo = Pribl::find(1);
            if($foo){
                $foo->jami = 0;
                $foo->karz = 0;
                $foo->pribl = 0;
                $foo->vse = 0;
                $foo->rasxod = 0;
                $foo->save();
                foreach ($ichki as $value) {
                    $foo1 = Pribl::find(1);
                    $foo1->vse = $foo1->vse + $value->hajm * $value->summa;
                    $foo1->update();
                }
                foreach ($data as $value) {
                    $ich = Ichkitavar::find($value->ichkitavar_id);
                    $foo2 = Pribl::find(1);
                    $foo2->pribl = $foo2->pribl + $ich->summa * $value->soni;
                    $foo2->jami = $foo2->jami + $value->itog;
                    $foo2->update();
                }
                foreach ($data2 as $value) {
                    $ich2 = Ichkitavar::find($value->ichkitavar_id);
                    $foo2 = Pribl::find(1);
                    $foo2->pribl = $foo2->pribl + $ich2->summa * $value->soni;
                    $foo2->jami = $foo2->jami + $value->itog;
                    $foo2->update();
                }
                foreach ($data222 as $value) {
                    $foo3 = Pribl::find(1);
                    $foo3->karz = $foo3->karz + $value->karzs;
                    $foo3->update();                    
                }
                foreach ($ras as $value) {
                    $foo4 = Pribl::find(1);
                    $foo4->rasxod = $foo4->rasxod + $value->rasxod;
                    $foo4->update();
                }
                foreach($data as $row)
                {
                    $output .= '
                    <tr style="border-bottom: 1px solid; color: #006200">
                        <td>'.$row->clentra.'</td>
                        <td>'.$row->name.'</td>
                        <td>'.$row->soni.'</td>
                        <td>'.$row->summa2.'</td>
                        <td>'.$row->itog.'</td>
                    </tr>
                    ';
                }
                foreach($data2 as $row)
                {
                    $output2 .= '
                    <tr style="border-bottom: 1px solid; color: #b90404">
                        <td>Бирламчи мижоз</td>
                        <td>'.$row->name.'</td>
                        <td>'.$row->soni.'</td>
                        <td>'.$row->summa2.'</td>
                        <td>'.$row->itog.'</td>
                    </tr>
                    ';
                }
            }else{
                Pribl::create([
                    'jami'=>0,
                    'karz'=>0,
                    'pribl'=>0,
                    'vse'=>0,
                    'rasxod'=>0
                ]);
                foreach ($ichki as $value) {
                    $foo1 = Pribl::find(1);
                    $foo1->vse = $foo1->vse + $value->hajm * $value->summa;
                    $foo1->update();
                }
                foreach ($data as $value) {
                    $ich3 = Ichkitavar::find($value->ichkitavar_id);
                    $foo2 = Pribl::find(1);
                    $foo2->pribl = $foo2->pribl + $ich3->summa * $value->soni;
                    $foo2->jami = $foo2->jami + $value->itog;
                    $foo2->update();
                }
                foreach ($data2 as $value) {
                    $ich4 = Ichkitavar::find($value->ichkitavar_id);
                    $foo2 = Pribl::find(1);
                    $foo2->pribl = $foo2->pribl + $ich4->summa * $value->soni;
                    $foo2->jami = $foo2->jami + $value->itog;
                    $foo2->update();
                }
                foreach ($data222 as $value) {
                    $foo3 = Pribl::find(1);
                    $foo3->karz = $foo3->karz + $value->karzs;
                    $foo3->update();                    
                }
                foreach ($ras as $value) {
                    $foo4 = Pribl::find(1);
                    $foo4->rasxod = $foo4->rasxod + $value->rasxod;
                    $foo4->update();
                }
                foreach($data as $row)
                {
                    $output .= '
                    <tr style="border-bottom: 1px solid; color: #006200">
                        <td>'.$row->clentra.'</td>
                        <td>'.$row->name.'</td>
                        <td>'.$row->soni.'</td>
                        <td>'.$row->summa2.'</td>
                        <td>'.$row->itog.'</td>
                    </tr>
                    ';
                }
                foreach($data2 as $row)
                {
                    $output2 .= '
                    <tr style="border-bottom: 1px solid; color: #b90404">
                        <td>Бирламчи мижоз</td>
                        <td>'.$row->name.'</td>
                        <td>'.$row->soni.'</td>
                        <td>'.$row->summa2.'</td>
                        <td>'.$row->itog.'</td>
                    </tr>
                    ';
                }
            }
            $foo5 = Pribl::find(1);
            $fo = $foo5->jami - $foo5->pribl;
            $f = $fo - $foo5->rasxod;
            $foo5->pribl = $f - $foo5->karz;
            $foo5->update();
            return response()->json([
                'data'=>$foo5??[],
                'output'=>$output,
                'output2'=>$output2,                
            ]);
        }
    }
    public function getel2($request)
    {
        if($request->ajax())
        {
            $ichki = Ichkitavar::all();
            $kar2 = Karzina2::all();
            $kar3 = Karzina3::all();
            $arx = Arxiv::all();
            $ras = Rasxod::all();
            $foo = Pribl::find(1);
            if($foo){
                $foo->jami = 0;
                $foo->karz = 0;
                $foo->pribl = 0;
                $foo->vse = 0;
                $foo->rasxod = 0;
                $foo->save();
                foreach ($ichki as $value) {
                    $foo1 = Pribl::find(1);
                    $foo1->vse = $foo1->vse + $value->hajm * $value->summa;
                    $foo1->update();
                }
                foreach ($kar2 as $value) {
                    $ich = Ichkitavar::find($value->ichkitavar_id);
                    $foo2 = Pribl::find(1);
                    $foo2->pribl = $foo2->pribl + $ich->summa * $value->soni;
                    $foo2->jami = $foo2->jami + $value->itog;
                    $foo2->update();
                }
                foreach ($kar3 as $value) {
                    $ich2 = Ichkitavar::find($value->ichkitavar_id);
                    $foo2 = Pribl::find(1);
                    $foo2->pribl = $foo2->pribl + $ich2->summa * $value->soni;
                    $foo2->jami = $foo2->jami + $value->itog;
                    $foo2->update();
                }
                foreach ($arx as $value) {
                    $foo3 = Pribl::find(1);
                    $foo3->karz = $foo3->karz + $value->karzs;
                    $foo3->update();                    
                }
                foreach ($ras as $value) {
                    $foo4 = Pribl::find(1);
                    $foo4->rasxod = $foo4->rasxod + $value->rasxod;
                    $foo4->update();
                }
            }else{
                Pribl::create([
                    'jami'=>0,
                    'karz'=>0,
                    'pribl'=>0,
                    'vse'=>0,
                    'rasxod'=>0
                ]);
                foreach ($ichki as $value) {
                    $foo1 = Pribl::find(1);
                    $foo1->vse = $foo1->vse + $value->hajm * $value->summa;
                    $foo1->update();
                }
                foreach ($kar2 as $value) {
                    $ich3 = Ichkitavar::find($value->ichkitavar_id);
                    $foo2 = Pribl::find(1);
                    $foo2->pribl = $foo2->pribl + $ich3->summa * $value->soni;
                    $foo2->jami = $foo2->jami + $value->itog;
                    $foo2->update();
                }
                foreach ($kar3 as $value) {
                    $ich4 = Ichkitavar::find($value->ichkitavar_id);
                    $foo2 = Pribl::find(1);
                    $foo2->pribl = $foo2->pribl + $ich4->summa * $value->soni;
                    $foo2->jami = $foo2->jami + $value->itog;
                    $foo2->update();
                }
                foreach ($arx as $value) {
                    $foo3 = Pribl::find(1);
                    $foo3->karz = $foo3->karz + $value->karzs;
                    $foo3->update();                    
                }
                foreach ($ras as $value) {
                    $foo4 = Pribl::find(1);
                    $foo4->rasxod = $foo4->rasxod + $value->rasxod;
                    $foo4->update();
                }
            }
            $foo5 = Pribl::find(1);
            $fo = $foo5->jami - $foo5->pribl;
            $f = $fo - $foo5->rasxod;
            $foo5->pribl = $f - $foo5->karz;
            $foo5->update();
            return response()->json([
                'data'=>$foo5??[],
            ]);
        }
    }

    public function geteldok(Request $request)
    {
        if($request->data2){
            return  $this->getel1dok($request);
        }else{
            return  $this->getel2dok($request);
        }
    }
    public function getel1dok($request)
    {
        if($request->ajax())
        {
            $output = '';
            $output2 = '';
            $ichki = Ichkitavardok::all();
            $data = Karzina2dok::whereBetween("created_at", [$request->data, $request->data2])->get();
            $data2 = Karzina3dok::whereBetween("created_at", [$request->data, $request->data2])->get();
            $data222 = Arxivdok::whereBetween("created_at", [$request->data, $request->data2])->get();
            $ras = Rasxoddok::whereBetween("created_at", [$request->data, $request->data2])->get();
            $foo = Pribldok::find(1);
            if($foo){
                $foo->jami = 0;
                $foo->karz = 0;
                $foo->pribl = 0;
                $foo->vse = 0;
                $foo->rasxod = 0;
                $foo->save();
                foreach ($ichki as $value) {
                    $foo1 = Pribldok::find(1);
                    $foo1->vse = $foo1->vse + $value->hajm * $value->summa;
                    $foo1->update();
                }
                foreach ($data as $value) {
                    $ich = Ichkitavardok::find($value->ichkitavardok_id);
                    $foo2 = Pribldok::find(1);
                    $foo2->pribl = $foo2->pribl + $ich->summa * $value->soni;
                    $foo2->jami = $foo2->jami + $value->itog;
                    $foo2->update();
                }
                foreach ($data2 as $value) {
                    $ich2 = Ichkitavardok::find($value->ichkitavardok_id);
                    $foo2 = Pribldok::find(1);
                    $foo2->pribl = $foo2->pribl + $ich2->summa * $value->soni;
                    $foo2->jami = $foo2->jami + $value->itog;
                    $foo2->update();
                }
                foreach ($data222 as $value) {
                    $foo3 = Pribldok::find(1);
                    $foo3->karz = $foo3->karz + $value->karzs;
                    $foo3->update();                    
                }
                foreach ($ras as $value) {
                    $foo4 = Pribldok::find(1);
                    $foo4->rasxod = $foo4->rasxod + $value->rasxod;
                    $foo4->update();
                }
                foreach($data as $row)
                {
                    $output .= '
                    <tr style="border-bottom: 1px solid; color: #006200">
                        <td>'.$row->userdok->name.'</td>
                        <td>'.$row->name.'</td>
                        <td>'.$row->soni.'</td>
                        <td>'.$row->summa2.'</td>
                        <td>'.$row->itog.'</td>
                    </tr>
                    ';
                }
                foreach($data2 as $row)
                {
                    $output2 .= '
                    <tr style="border-bottom: 1px solid; color: #b90404">
                        <td>Бирламчи мижоз</td>
                        <td>'.$row->name.'</td>
                        <td>'.$row->soni.'</td>
                        <td>'.$row->summa2.'</td>
                        <td>'.$row->itog.'</td>
                    </tr>
                    ';
                }
            }else{
                Pribldok::create([
                    'jami'=>0,
                    'karz'=>0,
                    'pribl'=>0,
                    'vse'=>0,
                    'rasxod'=>0
                ]);
                foreach ($ichki as $value) {
                    $foo1 = Pribldok::find(1);
                    $foo1->vse = $foo1->vse + $value->hajm * $value->summa;
                    $foo1->update();
                }
                foreach ($data as $value) {
                    $ich3 = Ichkitavardok::find($value->ichkitavardok_id);
                    $foo2 = Pribldok::find(1);
                    $foo2->pribl = $foo2->pribl + $ich3->summa * $value->soni;
                    $foo2->jami = $foo2->jami + $value->itog;
                    $foo2->update();
                }
                foreach ($data2 as $value) {
                    $ich4 = Ichkitavardok::find($value->ichkitavardok_id);
                    $foo2 = Pribldok::find(1);
                    $foo2->pribl = $foo2->pribl + $ich4->summa * $value->soni;
                    $foo2->jami = $foo2->jami + $value->itog;
                    $foo2->update();
                }
                foreach ($data222 as $value) {
                    $foo3 = Pribldok::find(1);
                    $foo3->karz = $foo3->karz + $value->karzs;
                    $foo3->update();                    
                }
                foreach ($ras as $value) {
                    $foo4 = Pribldok::find(1);
                    $foo4->rasxod = $foo4->rasxod + $value->rasxod;
                    $foo4->update();
                }
                foreach($data as $row)
                {
                    $output .= '
                    <tr style="border-bottom: 1px solid; color: #006200"">
                    <td>'.$row->userdok->name.'</td>
                        <td>'.$row->name.'</td>
                        <td>'.$row->soni.'</td>
                        <td>'.$row->summa2.'</td>
                        <td>'.$row->itog.'</td>
                    </tr>
                    ';
                }
                foreach($data2 as $row)
                {
                    $output2 .= '
                    <tr style="border-bottom: 1px solid; color: #b90404">
                        <td>Бирламчи мижоз</td>
                        <td>'.$row->name.'</td>
                        <td>'.$row->soni.'</td>
                        <td>'.$row->summa2.'</td>
                        <td>'.$row->itog.'</td>
                    </tr>
                    ';
                }
            }
            $foo5 = Pribldok::find(1);
            $fo = $foo5->jami - $foo5->pribl;
            $f = $fo - $foo5->rasxod;
            $foo5->pribl = $f - $foo5->karz;
            $foo5->update();
            return response()->json([
                'data'=>$foo5??[],
                'output'=>$output,
                'output2'=>$output2,
            ]);
        }
    }
    public function getel2dok($request)
    {
        if($request->ajax())
        {
            $ichki = Ichkitavardok::all();
            $kar2 = Karzina2dok::all();
            $kar3 = Karzina3dok::all();
            $arx = Arxivdok::all();
            $ras = Rasxoddok::all();
            $foo = Pribldok::find(1);
            if($foo){
                $foo->jami = 0;
                $foo->karz = 0;
                $foo->pribl = 0;
                $foo->vse = 0;
                $foo->rasxod = 0;
                $foo->save();
                foreach ($ichki as $value) {
                    $foo1 = Pribldok::find(1);
                    $foo1->vse = $foo1->vse + $value->hajm * $value->summa;
                    $foo1->update();
                }
                foreach ($kar2 as $value) {
                    $ich = Ichkitavardok::find($value->ichkitavardok_id);
                    $foo2 = Pribldok::find(1);
                    $foo2->pribl = $foo2->pribl + $ich->summa * $value->soni;
                    $foo2->jami = $foo2->jami + $value->itog;
                    $foo2->update();
                }
                foreach ($kar3 as $value) {
                    $ich2 = Ichkitavardok::find($value->ichkitavardok_id);
                    $foo2 = Pribldok::find(1);
                    $foo2->pribl = $foo2->pribl + $ich2->summa * $value->soni;
                    $foo2->jami = $foo2->jami + $value->itog;
                    $foo2->update();
                }
                foreach ($arx as $value) {
                    $foo3 = Pribldok::find(1);
                    $foo3->karz = $foo3->karz + $value->karzs;
                    $foo3->update();                    
                }
                foreach ($ras as $value) {
                    $foo4 = Pribldok::find(1);
                    $foo4->rasxod = $foo4->rasxod + $value->rasxod;
                    $foo4->update();
                }
            }else{
                Pribldok::create([
                    'jami'=>0,
                    'karz'=>0,
                    'pribl'=>0,
                    'vse'=>0,
                    'rasxod'=>0
                ]);
                foreach ($ichki as $value) {
                    $foo1 = Pribldok::find(1);
                    $foo1->vse = $foo1->vse + $value->hajm * $value->summa;
                    $foo1->update();
                }
                foreach ($kar2 as $value) {
                    $ich3 = Ichkitavardok::find($value->ichkitavardok_id);
                    $foo2 = Pribldok::find(1);
                    $foo2->pribl = $foo2->pribl + $ich3->summa * $value->soni;
                    $foo2->jami = $foo2->jami + $value->itog;
                    $foo2->update();
                }
                foreach ($kar3 as $value) {
                    $ich4 = Ichkitavardok::find($value->ichkitavardok_id);
                    $foo2 = Pribldok::find(1);
                    $foo2->pribl = $foo2->pribl + $ich4->summa * $value->soni;
                    $foo2->jami = $foo2->jami + $value->itog;
                    $foo2->update();
                }
                foreach ($arx as $value) {
                    $foo3 = Pribldok::find(1);
                    $foo3->karz = $foo3->karz + $value->karzs;
                    $foo3->update();                    
                }
                foreach ($ras as $value) {
                    $foo4 = Pribldok::find(1);
                    $foo4->rasxod = $foo4->rasxod + $value->rasxod;
                    $foo4->update();
                }
            }
            $foo5 = Pribldok::find(1);
            $fo = $foo5->jami - $foo5->pribl;
            $f = $fo - $foo5->rasxod;
            $foo5->pribl = $f - $foo5->karz;
            $foo5->update();
            return response()->json([
                'data'=>$foo5??[],
            ]);
        }
    }

    public function garizantal()
    {
        $data = Tavarstatistika::orderBy('summa', "DESC")->get();
        for ($i=0; $i < $data->count(); $i++) {
            if($i == 11){
            }else{
                $id = Controltavar::where('id', $i)->first();
                if($id){
                    $id->name = null;
                    $id->hajm = null;
                    $id->summa = null;
                    $id->update();
                    $id->name = $data[$i]["name"];
                    $id->hajm = $id->hajm + $data[$i]["hajm"];
                    $id->summa = $id->summa + $data[$i]["summa"];
                    $id->update();
                }else{
                    Controltavar::create([
                        'name'=>$data[$i]["name"],
                        'hajm'=>$data[$i]["hajm"],
                        'summa'=>$data[$i]["summa"],
                    ]);
                }
            }
        }
        $i = 0;
        Controltavar::where('id' ,">", 10)->delete();
        $a = Controltavar::find(1);
        $b = Controltavar::find(2);
        $c = Controltavar::find(3);
        $d = Controltavar::find(4);
        $e = Controltavar::find(5);
        $f = Controltavar::find(6);
        $g = Controltavar::find(7);
        $h = Controltavar::find(8);
        $i1 = Controltavar::find(9);
        $j = Controltavar::find(10);
        return response()->json([
           "label"=> $a->name, "y"=> (int)$a->summa??[], "gdp"=> (int)$a->summa??[],
           "label1"=> $b->name, "y1"=> (int)$b->summa??[], "gdp1"=> (int)$b->summa??[],
           "label2"=> $c->name, "y2"=> (int)$c->summa??[], "gdp2"=> (int)$c->summa??[],
           "label3"=> $d->name, "y3"=> (int)$d->summa??[], "gdp3"=> (int)$d->summa??[],
           "label4"=> $e->name, "y4"=> (int)$e->summa??[], "gdp4"=> (int)$e->summa??[],
           "label5"=> $f->name, "y5"=> (int)$f->summa??[], "gdp5"=> (int)$f->summa??[],
           "label6"=> $g->name, "y6"=> (int)$g->summa??[], "gdp6"=> (int)$g->summa??[],
           "label7"=> $h->name, "y7"=> (int)$h->summa??[], "gdp7"=> (int)$h->summa??[],
           "label8"=> $i1->name, "y8"=> (int)$i1->summa??[], "gdp8"=> (int)$i1->summa??[],
           "label9"=> $j->name, "y9"=> (int)$j->summa??[], "gdp9"=> (int)$j->summa??[],
        ]);
    }
}
