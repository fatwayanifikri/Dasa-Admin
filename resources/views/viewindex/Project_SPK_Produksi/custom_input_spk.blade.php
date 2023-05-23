<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')

@section('content')

  <!-- Your html goes here -->
<!--DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
<!--Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!--DateRangePicker -->
<script type="text/javascript" src="https://cdn.datatables.net/datetime/1.0.2/js/dataTables.dateTime.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<head>
    
<script>

document.getElementById("datefield").value = new Date().toISOString().substring(0, 10)


</script>
  
<style>


 p { 
  margin:0;
}

.form-control{
  width: 100%;
  height: 30%;
  font-size: 12px;
}

.form-control2{
  height:29px;
  width: 100%;
  font-size: 14px;

}

.form-control3{
    height:29px;
    width: 100%;
    line-height:30px;
    padding:6px;
    font-size: 14px;
    }

.link {
    text-decoration: none; 
    color: white; 

}
a:hover {
  color: white;
}

.form-control{
  border-color: rgba(180, 180, 180);

 
}

.hidden{
   visibility:hidden;
}
.wrapper {
  position: relative;
  overflow: auto;
  border: 1px solid black;
  white-space: nowrap;
 
}
td {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  max-width: 200px;
  font-weight: 510; 
  font-size: 13px;
}


</style>
</head>

<!------------------------------------PAGE 1------------------------------------->

<form action="{{route('input_spk_rincian')}}" method="POST" id="spk_rincian">{{ csrf_field() }}


<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<!-- <div class="panel-heading">Cek IP</div> -->
<div class="panel-body">

<table border="1" style="width: 100%;" align="center">
<tr>
<td rowspan="3" colspan="2" style="width:20%"><center><img src="{{asset('picture/Depress.png') }}"style="width:60%;height:30%"></center></td>
<td align="center">FORMULIR</td>
<td>No. Dokumen</td>
<td style="width: 20%;"><input type="text" class="form-control" name="no_dokumen" id="no_dokumen" placeholder="input here...." form="spk_rincian" /></td>
</tr>

<tr>
<td align="center" rowspan="2"><h4><b>SURAT PERINTAH KERJA</b></h4></td>
<td>No. Revisi</td>
<td><input type="text" class="form-control" name="no_revisi" id="no_revisi" placeholder="input here...." form="spk_rincian"/></td>
</tr>

<tr>
<td>Hal</td>
<td><input type="text" class="form-control" name="hal" id="hal" placeholder="input here...." form="spk_rincian"/></td>
</tr>

<!-- -------------------- -->
<tr>
<td>Tanggal</td>
<td colspan="2"><input type="date" class="form-control2" name="tanggal" id="tanggal" value="" form="spk_rincian"/></td>
<td>NO.PO</td>
<td><input type="text" class="form-control" name="no_po" id="no_po" placeholder="input here...." form="spk_rincian"/></td>
</tr>

<tr>
<td>Judul Pekerjaan</td>
<td colspan="2"><input type="text" class="form-control" name="judul" id="judul" placeholder="input here...." form="spk_rincian"/></td>
<td>Kode Item</td>
<td><input type="text" class="form-control" name="kode_item" id="kode_item" placeholder="input here...." form="spk_rincian"/></td>
</tr>

<tr>
<td>No.SPK</td>
<td colspan="2"><input type="text" class="form-control" name="no_spk" id="no_spk" placeholder="input here...." form="spk_rincian"/></td>
<td>Nama Customer</td>
<td><input type="text" class="form-control" name="nama_customer" id="nama_customer" placeholder="input here...." form="spk_rincian"/></td>
</tr>

<tr>
<td>Jumlah Pesanan</td>
<td colspan="2"><input type="number" class="form-control" name="jumlah_pesanan" id="jumlah_pesanan" placeholder="input here...." form="spk_rincian"/></td>
<td>Jenis Pekerjaan</td>
<td><input type="text" class="form-control" name="jenis_kerjaan" id="jenis_kerjaan" placeholder="input here...." form="spk_rincian"/></td>
</tr>

