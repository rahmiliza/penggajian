<?php
/**['id_pajak', 'nama', 'alamat', 'hp', 'id-gol', 'status', 'id_pajak', 'ket_dos', 'rutinitas'];*/

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

use App\Pajak;
use App\Golongan;
use Validator;
use routes;
use App\Http\Requests\PajakRequest;
use Illuminate\Support\Facades\DB;


class PajakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $golongan = Golongan::all();
        
           return view('pajak')->with('gol', $golongan);
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
    public function store(pajakRequest $request)
    
        /**['id_pajak', 'nama', 'alamat', 'hp', 'id-gol', 'status', 'id_pajak', 'ket_dos', 'rutinitas'];*/
      {
        
        $data = [
        'id_gol' => $request['id_gol'],
        'pajak' => $request['pajak'],
       
   
        ];

       return Pajak::create($data);
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

        $pajak = Pajak::find($id);
        return $pajak;
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

        $pajak = Pajak::find($id);
            $pajak->id_gol=$request['id_gol'];
             $pajak->pajak=$request['pajak'];
          
        $pajak->update();
        return $pajak;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
   {
    if($pajakDel = Pajak::destroy($id)){
            return ['success' =>  1];
        }else{
            return ['tidak success' =>  0];
        }
    }
     public function  apiPajak()
    {

//$user=\Auth::user();
          // $pajak = pajak::find($user->id);

    // $pajak = pajak::all();
       //$pajak= siswa::where('id','=',$id)->first();
  // $pajak = pajak::where('user_id','=',\Auth::user()->id)->with('kegiatan')->get();
      ///  $pajak = pajak::select('tanggal',DB::raw("(SUM(ns_siang)) as ns_siang"),DB::raw("(SUM(tkno_siang)) as tkno_siang"),DB::raw("(SUM(tamu_siang)) as tamu_siang"),DB::raw("(SUM(ss_malam)) as ss_malam"),DB::raw("(SUM(ns_malam)) as ns_malam"))->groupBy('tanggal')->get(); //pertanggal,
        $pajak = Pajak::with('golongan')->get();
        return DataTables::of($pajak)
            ->addColumn('action', function($pajak) {
                return  
                        '<a onclick="editForm('. $pajak->id_pajak .')" class=btn btn-primary btn-xs"> <i class="glyphicon glyphicon-edit"> </i> Edit </a>' .
                        
                        '<a onclick="deleteData('. $pajak->id_pajak .')" class=btn btn-danger btn-xs"> <i class="glyphicon glyphicon-trash"> </i> Delete </a>' ;

            })->make(true);
    }

    
}
