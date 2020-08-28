<?php
/**['id_Pangkat', 'nama', 'alamat', 'hp', 'id-gol', 'status', 'id_pangkat', 'ket_dos', 'rutinitas'];*/

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

use App\Pangkat;

use Validator;
use routes;
use App\Http\Requests\PangkatRequest;
use Illuminate\Support\Facades\DB;


class PangkatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           return view('pangkat');
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
    public function store(PangkatRequest $request)
    
        /**['id_Pangkat', 'nama', 'alamat', 'hp', 'id-gol', 'status', 'id_pangkat', 'ket_dos', 'rutinitas'];*/
      {
        
        $data = [
        'pangkat' => $request['pangkat'],
       
   
        ];

       return Pangkat::create($data);
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

        $Pangkat = Pangkat::find($id);
        return $Pangkat;
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

        $Pangkat = Pangkat::find($id);
            $Pangkat->pangkat =$request['pangkat'];
          
        $Pangkat->update();
        return $Pangkat;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
   {
    if($PangkatDel = Pangkat::destroy($id)){
            return ['success' =>  1];
        }else{
            return ['tidak success' =>  0];
        }
    }
     public function  apiPangkat()
    {

//$user=\Auth::user();
          // $Pangkat = Pangkat::find($user->id);

     $Pangkat = Pangkat::all();
       //$Pangkat= siswa::where('id','=',$id)->first();
  // $Pangkat = Pangkat::where('user_id','=',\Auth::user()->id)->with('kegiatan')->get();
      ///  $Pangkat = Pangkat::select('tanggal',DB::raw("(SUM(ns_siang)) as ns_siang"),DB::raw("(SUM(tkno_siang)) as tkno_siang"),DB::raw("(SUM(tamu_siang)) as tamu_siang"),DB::raw("(SUM(ss_malam)) as ss_malam"),DB::raw("(SUM(ns_malam)) as ns_malam"))->groupBy('tanggal')->get(); //pertanggal,
        return DataTables::of($Pangkat)
            ->addColumn('action', function($Pangkat) {
                return  
                        '<a onclick="editForm('. $Pangkat->id_pangkat .')" class=btn btn-primary btn-xs"> <i class="glyphicon glyphicon-edit"> </i> Edit </a>' .
                        
                        '<a onclick="deleteData('. $Pangkat->id_pangkat .')" class=btn btn-danger btn-xs"> <i class="glyphicon glyphicon-trash"> </i> Delete </a>' ;

            })->make(true);
    }

    
}
