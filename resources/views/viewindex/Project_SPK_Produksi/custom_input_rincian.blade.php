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

// supaya textbox hanya bisa input sekali

function onlyOne(checkbox) {
    var checkboxes = document.getElementsByName('bentuk')
    checkboxes.forEach((item) => {
        if (item !== checkbox) item.checked = false
    })
}

function onlyOne2(checkbox) {
    var checkboxes = document.getElementsByName('mesin_id')
    checkboxes.forEach((item) => {
        if (item !== checkbox) item.checked = false
    })
}

function onlyOne3(checkbox) {
    var checkboxes = document.getElementsByName('warna')
    checkboxes.forEach((item) => {
        if (item !== checkbox) item.checked = false
    })
}

function onlyOne4(checkbox) {
    var checkboxes = document.getElementsByName('acuan')
    checkboxes.forEach((item) => {
        if (item !== checkbox) item.checked = false
    })
}

function onlyOne5(checkbox) {
    var checkboxes = document.getElementsByName('finishing')
    checkboxes.forEach((item) => {
        if (item !== checkbox) item.checked = false
    })
}


function isChecked(checkbox, jahitform) {
    var button = document.getElementById(jahitform);
    if (checkbox.checked === true) {
        button.disabled = "";
    } else {
        button.disabled = "disabled";
    }
}



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


<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<!-- <div class="panel-heading">Cek IP</div> -->
<div class="panel-body">

@foreach($spk as $s)
<table border="1" style="width: 100%;" align="center">
<tr>
<td rowspan="3" colspan="2" style="width:20%"><center><img src="{{asset('picture/Depress.png') }}"style="width:60%;height:30%"></center></td>
<td align="center">FORMULIR</td>
<td>No. Dokumen</td>
<td style="width: 20%;"><input type="text" class="form-control" name="no_dokumen" value="{{$s->no_dokumen}}"  disabled /></td>
</tr>

<tr>
<td align="center" rowspan="2"><h4><b>SURAT PERINTAH KERJA</b></h4></td>
<td>No. Revisi</td>
<td><input type="text" class="form-control" name="no_revisi" value="{{$s->no_revisi}}"  disabled/></td>
</tr>

<tr>
<td>Hal</td>
<td><input type="text" class="form-control" name="hal" value="{{$s->hal}}"  disabled/></td>
</tr>

<!-- -------------------- -->
<tr>
<td>Tanggal</td>
<td colspan="2"><input type="text" class="form-control" name="tanggal" value="{{\Carbon\Carbon::parse($s->tanggal)->format('d-M-Y')}}"  disabled/></td>
<td>NO.PO</td>
<td><input type="text" class="form-control" name="no_po" value="{{$s->no_po}}"  disabled/></td>
</tr>

<tr>
<td>Judul Pekerjaan</td>
<td colspan="2"><input type="text" class="form-control" name="judul" value="{{$s->judul}}"  disabled/></td>
<td>Kode Item</td>
<td><input type="text" class="form-control" name="kode_item" value="{{$s->kode_item}}"  disabled/></td>
</tr>

<tr>
<td>No.SPK</td>
<td colspan="2"><input type="text" class="form-control" name="no_spk" value="{{$s->no_spk}}"  disabled/></td>
<td>Nama Customer</td>
<td><input type="text" class="form-control" name="nama_customer" value="{{$s->nama_customer}}" disabled/></td>
</tr>

<tr>
<td>Jumlah Pesanan</td>
<td colspan="2"><input type="text" class="form-control" name="jumlah_pesanan" value="{{$s->jumlah_pesanan}}"  disabled/></td>
<td>Jenis Pekerjaan</td>
<td><input type="text" class="form-control" name="jenis_kerjaan" value="{{$s->jenis_kerjaan}}"  disabled/></td>
</tr>

<tr>
<td>Tanggal Pengiriman</td>
<td colspan="2"><input type="text" class="form-control" name="tgl_pengiriman" value="{{\Carbon\Carbon::parse($s->tgl_pengiriman)->format('d-M-Y')}}"  disabled/></td>
<td>NO.Sales Order</td>
<td><input type="text" class="form-control" name="no_sales_order" value="{{$s->no_sales_order}}" disabled/></td>
</tr>
</table>
@endforeach
<!---------------------------------PAGE 2-------------------------------------->


