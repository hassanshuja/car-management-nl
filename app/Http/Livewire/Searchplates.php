<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DOMDocument;
use DOMXpath;

class Searchplates extends Component
{
    public $search = '';
    public $plateno = '';
    public $result = array();
    protected $rules = [
        'search' => 'required|min:6',
    ];

    public function render()
    {
        return view('livewire.searchplates');
    }

    public function getplates()
    {
        $this->validate();
        $this->plateno = "";
        $this->plateno = $this->search;

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
            CURLOPT_POSTFIELDS => 'ovipplate=' . $this->plateno,
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

        $data = array();
        // get all table rows and rows which are not headers
        if($xpath->query('//*[@id="ctl00_TopContent_lblMeldingen"]')){
            $this->result = ['not found'];
            exit;
        }

        $table_rows1 = $xpath->query('//*[@id="ctl00_MainContent_BasisAlgemeen"]/div/div');
        $table_rows2 = $xpath->query('//*[@id="ctl00_MainContent_BasisVervaldata en historie"]/div/div');
        $table_rows3 = $xpath->query('//*[@id="ctl00_MainContent_Motor & MilieuMotor"]/div/div');

        

        $data1 = $this->getArray($table_rows1);
        $data2 = $this->getArray($table_rows2);
        $data3 = $this->getArray($table_rows3);


        $this->getData($data1);
        $this->getData($data2);
        $this->getData($data3);

    }

    public function getArray($mytable)
    {
        foreach ($mytable as $row => $tr) {

            foreach ($tr->childNodes as $td) {
                //print_r(preg_replace('~[\r\n]+~', '', trim($td->nodeValue)));

                $data[$row][] = preg_replace('~[\r\n]+~', '', trim($td->nodeValue));
            }

            //$data[$row] = array_values(array_filter($data[$row]));
        }
        return $data;
    }

    public function getData($myArray)
        {
            
            foreach ($myArray as $ind => $val) {

                if ($val[0] == "Merk") {
                    $myind = $ind + 2;
                    $merk = $myArray[$myind][0];
                    $this->result["merk"] = $merk;
                    echo '<pre>';
                } elseif ($val[0] == "Type") {
                    $myind = $ind + 2;
                    $type = $myArray[$myind][0];
                    $this->result["type"] = $type;
                } elseif ($val[0] == "Vervaldatum APK") {
                    $myind = $ind + 2;
                    $apk = $myArray[$myind][0];
                    $this->result["apk"] = $apk;
                } elseif ($val[0] == "Cilinderinhoud") {
                    $myind = $ind + 2;
                    $clindir = $myArray[$myind][0];
                    $this->result["Cilinderinhoud"] = $clindir;
                } elseif ($val[0] == "Datum eerste toelating") {
                    $myind = $ind + 2;
                    $first_erreste = $myArray[$myind][0];
                    $this->result["first_erreste"] = $first_erreste;
                } elseif ($val[0] == "Datum laatste tenaamstelling") {
                    $myind = $ind + 2;
                    $laatste = $myArray[$myind][0];
                    $this->result["laatste"] = $laatste;
                } elseif ($val[0] == "Type gasinstallatie") {
                    $myind = $ind + 2;
                    $gasinstallatie = $myArray[$myind][0];
                    $this->result["gasinstallatie"] = $gasinstallatie;
                }
            }
            //print_r($result);

        }
}
