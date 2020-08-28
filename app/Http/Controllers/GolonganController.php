<?php
/**['id_Golongan', 'nama', 'alamat', 'hp', 'id-gol', 'status', 'id_Golongan', 'ket_dos', 'rutinitas'];*/

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

use App\Golongan;

use Validator;
use routes;
use App\Http\Requests\GolonganRequest;
use Illuminate\Support\Facades\DB;


class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           return view('golongan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GolonganRequest $request)
    
        /**['id_Golongan', 'nama', 'alamat', 'hp', 'id-gol', 'status', 'id_Golongan', 'ket_dos', 'rutinitas'];*/
      {
        
        $data = [
        'golongan' => $request['golongan'],
       
   
        ];

       return Golongan::create($data);
    }

        

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $Golongan = Golongan::find($id);
        return $Golongan;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $Golongan = Golongan::find($id);
            $Golongan->golongan =$request['golongan'];
          
        $Golongan->update();
        return $Golongan;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
   {
    if($GolonganDel = Golongan::destroy($id)){
            return ['success' =>  1];
        }else{
            return ['tidak success' =>  0];
        }
    }
     public function  apiGolongan()
    {

//$user=\Auth::user();
          // $Golongan = Golongan::find($user->id);

     $Golongan = Golongan::all();
       //$Golongan= siswa::where('id','=',$id)->first();
  // $Golongan = Golongan::where('user_id','=',\Auth::user()->id)->with('kegiatan')->get();
      ///  $Golongan = Golongan::select('tanggal',DB::raw("(SUM(ns_siang)) as ns_siang"),DB::raw("(SUM(tkno_siang)) as tkno_siang"),DB::raw("(SUM(tamu_siang)) as tamu_siang"),DB::raw("(SUM(ss_malam)) as ss_malam"),DB::raw("(SUM(ns_malam)) as ns_malam"))->groupBy('tanggal')->get(); //pertanggal,
        return DataTables::of($Golongan)
            ->addColumn('action', function($Golongan) {
                return  
                        '<a onclick="editForm('. $Golongan->id_golongan .')" class=btn btn-primary btn-xs"> <i class="glyphicon glyphicon-edit"> </i> Edit </a>' .
                        
                        '<a onclick="deleteData('. $Golongan->id_golongan .')" class=btn btn-danger btn-xs"> <i class="glyphicon glyphicon-trash"> </i> Delete </a>' ;

            })->make(true);
    }

    
}
