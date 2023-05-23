<html>
    <head>
        <title class="">Print SPK</title>
        <link rel="stylesheet" href="main.css" />
        <link rel="stylesheet" media="print" href="print.css" />    
    <style>
                body {
                background: rgb(255,255,255); 
                }
                page {
                background: white;
                display: block;
                margin: 0 auto;
                margin-bottom: 0.3cm;
                box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
                }
                page[size="A4"] {  
                width: 21cm;
                height: 29.7cm; 
                }
                @media print {
                body, page {
                 margin: 0;
                 box-shadow: 0;
                 }
                  }
                    
                h2{
                    font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;;
                    
                }

                p{
                    font-size: 12px;
                    font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;;
                }

                td{
                    font-size: 9px;
                    font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;;
                }
                thead{
                    font-size: 8px;
                    font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;
                }

                input[type=text] {
  border: white;
  border-radius: 4px;
}


</style>
</head>

<body>

<!---------------------------------PAGE 1---------------------------------->

<div class="container">
<div class="col-sm-12">
<div class=""></div>

@foreach($query2 as $s)
<table border="1" style="width: 100%;border-collapse: collapse;" >
<tr>
<td rowspan="3" colspan="2" style="width:20%"><center><img src="{{asset('picture/Depress.png')}}"style="width:60%;"></center></td>
<td align="center" colspan="2"><b>FORMULIR</b></td>
<td>No. Dokumen</td>
<td style="width: 20%;"><input type="text" class="form-control" name="no_dokumen" value="{{$s->no_dokumen}}"  disabled /></td>
</tr>

<tr>
<td align="center" rowspan="2" colspan="2"><h4><b>SURAT PERINTAH KERJA</b></h4></td>
<td>No. Revisi</td>
<td><input type="text" class="form-control" name="no_revisi" value="{{$s->no_revisi}}" disabled/></td>
</tr>

<tr>
<td>Hal</td>
<td><input type="text" class="form-control" name="hal" value="{{$s->hal}}" disabled/></td>
</tr>

<!-- -------------------- -->
<tr>
<td style="width:15%">Tanggal</td>
<td colspan="3"><input type="text" class="form-control" name="tanggal" value="{{\Carbon\Carbon::parse($s->tanggal)->format('d-M-Y')}}"  disabled/></td>
<td>NO.PO</td>
<td><input type="text" class="form-control" name="no_po" value="{{$s->no_po}}"  disabled/></td>
</tr>

<tr>
<td >Judul Pekerjaan</td>
<td colspan="3"><input type="text" class="form-control"  style="width: 100%;"name="judul" value="{{$s->judul}}"  disabled/></td>
<td>Kode Item</td>
<td><input type="text" class="form-control" name="kode_item" value="{{$s->kode_item}}" disabled/></td>
</tr>

<tr>
<td >No.SPK</td>
<td colspan="3"><input type="text" class="form-control" name="no_spk" value="{{$s->no_spk}}" disabled/></td>
<td>Nama Customer</td>
<td><input type="text" class="form-control" name="nama_customer" value="{{$s->nama_customer}}" disabled/></td>
</tr>

<tr>
<td >Jumlah Pesanan</td>
<td colspan="3"><input type="text" class="form-control" name="jumlah_pesanan" value="{{number_format($s->jumlah_pesanan)}}"  disabled/></td>
<td>Jenis Pekerjaan</td>
<td><input type="text" class="form-control" name="jenis_kerjaan" value="{{$s->jenis_kerjaan}}"  disabled/></td>
</tr>

<tr>
<td>Tanggal Pengiriman</td>
<td  colspan="3"><input type="text" class="form-control" name="tgl_pengiriman" value="{{\Carbon\Carbon::parse($s->tgl_pengiriman)->format('d-M-Y')}}" disabled/></td>
<td>NO.Sales Order</td>
<td><input type="text" class="form-control" name="no_sales_order" value="{{$s->no_sales_order}}" disabled/></td>
</tr>
</table>
@endforeach


<!-------------------------------PAGE 2-------------------------------------->

<div style="overflow-x:auto;">
<table border="1" style="width: 100%;border-collapse: collapse; " >
<tr>
<td colspan="10" style="background-color: #DCDCDC; "><center><b>RINCIAN PRODUK</b></center></td>
</tr>
@foreach($query as $d)

