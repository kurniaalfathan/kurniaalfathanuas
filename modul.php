<?php
$colname_rs_modul = "-1";
if (isset($_GET['v'])) {
  $colname_rs_modul = $_GET['v'];
}
mysql_select_db($database_olshop, $olshop);
$query_rs_modul = sprintf("SELECT * FROM modul WHERE id_modul = %s", GetSQLValueString($colname_rs_modul, "int"));
$rs_modul = mysql_query($query_rs_modul, $olshop) or die(mysql_error());
$row_rs_modul = mysql_fetch_assoc($rs_modul);
$totalRows_rs_modul = mysql_num_rows($rs_modul);

//data list produk (Produk Terbaru)
$maxRows_rs_list_produk = 6;
$pageNum_rs_list_produk = 0;
if (isset($_GET['pageNum_rs_list_produk'])) {
  $pageNum_rs_list_produk = $_GET['pageNum_rs_list_produk'];
}
$startRow_rs_list_produk = $pageNum_rs_list_produk * $maxRows_rs_list_produk;

mysql_select_db($database_olshop, $olshop);
$query_rs_list_produk = "SELECT * FROM produk";
$query_limit_rs_list_produk = sprintf("%s LIMIT %d, %d", $query_rs_list_produk, $startRow_rs_list_produk, $maxRows_rs_list_produk);
$rs_list_produk = mysql_query($query_limit_rs_list_produk, $olshop) or die(mysql_error());
$row_rs_list_produk = mysql_fetch_assoc($rs_list_produk);

if (isset($_GET['totalRows_rs_list_produk'])) {
  $totalRows_rs_list_produk = $_GET['totalRows_rs_list_produk'];
} else {
  $all_rs_list_produk = mysql_query($query_rs_list_produk);
  $totalRows_rs_list_produk = mysql_num_rows($all_rs_list_produk);
}
$totalPages_rs_list_produk = ceil($totalRows_rs_list_produk/$maxRows_rs_list_produk)-1;
?>
<div class="col-md-8">
    <p><img src="logged/gambar/<?php echo $row_rs_modul['gambar']; ?>" width="100%" height="20%"/></p>
    <p><?php echo $row_rs_modul['static_content']; ?></p>
</div>
<div class="col-md-4">

        <div class="list-group">
		       <a href="#" class="list-group-item active">
        	  <h3> Produk <strong>Terbaru</strong></h3>
              </a>
                        
                        <?php do { ?>
                               <a href="?page=details&produk_id=<?php echo $row_rs_list_produk['produk_id']; ?>" class="list-group-item text-uppercase"><?php echo $row_rs_list_produk['nama_produk']; ?></a>
                        <?php } while ($row_rs_list_produk = mysql_fetch_assoc($rs_list_produk)); ?>            
              </div>                
    <div class="list-group">
                      <a href="#" class="list-group-item active">
                        <h3> Kategori <strong>Produk</strong></h3>
                      </a>

                <?php
			              $kategori=mysql_query("select nama_kategori, kategori.id_kategori, 
                                  count(produk.produk_id) as jml 
                                  from kategori left join produk 
                                  on produk.id_kategori=kategori.id_kategori 
                                  group by nama_kategori");
							$no=1;
							while($k=mysql_fetch_array($kategori)){
								echo "<a href='?page=kategori&id=$k[id_kategori]' class='list-group-item'> $k[nama_kategori] <span class='badge'> $k[jml] </span></a>";
							  $no++;
							}
							?>
	  </div>
</div>