<form action="{{route('input_rincian')}}" method="POST" id="spk_rincian">{{ csrf_field() }}
</form>
<div style="overflow-x:auto;">
<table border="1" style="width: 100%; " align="center">
<tr>
<td colspan="11" style="background-color: #DCDCDC; "><center><b>RINCIAN PRODUK</b></center></td>
</tr>
@foreach($dimensi as $d)
<tr>
<td colspan="2">Dimensi(L x W x H)/Ukuran</td>
<td colspan="9">
<input type="text" class="form-control" name="dimensi" value="{{$d->dimensi}}" placeholder="input here...." disabled /></td>
</tr>
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
<td>{{$i->jumlah_cetak}}</td>
<td>{{$i->insheet_cetak}}</td>
<td>{{$i->total_cetak}}</td>
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
<td><input type="text" class="form-control" name="jumlah_katern" id="jumlah_katern" placeholder="input here...." form="spk_rincian"/></td>
<td><input type="text" class="form-control" name="ukuran_kertas" id="ukuran_kertas" placeholder="input here...." form="spk_rincian"/></td>
<td><input type="text" class="form-control" name="jumlah_warna" id="jumlah_warna" placeholder="input here...." form="spk_rincian"/></td>
<td><input type="text" class="form-control" name="jumlah_warna_muka" id="jumlah_warna_muka" placeholder="input here...." form="spk_rincian"/></td>

<td><input type="text" class="form-control" name="jumlah_cetak" id="jumlah_cetak" placeholder="input here...." form="spk_rincian"/></td>
<td><input type="text" class="form-control" name="insheet_cetak" id="insheet_cetak" placeholder="input here...." form="spk_rincian"/></td>
<td><input type="text" class="form-control" name="total_cetak" id="total_cetak" placeholder="input here...." form="spk_rincian"/></td>
<td><input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="input here...." form="spk_rincian"/></td>
<td style="width:40px">
<button type="submit" class="btn btn-sm" form="spk_rincian" title="Add" id="rincian_submit" >
<i class="fa fa-plus" style="color:green;" title="Add"></i>
</button></td>
</tr>

</table>
</div>
<!----------------------------------------------------------->

<form action="{{route('input_rincian_detail')}}" method="POST" id="rincian_detail">{{ csrf_field() }}

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
<td style="width:50px"><input type="checkbox" name="bentuk" id ="jahit" value="Jahit Kawat" onclick="onlyOne(this)" onchange="isChecked(this, 'jahitform')"> </td> 
<td><input type="text" class="form-control" name="bentuk_ket1" placeholder="input here...." id ="jahitform" disabled/></td>
</tr>
<tr>
<td style="width:100px">Soft Cover</td> 
<td style="width:50px"><input type="checkbox" name="bentuk" value="Soft Cover" onclick="onlyOne(this)" id="softcover" onchange="isChecked(this, 'softcoverform')"></td> 
<td><input type="text" class="form-control" name="bentuk_ket2" placeholder="input here...." id="softcoverform" disabled/></td>
</tr>
</td>
</tr>

<tr>
<td style="width:100px">Potong Jadi</td> 
<td style="width:50px"><input type="checkbox" name="bentuk" value="Potong Jadi" onclick="onlyOne(this)" id="potongjadi" onchange="isChecked(this, 'potongjadiform')"></td> 
<td><input type="text" class="form-control" name="bentuk_ket3" placeholder="input here...." id="potongjadiform" disabled/></td>
</tr>
<tr>
<td style="width:100px">Lipat</td> 
<td style="width:50px"><input type="checkbox" name="bentuk" value="Lipat" onclick="onlyOne(this)" id="lipat" onchange="isChecked(this, 'lipatform')"></td> 
<td><input type="text" class="form-control" name="bentuk_ket4" placeholder="input here...." id="lipatform" disabled/></td>
</tr>
<tr>
<td style="width:100px">Die Cutting</td> 
<td style="width:50px"><input type="checkbox" name="bentuk" value="Die Cutting" onclick="onlyOne(this)" id="diecutting" onchange="isChecked(this, 'diecuttingform')"></td> 
<td><input type="text" class="form-control" name="bentuk_ket5" placeholder="input here...." id="diecuttingform" disabled/></td>
</tr>
<tr>
<td style="width:100px">Lain Lain</td> 
<td style="width:50px"><input type="checkbox" name="bentuk" value="Lain Lain" onclick="onlyOne(this)" id="lainlain" onchange="isChecked(this, 'lainlainform')"></td> 
<td><input type="text" class="form-control" name="bentuk_ket6" placeholder="input here...." id="lainlainform" disabled/></td>
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
<td style="width:50px"><input type="checkbox" name="mesin_id" value="6" onclick="onlyOne2(this)" id="sm74" onchange="isChecked(this, 'sm74form')"></td> 
<td><input type="text" class="form-control" name="mesin_ket1" placeholder="input here...." id="sm74form" disabled/></td>
</tr>
<tr>
<td style="width:100px">SM52</td> 
<td style="width:50px"><input type="checkbox" name="mesin_id" value="7" onclick="onlyOne2(this)" id="sm52" onchange="isChecked(this, 'sm52form')"></td> 
<td><input type="text" class="form-control" name="mesin_ket2" placeholder="input here...." id="sm52form" disabled/></td>
</tr>
</table></td>
</tr>