<tr>
<td colspan="2">Dimensi(L x W x H)/Ukuran</td>
<td colspan="8">
<input type="text" class="form-control" name="dimensi" value="{{$d->dimensi}}" placeholder="input here...." disabled /></td>
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

</tr>

@foreach($query as $i)
<tr align="center">
<td><font color="red">{{$i->spesifikasi_proses}}</font></td>
<td><font color="red">{{$i->jenis_bahan}}</font></td>
<td><font color="red">{{$i->jumlah_katern}}</font></td>
<td><font color="red">{{$i->ukuran_kertas}}</font></td>
<td><font color="red">{{$i->jumlah_warna}}</font></td>
<td><font color="red">{{$i->jumlah_warna_muka}}</font></td>
<td><font color="red">{{number_format($i->jumlah_cetak)}}</font></td>
<td><font color="red">{{number_format($i->insheet_cetak)}}</font></td>
<td><font color="red">{{number_format($i->total_cetak)}}</font></td>
<td><font color="red">{{$i->keterangan}}</font></td>

</tr>
@endforeach

</table>
</div>

<!----------------------------------------------------------->

@foreach($query6 as $d)

<table border="1" style="width: 100%;border-collapse: collapse;">

<tr>
<td style="width: 10%;"><label><b>Bentuk </b></label></td>
<td>

<!-- ----------- -->

<table border="" style="width:100%;">
<tr>
<td>

<!---->
<table style="width:100%;" border="1">
<tr>
<td style="width:100px;border:solid transparent">Jahit Kawat</td> 
<td style="width:20px;border:solid transparent" ><input type="checkbox" name="bentuk" value="{{$d->bentuk}}" {{ $d->bentuk == 'Jahit Kawat' ? 'checked' : null }}></td> 
<td style="width:50px;"><input type="text" name="bentuk_ket1" value="{{$d->bentuk_ket1}}"></td>
</tr>
<tr>
<td style="width:100px;border:solid transparent">Soft Cover</td> 
<td style="width:20px;border:solid transparent"><input type="checkbox" name="bentuk" value="{{$d->bentuk}}" {{ $d->bentuk == 'Soft Cover' ? 'checked' : null }} disabled></td> 
<td style="width:50px"><input type="text" name="bentuk_ket2" value="{{$d->bentuk_ket2}}"></td>
</tr>

<tr>
<td style="width:100px;border:solid transparent">Potong Jadi</td> 
<td style="width:20px;border:solid transparent"><input type="checkbox" name="bentuk" value="{{$d->bentuk}}" {{ $d->bentuk == 'Potong Jadi' ? 'checked' : null }} disabled></td> 
<td style="width:50px"><input type="text" name="bentuk_ket3" value="{{$d->bentuk_ket3}}"></td>
</tr>
<tr>
<td style="width:100px;border:solid transparent">Lipat</td> 
<td style="width:20px;border:solid transparent"><input type="checkbox" name="bentuk" value="{{$d->bentuk}}" {{ $d->bentuk == 'Lipat' ? 'checked' : null }} disabled></td>
<td style="width:50px"><input type="text" name="bentuk_ket4" value="{{$d->bentuk_ket4}}"></td>
</tr>
<tr>
<td style="width:100px;border:solid transparent">Die Cutting</td> 
<td style="width:20px;border:solid transparent"><input type="checkbox" name="bentuk" value="{{$d->bentuk}}" {{ $d->bentuk == 'Die Cutting' ? 'checked' : null }} disabled></td> 
<td style="width:50px"><input type="text" name="bentuk_ket5" value="{{$d->bentuk_ket5}}"></td>
</tr>
<tr>
<td style="width:100px;border:solid transparent">Lain Lain</td> 
<td style="width:20px;border:solid transparent"><input type="checkbox" name="bentuk" value="{{$d->bentuk}}" {{ $d->bentuk == 'Lain Lain' ? 'checked' : null }} disabled></td> 
<td style="width:50px"><input type="text" name="bentuk_ket6" value="{{$d->bentuk_ket6}}"></td>
</tr>
</table>
<!---->
</td>
</tr>
</table>

<!-- ----------- -->
</td>

