<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('menu_tree')){
function menu_tree($array, $parent, $curr=0, $prev=-1)
{
foreach($array as $value)
{
if($parent==$value['parent'])
{
if($curr>$prev)
{
if($value['parent']==0)
{
echo '<ul class="sidebar-menu"><li class="treeview">';
}
else
{
echo '<ul class="treeview-menu" style="display: none;">';
}
}
if($curr==$prev) echo '</li>';

echo '<li class="'.$value['class'].'" ><a href="#" ';
if($value['class']=='') echo 'data-href="'.$value['data'].'" data-target="#workspace" class="btn-load btn-ajax-page"';
echo '>'.icon($value['icon']).lang($value['label']);
if($value['class']=='treeview')
{
echo '<i class="fa fa-angle-left pull-right"></i>';
}
echo '</a>';
if($curr>$prev)
{
$prev=$curr;
}
$curr++;
menu_tree($array,$value['id'],$curr,$prev);
$curr--;
}
}
if($curr==$prev)
{
echo "</li></ul>";
}
}
}