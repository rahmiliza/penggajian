<?php
/**['id_mk', 'nama', 'alamat', 'hp', 'id-gol', 'status', 'id_mk', 'ket_dos', 'rutinitas'];*/

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

use App\mk;

use Validator;
use routes;
use App\Http\Requests\MkRequest;
use Illuminate\Support\Facades\DB;


class MkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           return view('mk');
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
    public function store(MkRequest $request)
    
        /**['id_mk', 'nama', 'alamat', 'hp', 'id-gol', 'status', 'id_mk', 'ket_dos', 'rutinitas'];*/
      {
        
        $data = [
        'matkul' => $request['matkul'],
        'sks' => $request['sks'],
        'smt' => $request['smt'],
       
   
        ];

       return Mk::create($data);
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

        $mk = Mk::find($id);
        return $mk;
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

        $mk = Mk::find($id);
            $mk->matkul =$request['matkul'];
            $mk->sks =$request['sks'];
            $mk->smt =$request['smt'];
          
        $mk->update();
        return $mk;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
   {
    if($mkDel = Mk::destroy($id)){
            return ['success' =>  1];
        }else{
            return ['tidak success' =>  0];
        }
    }
     public function  apiMk()
    {

//$user=\Auth::user();
          // $mk = mk::find($user->id);

     $mk = Mk::all();
       //$mk= siswa::where('id','=',$id)->first();
  // $mk = mk::where('user_id','=',\Auth::user()->id)->with('kegiatan')->get();
      ///  $mk = mk::select('tanggal',DB::raw("(SUM(ns_siang)) as ns_siang"),DB::raw("(SUM(tkno_siang)) as tkno_siang"),DB::raw("(SUM(tamu_siang)) as tamu_siang"),DB::raw("(SUM(ss_malam)) as ss_malam"),DB::raw("(SUM(ns_malam)) as ns_malam"))->groupBy('tanggal')->get(); //pertanggal,
        return DataTables::of($mk)
            ->addColumn('action', function($mk) {
                return  
                        '<a onclick="editForm('. $mk->kode_mk .')" class=btn btn-primary btn-xs"> <i class="glyphicon glyphicon-edit"> </i> Edit </a>' .
                        
                        '<a onclick="deleteData('. $mk->kode_mk .')" class=btn btn-danger btn-xs"> <i class="glyphicon glyphicon-trash"> </i> Delete </a>' ;

            })->make(true);
    }

    
}