<tr>
<td>Tanggal Pengiriman</td>
<td colspan="2"><input type="date" class="form-control2" name="tgl_pengiriman" id="tgl_pengiriman" value="" form="spk_rincian"/></td>
<td>NO.Sales Order</td>
<td><input type="text" class="form-control" name="no_sales_order" id="no_sales_order" placeholder="input here...." form="spk_rincian"/></td>
</tr>
</table>

<!---------------------------------PAGE 2-------------------------------------->


<div style="overflow-x:auto;">
<table border="1" style="width: 100%; " align="center">
<tr>
<td colspan="11" style="background-color: #DCDCDC; "><center><b>RINCIAN PRODUK</b></center></td>
</tr>

<tr>
<td colspan="11" style="color: red;">(*Wajib Diisi)</td>
</tr>

<tr>
<td colspan="2">Dimensi(L x W x H)/Ukuran</td>
<td colspan="9">
<input type="text" class="form-control" name="dimensi" id="dimensi" placeholder="input here...." form="spk_rincian" /></td>
</tr>

<tr align="center">
<td><b>SPESIFIKASI PROSES</b></td>
<td>Jenis Bahan & Gram</td>
<td>Jumlah Katern</td>
<td>Ukuran Kertas Naik Cetak</td>
<td colspan="2">Jumlah Warna</td>
<td>Jumlah Cetak</td>
<td>Insheet Cetak</td>
<td>TOTAL CETAK</td>
<td>Keterangan</td>
<td>Ops</td>
</tr>

@foreach($rincian as $i)
<tr align="center" style="color: red;">
<td>{{$i->spesifikasi_proses}}</td>
<td>{{$i->jenis_bahan}}</td>
<td>{{$i->jumlah_katern}}</td>
<td>{{$i->ukuran_kertas}}</td>
<td>{{$i->jumlah_warna}}</td>
<td>{{$i->jumlah_warna_muka}}</td>
<td>{{number_format($i->jumlah_cetak)}}</td>
<td>{{number_format($i->insheet_cetak)}}</td>
<td>{{number_format($i->total_cetak)}}</td>
<td>{{$i->keterangan}}</td>
<td>
<a href="{{ url('admin/delete_rincian/'.$i->id) }}" title="Delete">
<i class="fa fa-trash" style="color:red;"></i></a>  
</td>
</tr>
@endforeach


<tr align="center">
<td><select name="spesifikasi_proses" class="form-control " placeholder="Cari Berdasarkan Unit .." form="spk_rincian" id="spesifikasi">  
<option value="Cover">Cover</option>
<option value="Isi">Isi</option>
<option value="Lain">Lain Lain</option>
</select></td>
<td><input type="text" class="form-control" name="jenis_bahan" id="jenis_bahan" placeholder="input here...." form="spk_rincian"/></td>
<td><input type="number" class="form-control" name="jumlah_katern" id="jumlah_katern" placeholder="input here...." form="spk_rincian"/></td>
<td><input type="text" class="form-control" name="ukuran_kertas" id="ukuran_kertas" placeholder="input here...." form="spk_rincian"/></td>
<td><input type="text" class="form-control" name="jumlah_warna" id="jumlah_warna" placeholder="input here...." form="spk_rincian"/></td>
<td><input type="number" class="form-control" name="jumlah_warna_muka" id="jumlah_warna_muka" placeholder="input here...." form="spk_rincian"/></td>

<td><input type="number" class="form-control" name="jumlah_cetak" id="jumlah_cetak" placeholder="input here...." form="spk_rincian"/></td>
<td><input type="number" class="form-control" name="insheet_cetak" id="insheet_cetak" placeholder="input here...." form="spk_rincian"/></td>
<td><input type="number" class="form-control" name="total_cetak" id="total_cetak" placeholder="input here...." form="spk_rincian"/></td>
<td><input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="input here...." form="spk_rincian"/></td>
<td style="width:40px">
<button type="submit" class="btn btn-sm" form="spk_rincian" title="Add" id="rincian_submit" >
<i class="fa fa-plus" style="color:green;" title="Add"></i>
</button></td>
</tr>

