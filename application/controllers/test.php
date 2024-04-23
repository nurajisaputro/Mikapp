<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{

    public function ping()
    {
        $iplist = array(
            array("1", "192.168.2.101", "UBUNTU SERVER", ""),
            array("2", "10.10.124.1", "METRO HSP", ""),
            array("3", "103.189.249.11", "METRO ICON", ""),
            array("4", "192.168.3.1", "CCR 1036", ""),
            array("5", "10.10.101.1", "CCR 1009", ""),
            array("6", "192.168.60.2", "RB750", ""),
            array("7", "192.168.155.1", "RB750Gr3", ""),
            array("8", "192.168.2.253", "RB2011", ""),
        );

        $replay = 0;
        $i = count($iplist);
        $results = [];
        $replay = 0;

        for ($j = 0; $j < $i; $j++) {
            $ip = $iplist[$j][1];
            $ping = exec("ping -n 1 $ip", $output, $status);
            $results[] = $status;
        }
        var_dump($output);
        echo "</br>";
        echo $results[$results];
    }

    public function red()
    {
        $icon = 'fa-temperature-three-quarters';
        $green = 'info-box-icon bg-success elevation-1';
        $red = 'info-box-icon bg-red elevation-1';
        $a = 1;
        $q = 2;
        
        if($a === 12){
            $hasil = $green;
        }else{
            $hasil = $red;
        }





        echo
        '
            <div class="content-wrapper mt-5">
                <div class="content-header">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">' .


        '<span class="' . $hasil . '"><i class="fa-solid "></i></span>';


        echo '
        <div class="info-box-content">
        <span class="info-box-text">CPU TEMPERATURE</span>
        <span class="info-box-number">
        <div id="cputemp1009"></div>
        </span>
        </div>
        </div>
        </div>
        </div>
        </div>
    ';
        $this->load->view('template/main');
    }
}
