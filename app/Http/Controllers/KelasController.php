<?php
/**['id_kelas', 'nama', 'alamat', 'hp', 'id-gol', 'status', 'id_kelas', 'ket_dos', 'rutinitas'];*/

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

use App\Kelas;

use Validator;
use routes;
use App\Http\Requests\KelasRequest;
use Illuminate\Support\Facades\DB;


class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           return view('kelas');
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
    public function store(KelasRequest $request)
    
        /**['id_kelas', 'nama', 'alamat', 'hp', 'id-gol', 'status', 'id_kelas', 'ket_dos', 'rutinitas'];*/
      {
        
        $data = [
        'kelas' => $request['kelas'],
       
   
        ];

       return kelas::create($data);
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

        $kelas = kelas::find($id);
        return $kelas;
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

        $kelas = Kelas::find($id);
            $kelas->kelas =$request['kelas'];
          
        $kelas->update();
        return $kelas;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
   {
    if($kelasDel = Kelas::destroy($id)){
            return ['success' =>  1];
        }else{
            return ['tidak success' =>  0];
        }
    }
     public function  apiKelas()
    {

//$user=\Auth::user();
          // $kelas = kelas::find($user->id);

     $kelas = Kelas::all();
       //$kelas= siswa::where('id','=',$id)->first();
  // $kelas = kelas::where('user_id','=',\Auth::user()->id)->with('kegiatan')->get();
      ///  $kelas = kelas::select('tanggal',DB::raw("(SUM(ns_siang)) as ns_siang"),DB::raw("(SUM(tkno_siang)) as tkno_siang"),DB::raw("(SUM(tamu_siang)) as tamu_siang"),DB::raw("(SUM(ss_malam)) as ss_malam"),DB::raw("(SUM(ns_malam)) as ns_malam"))->groupBy('tanggal')->get(); //pertanggal,
        return DataTables::of($kelas)
            ->addColumn('action', function($kelas) {
                return  
                        '<a onclick="editForm('. $kelas->id_kelas .')" class=btn btn-primary btn-xs"> <i class="glyphicon glyphicon-edit"> </i> Edit </a>' .
                        
                        '<a onclick="deleteData('. $kelas->id_kelas .')" class=btn btn-danger btn-xs"> <i class="glyphicon glyphicon-trash"> </i> Delete </a>' ;

            })->make(true);
    }

    
}
