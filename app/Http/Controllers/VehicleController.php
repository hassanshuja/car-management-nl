<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DOMDocument;
use DOMXpath;
use DB;
use App\Models\Vehicles;

class VehicleController extends Controller
{
    public $result;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        
        // if ($request->ajax()) {
        //     $vehicles = Vehicles::all();
            
        //     return datatables()->of($vehicles)
        //         ->addColumn('action', function ($row) {
        //             $html = '<a href="#" class="btn btn-xs btn-secondary btn-edit">Edit</a> ';
        //             $html .= '<button data-rowid="' . $row->id . '" class="btn btn-xs btn-danger btn-delete">Del</button>';
        //             return $html;
        //         })->toJson();
        // }
       
        $data = DB::table('vehicles')->orderBy('id', 'desc')->get();
        // return response()->json($data);
        return view('cars.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       

      $request->validate([
            'plate_no' => 'required:unique:vehicles,plate_no'.$request->plate_no,
            'brand' => 'required',
            'type'  => 'required',
            'apk' => 'required',
            'first_registeration' => 'required',
            'last_ascription' => 'required',
            'engine_capacity' => 'required',
            // 'gas_type' => 'required',
            'fuel' => 'required',
            'bought_from' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'whatsapp' => 'required',
            'purchase_amount' => 'required',
            'remainder_amount' => 'required',
            'remainder_instrument' => 'required',
            'payment_status' => 'required',
            'comment' => 'required'
        ]);


        $arr = $request->except(['_token','_method']);
       
        $res = DB::table('vehicles')->insert($arr);
        return redirect()->back()->with('status', 'Vehicle Record Inserted to the System!');
        
        //
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
        $data = DB::table('vehicles')->select('*')->from('vehicles')->where('id', $id)->get();
        return view('cars.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('vehicles')->select('*')->from('vehicles')->where('id', $id)->get();
        return view('cars.edit', compact('data'));
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
      
        $request->validate([
            'plate_no' => 'required',
            'brand' => 'required',
            'type'  => 'required',
            'apk' => 'required',
            'first_registeration' => 'required',
            'last_ascription' => 'required',
            'engine_capacity' => 'required',
            // 'gas_type' => 'required',
            'fuel' => 'required',
            'bought_from' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'whatsapp' => 'required',
            'purchase_amount' => 'required',
            'remainder_amount' => 'required',
            'remainder_instrument' => 'required',
            'payment_status' => 'required',
            'comment' => 'required'
        ]);


        $arr = $request->except(['_token','_method']);
       
        $res = DB::table('vehicles')->where("id", $id)->update($arr);
        return redirect()->back()->with('status', 'Vehicle Record Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $vehicle = DB::table('vehicles')->->delete($id);
        if (DB::table('vehicles')->delete($id) == false) {
            return redirect()->back()->with('error', 'There is some error deleting Record! OR Record Not Found');
        }

        return redirect()->back()->with('success', 'Success!. Record deleted successfully');
    }

    public function searchplate(Request $request){

      
      $request->validate([
          'plate_no' => 'required|unique:vehicles,plate_no',
      ]);
      

        $plate_no = $request->plate_no;
        //R-829-VT
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://ovi.rdw.nl/default.aspx',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => 'ovipplate='.$plate_no,
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded',
            'Cookie: ASP.NET_SessionId=vvvj5verfbrhhdknjwpz1hs2; TS011f44e9=01a5d145de33c10ea503d4572fe1465e711943c782c73d6ca8ce812272a6a2e115e0c5a00d8e19ba5385f535e90aa2e3c68deb24fe647def1aacf829c2737abd7bb8a4ed7982fdb3f785c64210b7b964562efb6966b5dbcba18421370b952f43297984eee1; f5avraaaaaaaaaaaaaaaa_session_=PPFFPLHECEAGBGBBAOACPLOIEFPOALGJFNKACCAHHOKAMPCGNEIGBADAJHENICKCNHHDMNJPKDKBODMHFOHADKLHIHBGFLOFENEGPENGDHGPHIIHBBJCBMCLEHIMKCMD; rdw-persist=!kBNZqcEsTKgp+8Cv+6gg9qo8mB5JFKq9i+tougklAmBv8e0z+Hp9P6sFKySRwNF2TAM0uk450zpOtJ4gjEISyfQTyr3me3HlUDwG61ES6Q=='
          ),
        ));
        
