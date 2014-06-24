<?xml version="1.0" encoding="UTF-8"?>
<?php
$tag = array();
foreach ($columns as $col) {
    $tag[] = $col->feedColumn->name;
}
?>
<SHOP>
 <?php
 if (count($tag)>0):
 foreach ($data as $row):
     echo "<SHOPITEM>\n";
     if (in_array('PRODUCT', $tag)) {
         echo "  <PRODUCT>".$row->prod_name."</PRODUCT>\n";
     }
     if (in_array('MANUFACTURER', $tag)) {
         echo "  <MANUFACTURER>".$row->dev_name."</MANUFACTURER>\n";
     }
     if (in_array('PRICE_VAT', $tag)) {
         echo "  <PRICE_VAT>".round($row->prod_price)."</PRICE_VAT>\n";
     }
     if (in_array('DESCRIPTION', $tag)) {
         echo "  <DESCRIPTION>".round($row->prod_price)."</DESCRIPTION>\n";
     }
     echo " </SHOPITEM>\n";
 endforeach;
 endif;
 ?>
</SHOP>