<td>
<!-- ----------- -->

<table border="" style="width:100%;">
<tr>
<td>

<!---->
<table style="width:100%;" border="1">
<tr>
<td rowspan="2" style="width:50px;border:solid transparent"><b>Mesin </b></td>
<td style="width:100px;border:solid transparent">SM 74</td> 
<td style="width:20px;border:solid transparent"><input type="checkbox" name="mesin_id" value="{{$d->mesin_id}}" {{ $d->mesin_id == 6 ? 'checked' : null }} disabled></td> 
<td style="width:50px"><input type="text" name="mesin_ket1" value="{{$d->mesin_ket1}}"></td>
</tr>
<tr>
<td style="width:100px;border:solid transparent">SM 52</td> 
<td style="width:20px;border:solid transparent"><input type="checkbox" name="mesin_id" value="{{$d->mesin_id}}" {{ $d->mesin_id == 7 ? 'checked' : null }} disabled></td>
<td style="width:50px"><input type="text" name="mesin_ket2" value="{{$d->mesin_ket2}}"></td>
</tr>
</table>

<table style="width:100%;" border="1">
<tr>
<td rowspan="4" style="width:50px;border:solid transparent"><b>Warna </b></td>
<td style="width:100px;border:solid transparent">Cyan</td> 
<td style="width:20px;border:solid transparent"><input type="checkbox" name="warna" value="{{$d->warna}}" {{ $d->warna == 'Cyan' ? 'checked' : null }} disabled></td>
<td style="width:50px"><input type="text" name="warna_ket1" value="{{$d->warna_ket1}}"></td>
</tr>
<tr>
<td style="width:100px;border:solid transparent">Magenta</td> 
<td style="width:20px;border:solid transparent"><input type="checkbox" name="warna" value="{{$d->warna}}" {{ $d->warna == 'Magenta' ? 'checked' : null }} disabled></td> 
<td style="width:50px"><input type="text" name="warna_ket2" value="{{$d->warna_ket2}}"></td>
</tr>
<tr>
<td style="width:100px;border:solid transparent">Yellow</td> 
<td style="width:20px;border:solid transparent"><input type="checkbox" name="warna" value="{{$d->warna}}" {{ $d->warna == 'Yellow' ? 'checked' : null }} disabled></td> 
<td style="width:50px"><input type="text" name="warna_ket3" value="{{$d->warna_ket3}}"></td>
</tr>
<tr>
<td style="width:100px;border:solid transparent">Black</td> 
<td style="width:20px;border:solid transparent"><input type="checkbox" name="warna" value="{{$d->warna}}" {{ $d->warna == 'Black' ? 'checked' : null }} disabled></td> 
<td style="width:50px"><input type="text" name="warna_ket4" value="{{$d->warna_ket4}}"></td>
</tr>
</table>

<!---->
</td>
</tr>
</table>

<!-- ----------- -->
</td>
</tr>
</table>


<!-------------------------------------------------------->

<table style="width:100%; border-collapse: collapse;" border="1">
<tr>
<td style="width: 10%;"><label><b>Jumlah UP </b></label></td>
<td style="width:41%;"><font color="red"><b><input type="text" name="bentuk" value="{{$d->jumlah_up}} UP"></b></font></td>
<!---->
<td>
<table style="width:100%;" border="">
<tr>
<td rowspan="4" style="width:50px;border:solid transparent"><b>ACUAN </b></td>
<td style="width:100px;border:solid transparent">Dummy</td> 
<td style="width:20px;border:solid transparent"><input type="checkbox" name="acuan" value="{{$d->acuan}}" {{ $d->acuan == 'Dummy' ? 'checked' : null }} disabled></td> 
<td style="width:100px;border:solid transparent">Buku Pantone</td> 
<td style="width:20px;border:solid transparent"><input type="checkbox" name="acuan" value="{{$d->acuan}}" {{ $d->acuan == 'Buku Pantone' ? 'checked' : null }} disabled></td>
</tr>
<tr>
<td style="width:100px;border:solid transparent">Sample Cetakan</td> 
<td style="width:20px;border:solid transparent"><input type="checkbox" name="acuan" value="{{$d->acuan}}" {{ $d->acuan == 'Sample Cetakan' ? 'checked' : null }} disabled></td> 
<td style="width:100px;border:solid transparent">Print Digital</td> 
<td style="width:20px;border:solid transparent"><input type="checkbox" name="acuan" value="{{$d->acuan}}" {{ $d->acuan == 'Print Digital' ? 'checked' : null }} disabled></td>
</tr>
<tr>
<td style="width:100px;border:solid transparent">File</td> 
<td style="width:20px;border:solid transparent"><input type="checkbox" name="acuan"value="{{$d->acuan}}" {{ $d->acuan == 'File' ? 'checked' : null }} disabled></td> 
</tr>
</table>
</td>