<tr>
<td><label>Warna</label></td>
<td><table style="width:100%;">
<tr>
<td style="width:100px">Cyan</td> 
<td style="width:50px"><input type="checkbox" name="warna" value="Cyan" onclick="onlyOne3(this)" id="cyan" onchange="isChecked(this, 'cyanform')"></td> 
<td><input type="text" class="form-control" name="warna_ket1" placeholder="input here...." id="cyanform" disabled/></td>
</tr>
<tr>
<td style="width:100px">Magenta</td> 
<td style="width:50px"><input type="checkbox" name="warna" value="Magenta" onclick="onlyOne3(this)" id="magenta" onchange="isChecked(this, 'magentaform')"></td> 
<td><input type="text" class="form-control" name="warna_ket2" placeholder="input here...." id="magentaform" disabled/></td>
</tr>
<tr>
<td style="width:100px">Yellow</td> 
<td style="width:50px"><input type="checkbox" name="warna" id="yellow" value="Yellow" onclick="onlyOne3(this)" onchange="isChecked(this, 'yellowform')"></td> 
<td><input type="text" class="form-control" name="warna_ket3" id="yellowform" placeholder="input here...." disabled/></td>
</tr>
<tr>
<td style="width:100px">Black</td> 
<td style="width:50px"><input type="checkbox" name="warna" id="black" value="Black" onclick="onlyOne3(this)" onchange="isChecked(this, 'blackform')"></td> 
<td><input type="text" class="form-control" name="warna_ket4" placeholder="input here...." id="blackform" disabled/></td>
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
<td style="width: 45.1%;"><input type="number" class="form-control" name="jumlah_up" placeholder=".....UP"/></td>

<!-- ----------- -->
<td>

<table border="1" style="width:100%; margin-top: 0px;">

<tr>
<td style="width:16%;"><label>ACUAN</label></td>
<td><table style="width:100%;">
<tr>
<td style="width:100px">Dummy</td> 
<td style="width:50px"><input type="checkbox" name="acuan" value="Dummy" onclick="onlyOne4(this)"></td> 
<td style="width:100px">Buku Pantone</td> 
<td style="width:50px"><input type="checkbox" name="acuan" value="Buku Pantone"onclick="onlyOne4(this)"></td> 
</tr>
<tr>
<td style="width:100px">Sample Cetakan</td> 
<td style="width:50px"><input type="checkbox" name="acuan" value="Sample Cetakan" onclick="onlyOne4(this)"></td> 
<td style="width:100px">Print Digital</td> 
<td style="width:50px"><input type="checkbox" name="acuan" value="Print Digital" onclick="onlyOne4(this)"></td> 
</tr>
<tr>
<td style="width:100px">File</td> 
<td style="width:50px"><input type="checkbox" name="acuan" value="File" onclick="onlyOne4(this)"></td> 
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
<td style="width:50px"><input type="checkbox" name="finishing" value="Laminating Glossy" onclick="onlyOne5(this)" onchange="isChecked(this, 'finishingket1')" id="glossy"></td> 
<td><input type="text" class="form-control" name="finishing_ket1" placeholder="input here...." id="finishingket1" disabled/></td>
</tr>
<tr>
<td style="width:100px">Laminating Doff</td> 
<td style="width:50px"><input type="checkbox" name="finishing" value="Laminating Doff" onclick="onlyOne5(this)" onchange="isChecked(this, 'finishingket2')" id="doff"></td> 
<td><input type="text" class="form-control" name="finishing_ket2" placeholder="input here...." id="finishingket2" disabled/></td>
</tr>
</td>
</tr>

