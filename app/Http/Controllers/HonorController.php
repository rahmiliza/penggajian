<?php
/**['id_honor', 'nama', 'alamat', 'hp', 'id-gol', 'status', 'id_honor', 'ket_dos', 'rutinitas'];*/

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

use App\Honor;
use App\Pangkat;
use Validator;
use routes;
use App\Http\Requests\HonorRequest;
use Illuminate\Support\Facades\DB;


class HonorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $pangkat = Pangkat::all();
        
           return view('honor')->with('pangkat', $pangkat);
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
    public function store(HonorRequest $request)
    
        /**['id_honor', 'nama', 'alamat', 'hp', 'id-gol', 'status', 'id_honor', 'ket_dos', 'rutinitas'];*/
      {
        
        $data = [
      
        'id_pangkat' => $request['id_pangkat'],
        'honor' => $request['honor'],
       
   
        ];

       return honor::create($data);
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

        $honor =Honor::find($id);
        return $honor;
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

        $honor = Honor::find($id);
            $honor->id_pangkat=$request['id_pangkat'];
             $honor->honor=$request['honor'];
          
        $honor->update();
        return $honor;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
   {
    if($honorDel = Honor::destroy($id)){
            return ['success' =>  1];
        }else{
            return ['tidak success' =>  0];
        }
    }
     public function  apiHonor()
    {

//$user=\Auth::user();
          // $honor = honor::find($user->id);

    // $honor = honor::all();
       //$honor= siswa::where('id','=',$id)->first();
  // $honor = honor::where('user_id','=',\Auth::user()->id)->with('kegiatan')->get();
      ///  $honor = honor::select('tanggal',DB::raw("(SUM(ns_siang)) as ns_siang"),DB::raw("(SUM(tkno_siang)) as tkno_siang"),DB::raw("(SUM(tamu_siang)) as tamu_siang"),DB::raw("(SUM(ss_malam)) as ss_malam"),DB::raw("(SUM(ns_malam)) as ns_malam"))->groupBy('tanggal')->get(); //pertanggal,
        $honor = Honor::with('pangkat')->get();
        return DataTables::of($honor)
            ->addColumn('action', function($honor) {
                return  
                        '<a onclick="editForm('. $honor->id_honor .')" class=btn btn-primary btn-xs"> <i class="glyphicon glyphicon-edit"> </i> Edit </a>' .
                        
                        '<a onclick="deleteData('. $honor->id_honor .')" class=btn btn-danger btn-xs"> <i class="glyphicon glyphicon-trash"> </i> Delete </a>' ;

            })->make(true);
    }

    
}
