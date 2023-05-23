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

$( "proses_mulai" ).datepicker({
  dateFormat: "dd/mm/yyyy"
}); 

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

input[type="date"],
form-control  {
   height: 30px;
   font-size: 12px;

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


<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<!-- <div class="panel-heading">Cek IP</div> -->
<div class="panel-body">
<form action="{{route('edit_spk')}}" method="GET" >{{ csrf_field() }}

@foreach($spk as $s)
<table border="1" style="width: 100%;" align="center">
<tr>
<td rowspan="3" colspan="2" style="width:20%"><center><img src="{{asset('picture/Depress.png') }}"style="width:60%;height:30%"></center></td>
<td align="center">FORMULIR</td>
<td>No. Dokumen</td>
<td style="width: 20%;"><input type="text" class="form-control" name="no_dokumen" value="{{$s->no_dokumen}}"   /></td>
</tr>

<tr>
<td align="center" rowspan="2"><h4><b>SURAT PERINTAH KERJA</b></h4></td>
<td>No. Revisi</td>
<td><input type="text" class="form-control" name="no_revisi" value="{{$s->no_revisi}}" /></td>
</tr>

<tr>
<td>Hal</td>
<td><input type="text" class="form-control" name="hal" value="{{$s->hal}}" /></td>
</tr>

<!-- -------------------- -->
<tr>
<td>Tanggal</td>
<td colspan="2"><input type="text" class="form-control" name="tanggal" value="{{\Carbon\Carbon::parse($s->tanggal)->format('d-M-Y')}}"  /></td>
<td>NO.PO</td>
<td><input type="text" class="form-control" name="no_po" value="{{$s->no_po}}"  /></td>
</tr>

<tr>
<td>Judul Pekerjaan</td>
<td colspan="2"><input type="text" class="form-control" name="judul" value="{{$s->judul}}"  /></td>
<td>Kode Item</td>
<td><input type="text" class="form-control" name="kode_item" value="{{$s->kode_item}}" /></td>
</tr>

<tr>
<td>No.SPK</td>
<td colspan="2"><input type="text" class="form-control" name="no_spk" value="{{$s->no_spk}}" /></td>
<td>Nama Customer</td>
<td><input type="text" class="form-control" name="nama_customer" value="{{$s->nama_customer}}" /></td>
</tr>

<tr>
<td>Jumlah Pesanan</td>
<td colspan="2"><input type="text" class="form-control" name="jumlah_pesanan" value="{{number_format($s->jumlah_pesanan)}}"  /></td>
<td>Jenis Pekerjaan</td>
<td><input type="text" class="form-control" name="jenis_kerjaan" value="{{$s->jenis_kerjaan}}"  /></td>
</tr>

<tr>
<td>Tanggal Pengiriman</td>
<td colspan="2"><input type="text" class="form-control" name="tgl_pengiriman" value="{{\Carbon\Carbon::parse($s->tgl_pengiriman)->format('d-M-Y')}}" /></td>
<td>NO.Sales Order</td>
<td><input type="text" class="form-control" name="no_sales_order" value="{{$s->no_sales_order}}" /></td>
</tr>
</table>
@endforeach

<table style="width: 100%; " align="center">
<tr align="right"><td><button type="submit" class="btn btn-warning btn-m"  title="Edit"><i class="fa fa-pencil"> Edit</i></td></tr>
<tr><td>&nbsp</td></tr>
</table>
<form>
<!---------------------------------PAGE 2-------------------------------------->


<!-- <form action="{{route('input_rincian')}}" method="POST" id="spk_rincian">{{ csrf_field() }}
</form> -->
<div style="overflow-x:auto;">
<table border="1" style="width: 100%; " align="center">
<tr>
<td colspan="11" style="background-color: #DCDCDC; "><center><b>RINCIAN PRODUK</b></center></td>
</tr>
@foreach($rincian as $d)
<tr>
<td colspan="2">Dimensi(L x W x H)/Ukuran</td>
<td colspan="9">
<input type="text" class="form-control" name="dimensi" value="{{$d->dimensi}}" placeholder="input here...."  /></td>
</tr>
@break
@endforeach

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
<td>Edit</td>
</tr>

@foreach($rincian as $i)
<!-- <tr align="center" style="color: red;">
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
</tr> -->



<tr align="center">
<td><select name="spesifikasi_proses" class="form-control " value="{{$i->spesifikasi_proses}}"  id="spesifikasi">
<option value="{{$i->spesifikasi_proses}}">{{$i->spesifikasi_proses}}</option> 
<option value="Cover">Cover</option>
<option value="Isi">Isi</option>
<option value="Lain">Lain Lain</option>
</select></td>
<td><input type="text" class="form-control" name="jenis_bahan" id="jenis_bahan" value="{{$i->jenis_bahan}}" /></td>

<td><input type="text" class="form-control" name="jumlah_katern" id="jumlah_katern" value="{{$i->jumlah_katern}}"/></td>

<td><input type="text" class="form-control" name="ukuran_kertas" id="ukuran_kertas" value="{{$i->ukuran_kertas}}"/></td>

<td><input type="text" class="form-control" name="jumlah_warna" id="jumlah_warna" value="{{$i->jumlah_warna}}" /></td>

<td><input type="text" class="form-control" name="jumlah_warna_muka" id="jumlah_warna_muka" value="{{$i->jumlah_warna_muka}}" /></td>

<td><input type="text" class="form-control" name="jumlah_cetak" id="jumlah_cetak" value="{{number_format($i->jumlah_cetak)}}" /></td>

<td><input type="text" class="form-control" name="insheet_cetak" id="insheet_cetak" value="{{number_format($i->insheet_cetak)}}" /></td>

<td><input type="text" class="form-control" name="total_cetak" id="total_cetak" value="{{number_format($i->total_cetak)}}" /></td>

<td><input type="text" class="form-control" name="keterangan" id="keterangan" value="{{$i->keterangan}}" /></td>

<td style="width:40px">
<button type="submit" class="btn btn-sm"  title="Edit" id="rincian_submit" >
<i class="fa fa-pencil" style="color:orange;" title="Edit"></i>
</button></td>
</tr>
@endforeach
</table>
</div>
<!----------------------------------------------------------->

@foreach($detail as $d)
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
<td style="width:50px"><input type="checkbox" name="bentuk" value="{{$d->bentuk}}" {{ $d->bentuk == 'Jahit Kawat' ? 'checked' : null }} ></td> 
<td><input type="text" class="form-control" name="bentuk_ket1" value="{{$d->bentuk_ket1}}" /></td>
</tr>
<tr>
<td style="width:100px">Soft Cover</td> 
<td style="width:50px"><input type="checkbox" name="bentuk" value="{{$d->bentuk}}" {{ $d->bentuk == 'Soft Cover' ? 'checked' : null }} ></td> 
<td><input type="text" class="form-control" name="bentuk_ket2" value="{{$d->bentuk_ket2}}"/></td>
</tr>
</td>
</tr>

<tr>
<td style="width:100px">Potong Jadi</td> 
<td style="width:50px"><input type="checkbox" name="bentuk" value="{{$d->bentuk}}" {{ $d->bentuk == 'Potong Jadi' ? 'checked' : null }} ></td> 
<td><input type="text" class="form-control" name="bentuk_ket3" value="{{$d->bentuk_ket3}}"/></td>
</tr>
<tr>
<td style="width:100px">Lipat</td> 
<td style="width:50px"><input type="checkbox" name="bentuk" value="{{$d->bentuk}}" {{ $d->bentuk == 'Lipat' ? 'checked' : null }} ></td> 
<td><input type="text" class="form-control" name="bentuk_ket4" value="{{$d->bentuk_ket4}}"/></td>
</tr>
<tr>
<td style="width:100px">Die Cutting</td> 
<td style="width:50px"><input type="checkbox" name="bentuk" value="{{$d->bentuk}}" {{ $d->bentuk == 'Die Cutting' ? 'checked' : null }} ></td> 
<td><input type="text" class="form-control" name="bentuk_ket5" value="{{$d->bentuk_ket5}}"/></td>
</tr>
<tr>
<td style="width:100px">Lain Lain</td> 
<td style="width:50px"><input type="checkbox" name="bentuk" value="{{$d->bentuk}}" {{ $d->bentuk == 'Lain Lain' ? 'checked' : null }} ></td> 
<td><input type="text" class="form-control" name="bentuk_ket6" value="{{$d->bentuk_ket6}}" /></td>
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
<td style="width:50px"><input type="checkbox" name="mesin_id" value="{{$d->mesin_id}}" {{ $d->mesin_id == 6 ? 'checked' : null }} ></td> 
<td><input type="text" class="form-control" name="mesin_ket1"  value="{{$d->mesin_ket1}}"/></td>
</tr>
<tr>
<td style="width:100px">SM52</td> 
<td style="width:50px"><input type="checkbox" name="mesin_id" value="{{$d->mesin_id}}" {{ $d->mesin_id == 7 ? 'checked' : null }} ></td> 
<td><input type="text" class="form-control" name="mesin_ket2"  value="{{$d->mesin_ket2}}" /></td>
</tr>
</table></td>
</tr>

<tr>
<td><label>Warna</label></td>
<td><table style="width:100%;">
<tr>
<td style="width:100px">Cyan</td> 
<td style="width:50px"><input type="checkbox" name="warna" value="{{$d->warna}}" {{ $d->warna == 'Cyan' ? 'checked' : null }} ></td> 
<td><input type="text" class="form-control" name="warna_ket1" value="{{$d->warna_ket1}}" /></td>
</tr>
<tr>
<td style="width:100px">Magenta</td> 
<td style="width:50px"><input type="checkbox" name="warna" value="{{$d->warna}}" {{ $d->warna == 'Magenta' ? 'checked' : null }} ></td> 
<td><input type="text" class="form-control" name="warna_ket2" value="{{$d->warna_ket2}}"  /></td>
</tr>
<tr>
<td style="width:100px">Yellow</td> 
<td style="width:50px"><input type="checkbox" name="warna" value="{{$d->warna}}" {{ $d->warna == 'Yellow' ? 'checked' : null }} ></td> 
<td><input type="text" class="form-control" name="warna_ket3"  value="{{$d->warna_ket3}}"/></td>
</tr>
<tr>
<td style="width:100px">Black</td> 
<td style="width:50px"><input type="checkbox" name="warna" value="{{$d->warna}}" {{ $d->warna == 'Black' ? 'checked' : null }} ></td> 
<td><input type="text" class="form-control" name="warna_ket4" value="{{$d->warna_ket4}}"  /></td>
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
<td style="width: 45.1%;"><input type="number" class="form-control" name="jumlah_up" value="{{$d->jumlah_up}}"  /></td>

<!-- ----------- -->
<td>

<table border="1" style="width:100%; margin-top: 0px;">

<tr>
<td style="width:16%;"><label>ACUAN</label></td>
<td><table style="width:100%;">
<tr>
<td style="width:100px">Dummy</td> 
<td style="width:50px"><input type="checkbox" name="acuan" value="{{$d->acuan}}" {{ $d->acuan == 'Dummy' ? 'checked' : null }} ></td> 
<td style="width:100px">Buku Pantone</td> 
<td style="width:50px"><input type="checkbox" name="acuan" value="{{$d->acuan}}" {{ $d->acuan == 'Buku Pantone' ? 'checked' : null }} ></td> 
</tr>
<tr>
<td style="width:100px">Sample Cetakan</td> 
<td style="width:50px"><input type="checkbox" name="acuan" value="{{$d->acuan}}" {{ $d->acuan == 'Sample Cetakan' ? 'checked' : null }} ></td> 
<td style="width:100px">Print Digital</td> 
<td style="width:50px"><input type="checkbox" name="acuan" value="{{$d->acuan}}" {{ $d->acuan == 'Print Digital' ? 'checked' : null }} ></td> 
</tr>
<tr>
<td style="width:100px">File</td> 
<td style="width:50px"><input type="checkbox" name="acuan"value="{{$d->acuan}}" {{ $d->acuan == 'File' ? 'checked' : null }} ></td> 
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
<td style="width:50px"><input type="checkbox" name="finishing" value="{{$d->finishing}}" {{ $d->finishing == 'Laminating Glossy' ? 'checked' : null }} ></td> 
<td><input type="text" class="form-control" name="finishing_ket1" value="{{$d->finishing_ket1}}" /></td>
</tr>
<tr>
<td style="width:100px">Laminating Doff</td> 
<td style="width:50px"><input type="checkbox" name="finishing" value="{{$d->finishing}}" {{ $d->finishing == 'Laminating Doff' ? 'checked' : null }} ></td> 
<td><input type="text" class="form-control" name="finishing_ket2" value="{{$d->finishing_ket2}}" /></td>
</tr>
</td>
</tr>

<tr>
<td style="width:100px">Waterbase</td> 
<td style="width:50px"><input type="checkbox" name="finishing" value="{{$d->finishing}}" {{ $d->finishing == 'Waterbase' ? 'checked' : null }} ></td> 
<td><input type="text" class="form-control" name="finishing_ket3" value="{{$d->finishing_ket3}}" /></td>
</tr>
<tr>
<td style="width:100px">UV Vernish</td> 
<td style="width:50px"><input type="checkbox" name="finishing" value="{{$d->finishing}}" {{ $d->finishing == 'UV Vernish' ? 'checked' : null }} ></td> 
<td><input type="text" class="form-control" name="finishing_ket4" value="{{$d->finishing_ket4}}" /></td>
</tr>
<tr>
<td style="width:100px">Spot UV</td> 
<td style="width:50px"><input type="checkbox" name="finishing" value="{{$d->finishing}}" {{ $d->finishing == 'Spot UV' ? 'checked' : null }} ></td> 
<td><input type="text" class="form-control" name="finishing_ket5" value="{{$d->finishing_ket5}}" /></td>
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
<td style="width:50px"><input type="checkbox" name="finishing" value="{{$d->finishing}}" {{ $d->finishing == 'Hot Stamping' ? 'checked' : null }} ></td> 
<td><input type="text" class="form-control" name="finishing_ket6" value="{{$d->finishing_ket6}}"  /></td>
</tr>
<tr>
<td style="width:100px">Emboss</td> 
<td style="width:50px"><input type="checkbox" name="finishing" value="{{$d->finishing}}" {{ $d->finishing == 'Emboss' ? 'checked' : null }} ></td> 
<td><input type="text" class="form-control" name="finishing_ket7" value="{{$d->finishing_ket7}}"  /></td>
</tr>
</table></td>
</tr>

<tr>
<td><table style="width:100%;">
<tr>
<td style="width:100px">Deboss</td> 
<td style="width:50px"><input type="checkbox" name="finishing" value="{{$d->finishing}}" {{ $d->finishing == 'Deboss' ? 'checked' : null }} ></td> 
<td><input type="text" class="form-control" name="finishing_ket8" value="{{$d->finishing_ket8}}" /></td>
</tr>
<tr>
<td style="width:100px">Spiral</td> 
<td style="width:50px"><input type="checkbox" name="finishing" value="{{$d->finishing}}" {{ $d->finishing == 'Spiral' ? 'checked' : null }} ></td> 
<td><input type="text" class="form-control" name="finishing_ket9" value="{{$d->finishing_ket9}}" /></td>
</tr>
<tr>
<td style="width:100px">Lain Lain</td> 
<td style="width:50px"><input type="checkbox" name="finishing" value="{{$d->finishing}}" {{ $d->finishing == 'Lain Lain' ? 'checked' : null }} ></td> 
<td><input type="text" class="form-control" name="finishing_ket10"  value="{{$d->finishing_ket10}}" /></td>
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

@endforeach
<table style="width: 100%; " align="center">
<tr align="right"><td><button type="submit" class="btn btn-warning btn-m"  title="Edit" id="rincian_submit" ><i class="fa fa-pencil"> Edit</i></td></tr>
<tr><td>&nbsp</td></tr>
</table>
<!---------------------------------PAGE 3-------------------------------------->
<!-- <form action="{{route('input_proses_produksi')}}" method="POST" id="proses_produksi">{{ csrf_field() }}
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
<td>Edit</td>
</tr>

@foreach($proses as $p)
<tr align="center" style="color: red;">
<td>{{$p->proses_produksi}}</td>
<td>{{$p->hasil_good}}</td>
<td>{{$p->nc}}</td>
<td>{{$p->ng}}</td>
<td>{{$p->nama_operator}}</td>
<td>{{\Carbon\Carbon::parse($p->mulai)->format('d-M-Y')}}</td>
<td>{{\Carbon\Carbon::parse($p->selesai)->format('d-M-Y')}}</td>
<td>{{$p->paraf}}</td>
<td>{{$p->keterangan}}</td>
<td>
<a href="{{ url('admin/delete_proses_produksi/'.$p->id) }}" title="Delete">
<i class="fa fa-trash" style="color:red;"></i></a>  
</td>
</tr>
@endforeach

<tr align="center">
<td><input type="text" class="form-control" name="proses_produksi" id="proses_produksi" placeholder="input here...."/></td>
<td><input type="text" class="form-control" name="hasil_good" id="hasil_good" placeholder="input here...."/></td>
<td><input type="text" class="form-control" name="nc" id="nc" placeholder="input here...."/></td>
<td><input type="text" class="form-control" name="ng" id="ng" placeholder="input here...."/></td>
<td><input type="text" class="form-control" name="nama_operator" id="nama_operator" placeholder="input here...."/></td>
<td><input type="date" class="form-control" name="mulai" id="proses_mulai" /></td>
<td><input type="date" class="form-control" name="selesai" id="selesai" placeholder="input here...."/></td>
<td><input type="text" class="form-control" name="paraf" id="paraf" placeholder="input here...."/></td>
<td><input type="text" class="form-control" name="keterangan_proses" id="keterangan_proses" placeholder="input here...."/></td>

<td style="width:40px">
<button type="submit" class="btn btn-sm" form="proses_produksi" title="Edit" id="detail_submit" >
<i class="fa fa-pencil" style="color:orange;" title="Edit"></i>
</button>
</td>

</tr>
</table>

</form> -->

<!----------------------------------PAGE 4-------------------------------------->

<table border="1" style="width: 100%; " align="center">
<tr>
<td colspan="10" style="background-color: #DCDCDC; "><center><b>KETERANGAN</b></center></td>
</tr>
@foreach($keterangan as $k)
<tr>
<td align="center" style="height: 90px; width: 100%;">
<font color="red"><b>{{$k->keterangan_produksi}}</b></font></td>
</tr>
@endforeach

</table>
<table style="width: 100%; " align="center">
<tr align="right"><td><button type="submit" class="btn btn-warning btn-m"  title="Edit" id="rincian_submit" ><i class="fa fa-pencil"> Edit</i></td></tr>
<tr><td>&nbsp</td></tr>
</table>

<br>
<center><a href="../admin/button_back_rincian" class="btn btn-warning"  title="Back">
<i class="fa fa-backward"> Back</i></a>

<!-- @foreach($spk as $s)
<a href="{{ url('admin/proses_done/'.$s->id)  }}" class="btn btn-success"  title="Submit">
<i class="fa fa-check"> Selesai</i></a></center>
@break
@endforeach -->

</div>
</div>
</div>
</div>


@endsection