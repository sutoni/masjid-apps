<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apps {
    var $name="Monitoring Training";
    var $title="<b>Monitoring Training</b> PT XYZ";
    var $release="Version 1.0.0 Beta";
    var $ver="Version 1.0.0 Beta";
    var $modname="";
    var $moddesc="";
    var $copyright = "Aplikasi skripsi &copy; 2015";
    var $statnav="active";
    
    public function __construct(){

    }
        
    public function modulname() {
        return $this->modname;
    }
    
    public function moduldesc() {
        return $this->moddesc;
    }
    
    public function titlepage($param) {
        return $param;
    }
    
    public function modulsource($param) {
        return $param;
    }
    
    public function idmenu($param) {
        return $param;
    }
    
    public function namamenu($param) {
        return $param;
    }
}

/* 
 * Created by Sutoni
 * Email : t.sutoni2yahoo.com
 * www.usahadong.com
 */