</tr>
</table>
<!-------------------------------------------------------->

<!----------------------------------------------------------->
<table border="1" style="width: 100%;border-collapse: collapse;">

<tr>
<td style="width: 10%;"><label><b>Finishing </b> </label></td>
<td>

<!-- ----------- -->

<table border="" style="width:100%;">
<tr>
<td>

<!---->
<table style="width:100%; " border="1">
<tr>
<td style="width:100px;border:solid transparent">Laminating Glossy</td> 
<td style="width:20px;border:solid transparent" ><input type="checkbox" name="finishing" value="{{$d->finishing}}" {{ $d->finishing == 'Laminating Glossy' ? 'checked' : null }} disabled></td>
<td style="width:50px;"><input type="text" name="finishing_ket1" value="{{$d->finishing_ket1}}"></td>
</tr>
<tr>
<td style="width:100px;border:solid transparent">Laminating Doff</td> 
<td style="width:20px;border:solid transparent"><input type="checkbox" name="finishing" value="{{$d->finishing}}" {{ $d->finishing == 'Laminating Doff' ? 'checked' : null }} disabled></td> 
<td style="width:50px"><input type="text" name="finishing_ket2" value="{{$d->finishing_ket2}}"></td>
</tr>

<tr>
<td style="width:100px;border:solid transparent">Waterbase</td> 
<td style="width:20px;border:solid transparent"><input type="checkbox" name="finishing" value="{{$d->finishing}}" {{ $d->finishing == 'Waterbase' ? 'checked' : null }} disabled></td> 
<td style="width:50px"><input type="text" name="finishing_ket3" value="{{$d->finishing_ket3}}"></td>
</tr>
<tr>
<td style="width:100px;border:solid transparent">UV Vernish</td> 
<td style="width:20px;border:solid transparent"><input type="checkbox" name="finishing" value="{{$d->finishing}}" {{ $d->finishing == 'UV Vernish' ? 'checked' : null }} disabled></td> 
<td style="width:50px"><input type="text" name="finishing_ket4" value="{{$d->finishing_ket4}}"></td>
</tr>
<tr>
<td style="width:100px;border:solid transparent">Spot UV</td> 
<td style="width:20px;border:solid transparent"><input type="checkbox" name="finishing" value="{{$d->finishing}}" {{ $d->finishing == 'Spot UV' ? 'checked' : null }} disabled></td> 
<td style="width:50px"><input type="text" name="finishing_ket5" value="{{$d->finishing_ket5}}"></td>
</tr>
</table>
<!---->
</td>
</tr>
</table>

<!-- ----------- -->
</td>

<td>
<!-- ----------- -->

<table border="" style="width:100%;">
<tr>
<td>

<!---->
<table style="width:100%;" border="1" >
<tr>
<td style="width:100px;border:solid transparent">Hot Stamping</td> 
<td style="width:20px;border:solid transparent"><input type="checkbox" name="finishing" value="{{$d->finishing}}" {{ $d->finishing == 'Hot Stamping' ? 'checked' : null }} disabled></td> 
<td style="width:50px"><input type="text" name="finishing_ket6" value="{{$d->finishing_ket6}}"></td>
</tr>
<tr>
<td style="width:100px;border:solid transparent">Emboss</td> 
<td style="width:20px;border:solid transparent"><input type="checkbox" name="finishing" value="{{$d->finishing}}" {{ $d->finishing == 'Emboss' ? 'checked' : null }} disabled></td> 
<td style="width:50px"><input type="text" name="finishing_ket7" value="{{$d->finishing_ket7}}"></td>
</tr>