</table>
</div>
</form>
<!----------------------------------------------------------->


<table border="1" style="width: 100%;" align="left">

<tr>
<td rowspan="6"><label>Bentuk </label></td>

<!-- ----------- -->
<td>
<table border="1" style="width:100%; margin-top: 0px;">
<tr>
<td>

<table style="width:100%;">
<tr>
<td style="width:100px">Jahit Kawat</td> 
<td style="width:50px"><input type="checkbox" name="bentuk" value="Jahit Kawat"disabled></td> 
<td><input type="text" class="form-control" name="bentuk_keterangan" placeholder="input here...." disabled/></td>
</tr>
<tr>
<td style="width:100px">Soft Cover</td> 
<td style="width:50px"><input type="checkbox" name="bentuk" value="Soft Cover" disabled></td> 
<td><input type="text" class="form-control" name="bentuk_keterangan" placeholder="input here...." disabled/></td>
</tr>
</td>
</tr>

<tr>
<td style="width:100px">Potong Jadi</td> 
<td style="width:50px"><input type="checkbox" name="bentuk" value="Potong Jadi" disabled></td> 
<td><input type="text" class="form-control" name="bentuk_keterangan" placeholder="input here...." disabled/></td>
</tr>
<tr>
<td style="width:100px">Lipat</td> 
<td style="width:50px"><input type="checkbox" name="bentuk" value="Lipat" disabled></td> 
<td><input type="text" class="form-control" name="bentuk_keterangan" placeholder="input here...." disabled/></td>
</tr>
<tr>
<td style="width:100px">Die Cutting</td> 
<td style="width:50px"><input type="checkbox" name="bentuk" value="Die Cutting" disabled></td> 
<td><input type="text" class="form-control" name="bentuk_keterangan" placeholder="input here...." disabled/></td>
</tr>
<tr>
<td style="width:100px">Lain Lain</td> 
<td style="width:50px"><input type="checkbox" name="bentuk" value="Lain Lain" disabled></td> 
<td><input type="text" class="form-control" name="bentuk_keterangan" placeholder="input here...." disabled/></td>
</tr>
</table></td>
</tr>
</table>

</td>
<!-- ----------- -->


<!-- ----------- -->
<td>

<table border="1" style="width:100%; margin-top: 0px;">
<tr>
<td ><label>Mesin</label></td>
<td><table style="width:100%;">
<tr>
<td style="width:100px">SM74</td> 
<td style="width:50px"><input type="checkbox" name="mesin_id" value="6" disabled></td> 
<td><input type="text" class="form-control" name="mesin_keterangan" placeholder="input here...." disabled/></td>
</tr>
<tr>
<td style="width:100px">SM52</td> 
<td style="width:50px"><input type="checkbox" name="mesin_id" value="7" disabled></td> 
<td><input type="text" class="form-control" name="mesin_keterangan" placeholder="input here...." disabled/></td>
</tr>
</table></td>
</tr>

<tr>
<td><label>Warna</label></td>
<td><table style="width:100%;">
<tr>
<td style="width:100px">Cyan</td> 
<td style="width:50px"><input type="checkbox" name="warna" value="Cyan" disabled></td> 
<td><input type="text" class="form-control" name="warna_keterangan" placeholder="input here...." disabled/></td>
</tr>
<tr>
<td style="width:100px">Magenta</td> 
<td style="width:50px"><input type="checkbox" name="warna" value="Magenta" disabled></td> 
<td><input type="text" class="form-control" name="warna_keterangan" placeholder="input here...." disabled/></td>
</tr>
<tr>
<td style="width:100px">Yellow</td> 
<td style="width:50px"><input type="checkbox" name="warna" value="Yellow" disabled></td> 
<td><input type="text" class="form-control" name="warna_keterangan" placeholder="input here...." disabled/></td>
</tr>
<tr>
<td style="width:100px">Black</td> 
<td style="width:50px"><input type="checkbox" name="warna" value="Black" disabled></td> 
<td><input type="text" class="form-control" name="warna_keterangan" placeholder="input here...." disabled/></td>
</tr>
</table></td>
</tr>
</table>

