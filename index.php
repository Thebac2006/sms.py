<?php 
require 'apimod.php';
$mainCLass = new coinmaster;

echo "Đừng quên đăng ký kênh Black Undo nhé !!\n";
$link = readline("User ID : => ");
$count = readline("Số lần mời : => ");
for ($i=0; $i < $count; $i++) { 
	$start = $mainCLass->addspin($link, $i);
	print_r("\n[".$i."] => ".$start."\n");
}

?>