<tr>
<td style="width:100px;border:solid transparent">Deboss</td> 
<td style="width:20px;border:solid transparent"><input type="checkbox" name="finishing" value="{{$d->finishing}}" {{ $d->finishing == 'Deboss' ? 'checked' : null }} disabled></td> 
<td style="width:50px"><input type="text" name="finishing_ket8" value="{{$d->finishing_ket8}}"></td>
</tr>
<tr>
<td style="width:100px;border:solid transparent">Spiral</td> 
<td style="width:20px;border:solid transparent"><input type="checkbox" name="finishing" value="{{$d->finishing}}" {{ $d->finishing == 'Spiral' ? 'checked' : null }} disabled></td> 
<td style="width:50px"><input type="text" name="finishing_ket9" value="{{$d->finishing_ket9}}"></td>
</tr>
<tr>
<td style="width:100px;border:solid transparent">Lain Lain</td> 
<td style="width:20px;border:solid transparent"><input type="checkbox" name="finishing" value="{{$d->finishing}}" {{ $d->finishing == 'Lain Lain' ? 'checked' : null }} disabled></td> 
<td style="width:50px"><input type="text" name="finishing_ket10" value="{{$d->finishing_ket10}}"></td>
</tr>
</table>

<!---->
</td>
</tr>
</table>

<!-- ----------- -->
</td>
</tr>
</table>
@break
@endforeach
<!-------------------------------PAGE 3-------------------------------------->

<div style="overflow-x:auto;">
<table border="1" style="width: 100%; border-collapse: collapse;" >
<tr>
<td colspan="9" style="background-color: #DCDCDC; ">
<center><b>PROSES PRODUKSI</b></center></td>
</tr>

<tr align="center">
<td><b>PROSES PRODUKSI</b></td>
<td>Hasil Good</td>
<td>NC</td>
<td>NG</td>
<td>Nama Operator</td>
<td>Mulai</td>
<td>Selesai</td>
<td>Paraf</td>
<td>Keterangan</td>
</tr>

@foreach($query3 as $p)
<tr align="center" >
<td><font color="red">{{$p->proses_produksi}}</font></td>
<td><font color="red">{{$p->hasil_good}}</font></td>
<td><font color="red">{{$p->nc}}</font></td>
<td><font color="red">{{$p->ng}}</font></td>
<td><font color="red">{{$p->employee->EmployeeName}}</font></td>
<td><font color="red">{{\Carbon\Carbon::parse($p->mulai)->format('d-M-Y')}}</font></td>
<td><font color="red">{{\Carbon\Carbon::parse($p->selesai)->format('d-M-Y')}}</font></td>
<td><font color="red">{{$p->paraf}}</font></td>
<td><font color="red">{{$p->keterangan}}</font></td>
</tr>
@endforeach
</table>
</div>

<!-------------------------------PAGE 4------------------------------------>

<table border="1" style="width: 100%;border-collapse: collapse; ">
<tr>
<td colspan="" style="background-color: #DCDCDC; "><center><b>KETERANGAN</b></center></td>
</tr>
@foreach($query4 as $k)
<tr>
<td align="center" style="height: 90px; width: 100%;">
<font color="red"><b>{{$k->keterangan_produksi}}</b></font></td>
</tr>
@endforeach
</table>

<!-- ------- -->
<table border="1" style="width: 100%; border-collapse: collapse;">
<tr>
<td colspan="2" style="background-color: #DCDCDC; ">
<center><b>FORM PENGESAHAN</b></center></td>
</tr>

<tr>
<td><center>Dibuat</center></td> 
<td><center>Mengetahui</center></td> 
</tr>

<tr>
@foreach($query5 as $e)
<td style="height: 40px; width: 50%;"><center>{{$e->EmployeeName}}</center></td> 
@endforeach

@forelse($query3 as $q)
<td style="height: 40px; width: 50%;"><center>{{$q->employee->EmployeeName}}</center></td> 
@break
@empty
<td style="height: 40px; width: 50%;"><center>-</center></td> 
@endforelse
</tr>

<tr>
<td><center><b>PPIC</b></center></td> 
<td><center><b>Produksi</b></center></td> 
</tr>
</table>

</div>
</div>
</div>
</div>

</body>
</html>



