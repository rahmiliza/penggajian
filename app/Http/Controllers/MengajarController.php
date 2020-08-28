<?php
/**['id_mengajar', 'nama', 'alamat', 'hp', 'id-gol', 'status', 'id_pangkat', 'ket_dos', 'rutinitas'];*/

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Mk;
use App\Mengajar;
use App\Dosen;
use App\Jurusan;
use App\Kelas;
use Validator;
use routes;
use App\Http\Requests\mengajarRequest;
use Illuminate\Support\Facades\DB;


class MengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // 'id_mengajar','id_dosen','kode_mk','thn_akademik','smt_akademik','id_jurusan','ket','id_kelas'*//
        $mk = Mk::all();
        $kelas = Kelas::all();
        $dosen = Dosen::all();
        $jurusan = Jurusan::all();
           return view('mengajar')->with('mk', $mk)->with('kelas', $kelas)->with('dosen', $dosen)->with('jurusan', $jurusan);
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
    public function store(MengajarRequest $request)
    
        
        
      {
        
        $data = [
        'id_mengajar' => $request['id_mengajar'],
        'id_dosen' => $request['id_dosen'],
        'kode_mk' => $request['kode_mk'],
        'thn_akademik' => $request['thn_akademik'],
        'smt_akademik' => $request['smt_akademik'],
        'id_jurusan' => $request['id_jurusan'],
        'ket' => $request['ket'],
        'id_kelas' => $request['id_kelas']
      
   
        ];

       return Mengajar::create($data);
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

        $mengajar = Mengajar::find($id);
        return $mengajar;
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
       
      
   

        $mengajar = mengajar::find($id);
            $mengajar->id_dosen =$request['id_dosen'];
            $mengajar->kode_mk =$request['kode_mk'];
            $mengajar->thn_akademik =$request['thn_akademik']; 

            $mengajar->smt_akademik =$request['smt_akademik'];
            $mengajar->id_jurusan =$request['id_jurusan'];
            $mengajar->ket =$request['ket'];
            $mengajar->id_kelas =$request['id_kelas'];

          
          
        $mengajar->update();
        return $mengajar;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
   {
    if($mengajarDel = Mengajar::destroy($id)){
            return ['success' =>  1];
        }else{
            return ['tidak success' =>  0];
        }
    }
     public function  apiMengajar()
    {

//$user=\Auth::user();
          // $mengajar = mengajar::find($user->id);

    // $mengajar = mengajar::all();
       //$mengajar= siswa::where('id','=',$id)->first();

  $mengajar = Mengajar::with('mk',)->with('kelas')->with('dosen')->with('jurusan')->get();
      ///  $mengajar = mengajar::select('tanggal',DB::raw("(SUM(ns_siang)) as ns_siang"),DB::raw("(SUM(tkno_siang)) as tkno_siang"),DB::raw("(SUM(tamu_siang)) as tamu_siang"),DB::raw("(SUM(ss_malam)) as ss_malam"),DB::raw("(SUM(ns_malam)) as ns_malam"))->groupBy('tanggal')->get(); //pertanggal,
        return DataTables::of($mengajar)
            ->addColumn('action', function($mengajar) {
                return  
                        '<a onclick="editForm('. $mengajar->id_mengajar .')" class=btn btn-primary btn-xs"> <i class="glyphicon glyphicon-edit"> </i> Edit </a>' .
                        
                        '<a onclick="deleteData('. $mengajar->id_mengajar .')" class=btn btn-danger btn-xs"> <i class="glyphicon glyphicon-trash"> </i> Delete </a>' ;

            })->make(true);
    }

    
}