</td>
<!-- ----------- -->

</tr>
</table>

<!----------------------------------------------------------->

<table border="1" style="width: 100%;" align="left">
<tr>
<td style="width: 9.6%;"><label>Jumlah UP</label></td>
<td style="width: 45.1%;"><input type="number" class="form-control" name="jumlah_up" placeholder=".....UP" disabled/></td>

<!-- ----------- -->
<td>

<table border="1" style="width:100%; margin-top: 0px;">

<tr>
<td style="width:16%;"><label>ACUAN</label></td>
<td><table style="width:100%;">
<tr>
<td style="width:100px">Dummy</td> 
<td style="width:50px"><input type="checkbox" name="acuan" value="Dummy" disabled></td> 
<td style="width:100px">Buku Pantone</td> 
<td style="width:50px"><input type="checkbox" name="acuan" value="Buku Pantone" disabled></td> 
</tr>
<tr>
<td style="width:100px">Sample Cetakan</td> 
<td style="width:50px"><input type="checkbox" name="acuan" value="Sample Cetakan" disabled></td> 
<td style="width:100px">Print Digital</td> 
<td style="width:50px"><input type="checkbox" name="acuan" value="Print Digital" disabled></td> 
</tr>
<tr>
<td style="width:100px">File</td> 
<td style="width:50px"><input type="checkbox" name="acuan" value="File" disabled></td> 
</tr>
</table></td>
</tr>

</table>

</td>
<!-- ----------- -->

</tr>
</table>

<!----------------------------------------------------------->

<table border="1" style="width: 100%;" align="left">

<tr>
<td rowspan="6" style="width: 9.6%;"><label>Finishing </label></td>

<!-- ----------- -->
<td>
<table border="1" style="width:100%; margin-top: 0px;">
<tr>
<td>

<table style="width:100%;">
<tr>
<td style="width:100px">Laminating Glossy</td> 
<td style="width:50px"><input type="checkbox" name="finishing" value="Laminating Glossy" disabled></td> 
<td><input type="text" class="form-control" name="finishing_keterangan" placeholder="input here...." disabled/></td>
</tr>
<tr>
<td style="width:100px">Laminating Doff</td> 
<td style="width:50px"><input type="checkbox" name="finishing" value="Laminating Doff" disabled></td> 
<td><input type="text" class="form-control" name="finishing_keterangan" placeholder="input here...." disabled/></td>
</tr>
</td>
</tr>

<tr>
<td style="width:100px">Waterbase</td> 
<td style="width:50px"><input type="checkbox" name="finishing" value="Waterbase" disabled></td> 
<td><input type="text" class="form-control" name="finishing_keterangan" placeholder="input here...." disabled/></td>
</tr>
<tr>
<td style="width:100px">UV Vernish</td> 
<td style="width:50px"><input type="checkbox" name="finishing" value="UV Vernish" disabled></td> 
<td><input type="text" class="form-control" name="finishing_keterangan" placeholder="input here...." disabled/></td>
</tr>
<tr>
<td style="width:100px">Spot UV</td> 
<td style="width:50px"><input type="checkbox" name="finishing" value="Spot UV" disabled></td> 
<td><input type="text" class="form-control" name="finishing_keterangan" placeholder="input here...." disabled/></td>
</tr>
</table></td>
</tr>
</table>

</td>
<!-- ----------- -->


<!-- ----------- -->
<td>

<table border="1" style="width:100%; margin-top: 0px;">
<tr>

