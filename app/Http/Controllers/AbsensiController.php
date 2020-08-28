<?php
/**['id_absensi', 'nama', 'alamat', 'hp', 'id-gol', 'status', 'id_absensi', 'ket_dos', 'rutinitas'];*/

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

use App\Absensi;
use App\Mengajar;
use Validator;
use routes;
use App\Http\Requests\AbsensiRequest;
use Illuminate\Support\Facades\DB;


class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $mengajar = Mengajar::all();
  

           return view('absensi')->with('mengajar', $mengajar);
           $absensi = Absensi::all();
        
           
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
    public function store(AbsensiRequest $request)
    
        
      {
        
        
        $data = [
        'id_absensi' => $request['id_absensi'],
        'id_mengajar' => $request['id_mengajar'],
        'tanggal' => $request['tanggal'],
       'hari' => $request['hari'],
       
   
        ];

       return Absensi::create($data);
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

        $absensi = Absensi::find($id);
        return $absensi;
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

        $absensi = Absensi::find($id);
        $absensi->id_mengajar=$request['id_mengajar'];
         $absensi->tanggal=$request['tanggal'];
          $absensi->hari=$request['hari'];

          
        $absensi->update();
        return $absensi;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
   {
    if($absensiDel = Absensi::destroy($id)){
            return ['success' =>  1];
        }else{
            return ['tidak success' =>  0];
        }
    }
     public function  apiAbsensi()
    {

//$user=\Auth::user();
          // $absensi = absensi::find($user->id);

    // $absensi = absensi::all();
       //$absensi= siswa::where('id','=',$id)->first();
  // $absensi = absensi::where('user_id','=',\Auth::user()->id)->with('kegiatan')->get();
      ///  $absensi = absensi::select('tanggal',DB::raw("(SUM(ns_siang)) as ns_siang"),DB::raw("(SUM(tkno_siang)) as tkno_siang"),DB::raw("(SUM(tamu_siang)) as tamu_siang"),DB::raw("(SUM(ss_malam)) as ss_malam"),DB::raw("(SUM(ns_malam)) as ns_malam"))->groupBy('tanggal')->get(); //pertanggal,
        $absensi = Absensi::with('absensi')->get();
        return DataTables::of($absensi)
            ->addColumn('action', function($absensi) {
                return  
                        '<a onclick="editForm('. $absensi->id_absensi .')" class=btn btn-primary btn-xs"> <i class="glyphicon glyphicon-edit"> </i> Edit </a>' .
                        
                        '<a onclick="deleteData('. $absensi->id_absensi .')" class=btn btn-danger btn-xs"> <i class="glyphicon glyphicon-trash"> </i> Delete </a>' ;

            })->make(true);
    }

    
}