        $response = curl_exec($curl);
 
        curl_close($curl);
        
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($response);
        libxml_clear_errors();
        $xpath = new DOMXpath($dom);
  
        // get all table rows and rows which are not headers
        // if($xpath->query('//*[@id="ctl00_TopContent_lblMeldingen"]')){
        //     $this->result = ['Number Plate Not Found'];
        //    return response()->json($this->result, 404);
        // }

        $table_rows1 = $xpath->query('//*[@id="ctl00_MainContent_BasisAlgemeen"]/div/div');
        $table_rows2 = $xpath->query('//*[@id="ctl00_MainContent_BasisVervaldata en historie"]/div/div');
        $table_rows3 = $xpath->query('//*[@id="ctl00_MainContent_Motor & MilieuMotor"]/div/div');
        $environmental_performance = $xpath->query('//*[@id="ctl00_MainContent_Motor & MilieuMilieuprestaties"]/div/div');
        $this->result = [];

        $data1 = $this->getArray($table_rows1);
        $data2 = $this->getArray($table_rows2);
        $data3 = $this->getArray($table_rows3);
        $data4 = $this->getArray($environmental_performance);
        
        
        $this->getData($data1);
        $this->getData($data2);
        $this->getData($data3);
        $this->getData($data4);

        
        echo json_encode($this->result);
    }

    function getArray($mytable){
        $data = array();
        foreach($mytable as $row => $tr) {
         
          foreach($tr->childNodes as $td) {
              //print_r(preg_replace('~[\r\n]+~', '', trim($td->nodeValue)));
              
              $data[$row][] = preg_replace('~[\r\n]+~', '', trim($td->nodeValue));
          }
          
          //$data[$row] = array_values(array_filter($data[$row]));
        }
        return $data;
      }
      
      function getData($myArray){

      
        foreach($myArray as $ind => $val){
           
          if($val[0] == "Merk"){
            $myind = $ind + 2;
            $merk = $myArray[$myind][0];
            $this->result["merk"] = $merk;
          }
          elseif($val[0] == "Type"){
            $myind = $ind + 2;
            $type = $myArray[$myind][0];
            $this->result["type"] = $type;
          }elseif($val[0] == "Vervaldatum APK"){
            $myind = $ind + 2;
            $apk = $myArray[$myind][0];
            $this->result["apk"] = $apk;
          }elseif($val[0] == "Cilinderinhoud"){
            $myind = $ind + 2;
            $clindir = $myArray[$myind][0];
            $this->result["Cilinderinhoud"] = $clindir;
          }elseif($val[0] == "Datum eerste toelating"){
            $myind = $ind + 2;
            $first_erreste = $myArray[$myind][0];
            $this->result["first_erreste"] = $first_erreste;
          }elseif($val[0] == "Datum laatste tenaamstelling"){
            $myind = $ind + 2;
            $laatste = $myArray[$myind][0];
            $this->result["laatste"] = $laatste;
          }elseif($val[0] == "Type gasinstallatie"){
            $myind = $ind + 2;
            $gasinstallatie = $myArray[$myind][0];
            $this->result["gasinstallatie"] = $gasinstallatie;
          }elseif($val[0] == "Brandstof"){
            $myind = $ind + 2;
            $gasinstallatie = $myArray[$myind][0];
            $this->result["Brandstof"] = $gasinstallatie;
          }
            
        }
        //print_r($result);
      
      }
}
