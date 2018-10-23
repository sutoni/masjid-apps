<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * ***************************************************************
 * Script : 
 * Version : 
 * Date :
 * Author : Sutoni
 * Email : t.sutoni@yahoo.com
 * Website : www.usahadong.com
 * Description : 
 * ***************************************************************
 */

/**
 * Description of queries
 *
 * @author Sutoni
 */
class Queries extends CI_Model {

    private $db;

    //put your code here
    function __construct(){
        parent::__construct();
    }
     function all_data() {
        $query = $this->db->get('menu');
        return $query->num_rows();
    }
    function select_data() {
        //php biasa
        
             if ($_SESSION['username']=='admin'){
                        $hasil=$database->query('SELECT id as menu_item_id, parent_id as menu_parent_id, title as menu_item_name,concat("/human_resources/media.php",url)as url,menu_order,icon FROM menu ORDER BY menu_order');
                        $refs = array();
                        $list = array();
                        while($data = $hasil->fetch(PDO::FETCH_ASSOC))
                        {
                            $thisref = &$refs[ $data['menu_item_id'] ];
                            $thisref['menu_parent_id'] = $data['menu_parent_id'];
                            $thisref['menu_item_name'] = $data['menu_item_name'];
                            $thisref['url'] = $data['url'];
                            $thisref['icon'] = $data['icon'];
                            if ($data['menu_parent_id'] == 0)
                            {
                                $list[ $data['menu_item_id'] ] = &$thisref;
                            }
                            else
                            {
                                $refs[ $data['menu_parent_id'] ]['children'][ $data['menu_item_id'] ] = &$thisref;
                            }
                        }
                        function create_list( $arr ,$urutan)
                        {
                            if($urutan==0){
                                 $html = "\n<ul class='sidebar-menu'>\n";
                            }else
                            {
                                 $html = "\n<ul class='treeview-menu'>\n";
                            }
                            foreach ($arr as $key=>$v)
                            {
                                if (array_key_exists('children', $v))
                                {
                                    $html .= "<li class='treeview'>\n";
                                    $html .= '<a href="#">
                                                    <i class="'.$v['icon'].'"></i>
                                                    <span>'.$v['menu_item_name'].'</span>
                                                    <i class="fa fa-angle-left pull-right"></i>
                                                </a>';

                                    $html .= create_list($v['children'],1);
                                    $html .= "</li>\n";
                                }
                                else{
                                        $html .= '<li><a href="'.$v['url'].'">';
                                        if($urutan==0)
                                        {
                                            $html .=    '<i class="'.$v['icon'].'"></i>';
                                        }
                                        if($urutan==1)
                                        {
                                            $html .=    '<i class="fa fa-angle-double-right"></i>';
                                        }
                                        $html .= $v['menu_item_name']."</a></li>\n";}
                            }
                            $html .= "</ul>\n";
                            return $html;
                        }
                        echo create_list( $list,0 );
                        
                    }
                    else if($_SESSION['username']!='admin'){
                      // Akses untuk diluar administrator
                      //     echo "diluar admin";
                        $namauser=$_SESSION['username'];
                        $hasil1="SELECT a.id as menu_item_id, a.parent_id as menu_parent_id, 
                                a.title as menu_item_name,CONCAT('/human_resources/media.php',url)as url,
                                a.menu_order as menu_order,a.icon as icon FROM menu a 
                                INNER JOIN menu_akses b ON a.id=b.menuid
                                INNER JOIN user c ON b.username=c.username 
                                WHERE b.username='$namauser' AND b.access_flag=1
                                ORDER BY a.menu_order";
                        $hasil=$database->query($hasil1);
                       
                        $refs = array();
                        $list = array();
                        while($data = $hasil->fetch(PDO::FETCH_ASSOC))
                        {
                            $thisref = &$refs[ $data['menu_item_id'] ];
                            $thisref['menu_parent_id'] = $data['menu_parent_id'];
                            $thisref['menu_item_name'] = $data['menu_item_name'];
                            $thisref['url'] = $data['url'];
                            $thisref['icon'] = $data['icon'];
                            if ($data['menu_parent_id'] == 0)
                            {
                                $list[ $data['menu_item_id'] ] = &$thisref;
                            }
                            else
                            {
                                $refs[ $data['menu_parent_id'] ]['children'][ $data['menu_item_id'] ] = &$thisref;
                            }
                        }
                        function create_list( $arr ,$urutan)
                        {
                            if($urutan==0){
                                 $html = "\n<ul class='sidebar-menu'>\n";
                            }else
                            {
                                 $html = "\n<ul class='treeview-menu'>\n";
                            }
                            foreach ($arr as $key=>$v)
                            {
                                if (array_key_exists('children', $v))
                                {
                                    $html .= "<li class='treeview'>\n";
                                    $html .= '<a href="#">
                                                    <i class="'.$v['icon'].'"></i>
                                                    <span>'.$v['menu_item_name'].'</span>
                                                    <i class="fa fa-angle-left pull-right"></i>
                                                </a>';

                                    $html .= create_list($v['children'],1);
                                    $html .= "</li>\n";
                                }
                                else{
                                        $html .= '<li><a href="'.$v['url'].'">';
                                        if($urutan==0)
                                        {
                                            $html .=    '<i class="'.$v['icon'].'"></i>';
                                        }
                                        if($urutan==1)
                                        {
                                            $html .=    '<i class="fa fa-angle-double-right"></i>';
                                        }
                                        $html .= $v['menu_item_name']."</a></li>\n";}
                            }
                            $html .= "</ul>\n";
                            return $html;
                        }
                        echo create_list( $list,0 );
                        
                    }
        //php biasa
        }        
        $query = $this->db->get('menu');
        return $query->result();   
    }
}
