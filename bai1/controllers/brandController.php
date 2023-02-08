<?php
function brand_select_all()
{
  $sql = "SELECT * FROM brand";
  return  getData($sql);
}
?>