<tr>
<td style="width:100px">Waterbase</td> 
<td style="width:50px"><input type="checkbox" name="finishing" value="Waterbase" onclick="onlyOne5(this)" onchange="isChecked(this, 'finishingket3')" id="waterbase"></td> 
<td><input type="text" class="form-control" name="finishing_ket3" placeholder="input here...." id="finishingket3" disabled/></td>
</tr>
<tr>
<td style="width:100px">UV Vernish</td> 
<td style="width:50px"><input type="checkbox" name="finishing" value="UV Vernish" onclick="onlyOne5(this)" onchange="isChecked(this, 'finishingket4')" id="vernish"></td> 
<td><input type="text" class="form-control" name="finishing_ket4" placeholder="input here...." id="finishingket4" disabled/></td>
</tr>
<tr>
<td style="width:100px">Spot UV</td> 
<td style="width:50px"><input type="checkbox" name="finishing" value="Spot UV" onclick="onlyOne5(this)" onchange="isChecked(this, 'finishingket5')" id="spot"></td> 
<td><input type="text" class="form-control" name="finishing_ket5" placeholder="input here...." id="finishingket5" disabled/></td>
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
<td style="width:50px"><input type="checkbox" name="finishing" value="Hot Stamping" onclick="onlyOne5(this)" onchange="isChecked(this, 'finishingket6')" id="hot"></td> 
<td><input type="text" class="form-control" name="finishing_ket6" placeholder="input here...." id="finishingket6" disabled/></td>
</tr>
<tr>
<td style="width:100px">Emboss</td> 
<td style="width:50px"><input type="checkbox" name="finishing" value="Emboss" onclick="onlyOne5(this)" onchange="isChecked(this, 'finishingket7')" id="emboss"></td> 
<td><input type="text" class="form-control" name="finishing_ket7" placeholder="input here...." id="finishingket7" disabled/></td>
</tr>
</table></td>
</tr>

<tr>
<td><table style="width:100%;">
<tr>
<td style="width:100px">Deboss</td> 
<td style="width:50px"><input type="checkbox" name="finishing" value="Deboss" onclick="onlyOne5(this)" onchange="isChecked(this, 'finishingket8')" id="deboss"></td> 
<td><input type="text" class="form-control" name="finishing_ket8" placeholder="input here...." id="finishingket8" disabled/></td>
</tr>
<tr>
<td style="width:100px">Spiral</td> 
<td style="width:50px"><input type="checkbox" name="finishing" value="Spiral" onclick="onlyOne5(this)" onchange="isChecked(this, 'finishingket9')" id="spiral"></td> 
<td><input type="text" class="form-control" name="finishing_ket9" placeholder="input here...." id="finishingket9" disabled/></td>
</tr>
<tr>
<td style="width:100px">Lain Lain</td> 
<td style="width:50px"><input type="checkbox" name="finishing" value="Lain Lain" onclick="onlyOne5(this)" onchange="isChecked(this, 'finishingket10')" id="lain"></td> 
<td><input type="text" class="form-control" name="finishing_ket10" placeholder="input here...." id="finishingket10" disabled/></td>
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

@foreach($proses as $p)
<tr align="center" style="color: red;">
<td>{{$p->proses_produksi}}</td>
<td>{{$p->hasil_good}}</td>
<td>{{$p->nc}}</td>
<td>{{$p->ng}}</td>
<td>{{$p->nama_operator}}</td>
<td>{{$p->mulai}}</td>
<td>{{$p->selesai}}</td>
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
<td><input type="date" class="form-control" name="mulai" id="mulai" placeholder="input here...."/></td>
<td><input type="date" class="form-control" name="selesai" id="selesai" placeholder="input here...."/></td>
<td><input type="text" class="form-control" name="paraf" id="paraf" placeholder="input here...."/></td>
<td><input type="text" class="form-control" name="keterangan_proses" id="keterangan_proses" placeholder="input here...."/></td>
<td style="width:40px">
<button type="submit" class="btn btn-sm" form="rincian_detail" title="Add" id="detail_submit" >
<i class="fa fa-plus" style="color:green;" title="Add"></i>
</button></td>
</tr>
</table>
 -->

<!----------------------------------PAGE 4-------------------------------------->

<table border="1" style="width: 100%; " align="center">
<tr>
<td colspan="10" style="background-color: #DCDCDC; "><center><b>KETERANGAN</b></center></td>
</tr>

<tr>
<td align="center"><textarea name="keterangan_produksi" id="keterangan_produksi" style="height: 150px; width: 1100px;"></textarea></td>
</tr>

</table>

<br>
<center><a href="../admin/button_back_rincian" class="btn btn-warning"  title="Back">
<i class="fa fa-backward"> Back</i></a>

<button type="submit" class="btn btn-success" form="rincian_detail" title="Save"><i class="fa fa-check"> Save</i>
</button>
</center>
</form>

</div>
</div>
</div>
</div>


@endsection