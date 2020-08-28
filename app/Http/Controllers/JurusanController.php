<?php
/**['id_Jurusan', 'nama', 'alamat', 'hp', 'id-gol', 'status', 'id_Jurusan', 'ket_dos', 'rutinitas'];*/

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

use App\Jurusan;

use Validator;
use routes;
use App\Http\Requests\JurusanRequest;
use Illuminate\Support\Facades\DB;


class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           return view('jurusan');
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
    public function store(JurusanRequest $request)
    
        /**['id_Jurusan', 'nama', 'alamat', 'hp', 'id-gol', 'status', 'id_Jurusan', 'ket_dos', 'rutinitas'];*/
      {
        
        $data = [
        'jurusan' => $request['jurusan'],
       
   
        ];

       return Jurusan::create($data);
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

        $Jurusan = Jurusan::find($id);
        return $Jurusan;
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

        $Jurusan = Jurusan::find($id);
            $Jurusan->jurusan =$request['jurusan'];
          
        $Jurusan->update();
        return $Jurusan;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
   {
    if($JurusanDel = Jurusan::destroy($id)){
            return ['success' =>  1];
        }else{
            return ['tidak success' =>  0];
        }
    }
     public function  apiJurusan()
    {

//$user=\Auth::user();
          // $Jurusan = Jurusan::find($user->id);

     $Jurusan = Jurusan::all();
       //$Jurusan= siswa::where('id','=',$id)->first();
  // $Jurusan = Jurusan::where('user_id','=',\Auth::user()->id)->with('kegiatan')->get();
      ///  $Jurusan = Jurusan::select('tanggal',DB::raw("(SUM(ns_siang)) as ns_siang"),DB::raw("(SUM(tkno_siang)) as tkno_siang"),DB::raw("(SUM(tamu_siang)) as tamu_siang"),DB::raw("(SUM(ss_malam)) as ss_malam"),DB::raw("(SUM(ns_malam)) as ns_malam"))->groupBy('tanggal')->get(); //pertanggal,
        return DataTables::of($Jurusan)
            ->addColumn('action', function($Jurusan) {
                return  
                        '<a onclick="editForm('. $Jurusan->id_jurusan .')" class=btn btn-primary btn-xs"> <i class="glyphicon glyphicon-edit"> </i> Edit </a>' .
                        
                        '<a onclick="deleteData('. $Jurusan->id_jurusan .')" class=btn btn-danger btn-xs"> <i class="glyphicon glyphicon-trash"> </i> Delete </a>' ;

            })->make(true);
    }

    
}
