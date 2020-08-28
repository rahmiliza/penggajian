<?php
/**['id_dosen', 'nama', 'alamat', 'hp', 'id-gol', 'status', 'id_pangkat', 'ket_dos', 'rutinitas'];*/

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Pangkat;
use App\Golongan;
use App\Dosen;

use Validator;
use routes;
use App\Http\Requests\DosenRequest;
use Illuminate\Support\Facades\DB;


class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $golongan = Golongan::all();
        $pangkat = Pangkat::all();
           return view('dosen')->with('golongan', $golongan)->with('pangkat', $pangkat);
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
    public function store(DosenRequest $request)
    
        /**['id_dosen', 'nama', 'alamat', 'hp', 'id-gol', 'status', 'id_pangkat', 'ket_dos', 'rutinitas'];*/
      {
        
        $data = [
        'nama' => $request['nama'],
        'alamat' => $request['alamat'],
        'hp' => $request['hp'],
        'id_gol' => $request['id_gol'],
        'status' => $request['status'],
        'id_pangkat' => $request['id_pangkat'],
        'ket_dos' => $request['ket_dos'],
        'rutinitas' => $request['rutinitas']
      
   
        ];

       return Dosen::create($data);
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

        $dosen = Dosen::find($id);
        return $dosen;
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

        $dosen = Dosen::find($id);
            $dosen->nama =$request['nama'];
            $dosen->alamat =$request['alamat'];
            $dosen->hp =$request['hp']; 

            $dosen->id_gol =$request['id_gol'];
            $dosen->status =$request['status'];
            $dosen->id_pangkat =$request['id_pangkat'];
            $dosen->ket_dos =$request['ket_dos'];

            $dosen->rutinitas =$request['rutinitas'];
          
        $dosen->update();
        return $dosen;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
   {
    if($dosenDel = Dosen::destroy($id)){
            return ['success' =>  1];
        }else{
            return ['tidak success' =>  0];
        }
    }
     public function  apiDosen()
    {

//$user=\Auth::user();
          // $dosen = dosen::find($user->id);

    // $dosen = Dosen::all();
       //$dosen= siswa::where('id','=',$id)->first();

  $dosen = dosen::with('golongan')->with('pangkat')->get();
      ///  $dosen = dosen::select('tanggal',DB::raw("(SUM(ns_siang)) as ns_siang"),DB::raw("(SUM(tkno_siang)) as tkno_siang"),DB::raw("(SUM(tamu_siang)) as tamu_siang"),DB::raw("(SUM(ss_malam)) as ss_malam"),DB::raw("(SUM(ns_malam)) as ns_malam"))->groupBy('tanggal')->get(); //pertanggal,
        return DataTables::of($dosen)
            ->addColumn('action', function($dosen) {
                return  
                        '<a onclick="editForm('. $dosen->id_dosen .')" class=btn btn-primary btn-xs"> <i class="glyphicon glyphicon-edit"> </i> Edit </a>' .
                        
                        '<a onclick="deleteData('. $dosen->id_dosen .')" class=btn btn-danger btn-xs"> <i class="glyphicon glyphicon-trash"> </i> Delete </a>' ;

            })->make(true);
    }

    
}
