<?php
/**['id_penggajian', 'nama', 'alamat', 'hp', 'id-gol', 'status', 'id_pangkat', 'ket_dos', 'rutinitas'];*/

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Dosen;

use App\Penggajian;
use Excel;
use Validator;
use routes;
use App\Http\Requests\PenggajianRequest;
use Illuminate\Support\Facades\DB;


class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosen = Dosen::all();
       
           return view('laporan')->with('dosen', $dosen);
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
    public function store(PenggajianRequest $request)
    
        /**['id_penggajian', 'nama', 'alamat', 'hp', 'id-gol', 'status', 'id_pangkat', 'ket_dos', 'rutinitas'];*/
      {
			//
			$data = [
			'id_dosen' => $request['id_dosen'],
			'tanggal' => $request['tanggal'],
			'jml_hadir' => $request['jml_hadir'],
			];
			
		   return Penggajian::create($data);
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

        $penggajian = Penggajian::find($id);
        return $penggajian;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PenggajianRequest $request, $id)
    {
   //      //'id_penggajian','id_mengajar','bulan','jml_hadir','honor_satuan','gaji_honor','total_pajak','total_gaji_bersih'];


   //      $penggajian = Penggajian::find($id);
   //          $penggajian->tanggal =$request['tanggal'];
   //          $penggajian->jml_hadir =$request['jml_hadir']; 
        
			// $dosen = Dosen::where('id_dosen', $penggajian->id_dosen)->with('pangkat')->with('golongan')->with('pajak')->with('honor')->first();
			// $totalGaji = (float)$dosen->honor->honor * (float)$penggajian->jml_hadir;
		
			// if($dosen->pajak){
			// 	$totalGajiBersih = $totalGaji - ($totalGaji / 100 * $dosen->pajak->pajak);
			// }else{
			// 	$totalGajiBersih = $totalGaji;
			// }
			
			
			// $penggajian->honor_satuan = $dosen->honor->honor;
			// $penggajian->gaji_honor = $totalGaji;
			// $penggajian->total_pajak = $dosen->pajak ? $dosen->pajak->pajak : '';
			// $penggajian->total_gaji_bersih = $totalGajiBersih;
			// $penggajian->tanggal = $penggajian->tanggal . '-01';
			// $penggajian->update();
   //      return $penggajian;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
   {
    // if($penggajianDel = Penggajian::destroy($id)){
    //         return ['success' =>  1];
    //     }else{
    //         return ['tidak success' =>  0];
    //     }
    }
     public function  apiPenggajian()
    {

//$user=\Auth::user();
          // $penggajian = penggajian::find($user->id);

    // $penggajian = Penggajian::all();
       //$penggajian= siswa::where('id','=',$id)->first();

  $penggajian = Penggajian::with('dosen')->get();
      ///  $penggajian = penggajian::select('tanggal',DB::raw("(SUM(ns_siang)) as ns_siang"),DB::raw("(SUM(tkno_siang)) as tkno_siang"),DB::raw("(SUM(tamu_siang)) as tamu_siang"),DB::raw("(SUM(ss_malam)) as ss_malam"),DB::raw("(SUM(ns_malam)) as ns_malam"))->groupBy('tanggal')->get(); //pertanggal,
        return DataTables::of($penggajian)
			// ->editColumn('tanggal', function($v){
			// 	return (strtotime($v->tanggal) ? date('M Y', strtotime($v->tanggal)) : '') ;
			// })
			// ->editColumn('jml_hadir', function($v){
			// 	return $v->jml_hadir != '' ? $v->jml_hadir . ' jam' : '' ;
			// })
			// ->editColumn('total_gaji_bersih', function($v){
			// 	return $v->total_gaji_bersih != '' ? number_format($v->total_gaji_bersih, '0', ',', '.')  : '' ;
			// })

            ->make(true);
    }

    public function penggajianExport() {
     
        $penggajian = Penggajian::select('id_dosen','tanggal','jml_hadir','total_gaji_bersih'
       


         )->with('dosen')->get();
                   // print_r($mealsemua);die();

               // $printsemua= array();
              
     // print_r($printsemua);die();
        // return Excel::create('Laporan_semuadatagaji', function($excel) use($printsemua){
        //         $excel->sheet('mysheet', function($sheet) use ($printsemua) {
        //             $sheet->fromArray($printsemua, null, 'A1', false, false);


        //     });
        // })->export('xls');
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan Penggajian Dosen.xls");

?>


            <table>
                
                <thead>
                    
                    <tr>
                        
                        <th>No</th>
                        <th>Nama Dosen</th>
                        <th>Tanggal</th>
                        <th>Jml Hadir</th>
                        <th>Total Gaji</th>
                    </tr>

                </thead>
                <tbody>
                    <?php
                        $b=1;
                      foreach ($penggajian as $key => $value) {
                     ?>
                     <tr>

                            <td> <?php echo $b ?></td>
                            <td> <?php echo $value->dosen->nama; ?></td>
                            <td> <?php echo $value->tanggal != '' ? date('M Y', strtotime($value->tanggal)) : '' ?></td>
                            <td> <?php echo $value->jml_hadir; ?></td>
                            <td> <?php echo $value->total_gaji_bersih != '' ? number_format($value->total_gaji_bersih, 0,',','.'):'' ?></td>


                      </tr>
                     <?php
                     $b++;
            }
                    ?>

                </tbody>
            </table>
<?php


        
    }
}