<td><table style="width:100%;">
<tr>
<td style="width:100px">Hot Stamping</td> 
<td style="width:50px"><input type="checkbox" name="finishing" value="Hot Stamping" disabled></td> 
<td><input type="text" class="form-control" name="finishing_keterangan" placeholder="input here...." disabled/></td>
</tr>
<tr>
<td style="width:100px">Emboss</td> 
<td style="width:50px"><input type="checkbox" name="finishing" value="Emboss" disabled></td> 
<td><input type="text" class="form-control" name="finishing_keterangan" placeholder="input here...." disabled/></td>
</tr>
</table></td>
</tr>

<tr>
<td><table style="width:100%;">
<tr>
<td style="width:100px">Deboss</td> 
<td style="width:50px"><input type="checkbox" name="finishing" value="Deboss" disabled></td> 
<td><input type="text" class="form-control" name="finishing_keterangan" placeholder="input here...." disabled/></td>
</tr>
<tr>
<td style="width:100px">Spiral</td> 
<td style="width:50px"><input type="checkbox" name="finishing" value="Spiral" disabled></td> 
<td><input type="text" class="form-control" name="finishing_keterangan" placeholder="input here...." disabled/></td>
</tr>
<tr>
<td style="width:100px">Lain Lain</td> 
<td style="width:50px"><input type="checkbox" name="finishing" value="Lain Lain" disabled></td> 
<td><input type="text" class="form-control" name="finishing_keterangan" placeholder="input here...." disabled/></td>
</tr>

</table></td>
</tr>
</table>

</td>
<!-- ----------- -->

</tr>
</table>
</tr>
</table>


<!---------------------------------PAGE 3-------------------------------------->
<!-- 
<table border="1" style="width: 100%; " align="center">
<tr>
<td colspan="10" style="background-color: #DCDCDC; "><center><b>PROSES PRODUKSI</b></center></td>
</tr>

<tr align="center">
<td>PROSES PRODUKSI</td>
<td>Hasil Good</td>
<td>NC</td>
<td>NG</td>
<td>Nama Operator</td>
<td>Mulai</td>
<td>Selesai</td>
<td>Paraf</td>
<td>Keterangan</td>
<td>Add</td>
</tr>

<tr align="center">
<td><input type="text" class="form-control" name="NoPO" id="NoPO" placeholder="input here...." disabled/></td>
<td><input type="text" class="form-control" name="NoPO" id="NoPO" placeholder="input here...." disabled/></td>
<td><input type="text" class="form-control" name="NoPO" id="NoPO" placeholder="input here...." disabled/></td>
<td><input type="text" class="form-control" name="NoPO" id="NoPO" placeholder="input here...." disabled/></td>
<td><input type="text" class="form-control" name="NoPO" id="NoPO" placeholder="input here...." disabled/></td>
<td><input type="text" class="form-control" name="NoPO" id="NoPO" placeholder="input here...." disabled/></td>
<td><input type="text" class="form-control" name="NoPO" id="NoPO" placeholder="input here...." disabled/></td>
<td><input type="text" class="form-control" name="NoPO" id="NoPO" placeholder="input here...." disabled/></td>
<td><input type="text" class="form-control" name="NoPO" id="NoPO" placeholder="input here...." disabled/></td>
<td style="width:40px"><i class="fa fa-plus" style="color:green;" title="Add"></i></td>
</tr>
</table> -->

<!----------------------------------PAGE 4-------------------------------------->

<table border="1" style="width: 100%; " align="center">
<tr>
<td colspan="10" style="background-color: #DCDCDC; "><center><b>KETERANGAN</b></center></td>
</tr>

<tr>
<td align="center"><textarea name="message" id="message" style="height: 150px; width: 1100px;" disabled></textarea></td>
</tr>

</table>

<br>
<center><a href="../admin/produksi_spk_view" class="btn btn-warning"  title="Back" >
<i class="fa fa-backward"> Back</i></a>

<!-- <a href="../admin/back_button" class="btn btn-success"  title="Save" disabled>
<i class="fa fa-check" > Save</i></a></center> -->

</div>
</div>
</div>
</div>

@endsection