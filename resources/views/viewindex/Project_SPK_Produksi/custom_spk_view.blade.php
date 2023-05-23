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
    
<script type="text/javascript">
$(document).ready(function() {

 var $dTable = $('#example').DataTable({
  "dom": "<'row'<'col-sm-4'l><'col-sm-3' <'filtersearchbox'>><'col-sm-5'f>>" +
    "<'row'<'col-sm-12'tr>>" +
    "<'row'<'col-sm-5'i><'col-sm-7'p>>"
 });

//datamodal select operator
$(document).on('click','#select',function(){
 var employee_id = $(this).data('employeeid');
 var employee_name = $(this).data('employeename');
 $('#operatorid').val(employee_id);
 $('#operator').val(employee_name);
 $('#myModal').modal('hide');
});

$(document).on('click','#select2',function(){
 var mesin_id = $(this).data('mesinid');
 var mesin_name = $(this).data('mesinname');
 $('#id_mesin').val(mesin_id);
 $('#mesin').val(mesin_name);
 $('#myModal2').modal('hide');
});

} );


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
}

.card-box {
    position: relative;
    color: #fff;
    padding: 20px 10px 40px;
    margin: 20px 0px;

}
.card-box:hover {
    text-decoration: none;
    color: #f1f1f1;
}
.card-box:hover .icon i {
    font-size: 100px;
    transition: 1s;
    -webkit-transition: 1s;
}
.card-box .inner {
    padding: 5px 10px 0 10px;
}
.card-box h3 {
    font-size: 27px;
    font-weight: bold;
    margin: 0 0 8px 0;
    white-space: nowrap;
    padding: 0;
    text-align: left;
}
.card-box p {
    font-size: 15px;
}
.card-box .icon {
    position: absolute;
    top: auto;
    bottom: 5px;
    right: 5px;
    z-index: 0;
    font-size: 72px;
    color: rgba(0, 0, 0, 0.15);
}
.card-box .card-box-footer {
    position: absolute;
    left: 0px;
    bottom: 0px;
    text-align: center;
    padding: 3px 0;
    color: rgba(255, 255, 255, 0.8);
    background: rgba(0, 0, 0, 0.1);
    width: 100%;
    text-decoration: none;
}
.card-box:hover .card-box-footer {
    background: rgba(0, 0, 0, 0.3);
    width: 100%;
     
}
.bg-green {
    background-color: #00a65a !important;

}
.bg-blue {
    background-color: #00c0ef !important;
    
}
.bg-orange {
    background-color: #f39c12 !important;
    
}
.bg-red {
    background-color: #d9534f !important; 
}
.bg-grey {
    background-color: #b8bccc !important; 
}

</style>
</head>

<!------------------------------DASHBOARD--------------------------------->


<table style= "border-collapse: collapse; width: 100%" >
<tr>

<td>&nbsp</td>

<td>
<div class="card-box bg-red">
<div class="inner">
@forelse($produksi as $k)
<h3>{{number_format($k->where('mesin_id', '=', 7)->where('status', '<', 4)->sum('total_cetak'))}}</h3>
@break
@empty
<h3>0</h3>
@endforelse
<p>Antrian SM 52</p>
</div>
<div class="icon">
<i class="fa fa-gears" aria-hidden="true"></i>
</div>
<a href="EmployeeCustom" class="card-box-footer"></i></a>
</div>
</td>

<td>&nbsp</td>

<td>
<div class="card-box bg-orange">
<div class="inner">
@forelse($produksi as $v)
<h3>{{number_format($v->where('mesin_id', '=', 7)->where('status', '=', 3)->sum('total_cetak'))}}</h3>
@break
@empty
<h3>0</h3>
@endforelse
<p>Proses SM 52</p>
</div>
<div class="icon">
<i class="fa fa-spinner" aria-hidden="true"></i>
</div>
<a href="employeerequest" class="card-box-footer"></i></a>
</div>
</td>

<td>&nbsp</td>

<td>
<div class="card-box bg-green">
<div class="inner">
@forelse($produksi as $v)
<h3>{{number_format($v->where('mesin_id', '=', 7)->where('status', '=', 4)->sum('total_cetak'))}}</h3>
@break
@empty
<h3>0</h3>
@endforelse
<p>Selesai SM 52</p>
</div>
<div class="icon">
<i class="fa fa-check" aria-hidden="true"></i>
</div>
<a href="employeerequest" class="card-box-footer"></i></a>
</div>
</td>

<td>&nbsp</td>

<td>
<div class="card-box bg-blue">
<div class="inner">
@forelse($produksi as $k)
<h3>{{number_format($k->where('mesin_id', '=', 6)->where('status', '<', 4)->sum('total_cetak'))}}</h3>
@break
@empty
<h3>0</h3>
@endforelse
<p>Antrian SM 74</p>
</div>
<div class="icon">
<i class="fa fa-gears" aria-hidden="true"></i>
</div>
<a href="EmployeeCustom" class="card-box-footer"></i></a>
</div>
</td>

<td>&nbsp</td>

<td>
<div class="card-box bg-orange">
<div class="inner">
@forelse($produksi as $v)
<h3>{{number_format($v->where('mesin_id', '=', 6)->where('status', '=', 3)->sum('total_cetak'))}}</h3>
@break
@empty
<h3>0</h3>
@endforelse
<p>Proses SM 74</p>
</div>
<div class="icon">
<i class="fa fa-spinner" aria-hidden="true"></i>
</div>
<a href="employeerequest" class="card-box-footer"></i></a>
</div>
</td>

<td>&nbsp</td>

<td>
<div class="card-box bg-green">
<div class="inner">
@forelse($produksi as $v)
<h3>{{number_format($v->where('mesin_id', '=', 6)->where('status', '=', 4)->sum('total_cetak'))}}</h3>
@break
@empty
<h3>0</h3>
@endforelse
<p>Selesai SM 74</p>
</div>
<div class="icon">
<i class="fa fa-check" aria-hidden="true"></i>
</div>
<a href="employeerequest" class="card-box-footer"></i></a>
</div>
</td>

</tr>
</table>

<!------------------------------END DASHBOARD--------------------------------->

<!------------------------------MAIN TABLE-------------------------------->
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">Table Data Penggunaan Mesin</div>
<div class="panel-body">

<form>
<div style="float:left; width: 50%">
<table>
<tr>

<td>Mesin</td>
<td>&nbsp:&nbsp</td>
<td><select name="mesin_id" class="form-control3" placeholder="Cari Mesin .." value="{{ request('mesin_id') }}"  >  
<option value="">Select Mesin</option>
@foreach($mesin as $m)
<option value="{{$m->id}}">{{$m->nama_mesin}}</option>
@endforeach
</select>
</td>
</tr>

<tr>
<td>Tanggal</td>
<td>&nbsp:&nbsp</td>
<td><input type = "date" name="tanggal_produksi" class="form-control2" value="{{ request('tanggal_produksi') }}"  ></td>
<td><button type="submit" title="Search"><i class="fa fa-search"></i></button></td>

<td><button type="button" title="Clear" onclick="location.href='../admin/produksi_spk_view'"><i class="fa fa-backward"></i></button></td>
</tr>

</table>
</div>
</form>
<div style="float:right; width: 50%">
<table style= "border-collapse: collapse; width: 100%;text-align:right;" >
<tr>
<td>
<td>

<a href="../admin/produksi_spk_input" class="btn btn-success"  title="Add">
<i class="fa fa-plus"> Add Data</i></a> </td>
</tr>
</table>
</div>
<br></br>
<br></br>

<div class="table-responsive" style="overflow-x: auto">
<table id="" class="table pop_modal table-striped table-bordered table-hover" style="width:100%" border="1">
<thead>
<tr>
<th>No</th>
<th>Nomor SPK</th>
<th>Nomor PO</th>
<th>Judul</th>
<th>Tanggal</th>
<th>Total Cetak</th>
<th>Mesin</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php $no = 0;?>
@foreach($produksi as $p)

<?php $no++ ;?>
<tr>
<td>{{$no}}</td>
<td>{{$p->spk->no_spk}}</td>
<td>{{$p->spk->no_po}}</td>
<td>{{$p->spk->judul}}</td>
<td>{{ \Carbon\Carbon::parse($p->tanggal_produksi)->format('d-M-Y')}}</td>
<td>{{number_format($p->qty_total)}}</td>

@if($p->mesin_id =='6') 
<td>SM 74</td>
@elseif($p->mesin_id =='7')
<td>SM 52</td>
@else
<td>...</td>
@endif

@if($p->spk->status =='2') 
<td>Input SPK</td>
@elseif($p->spk->status =='3') 
<td>On Proses</td>
@else
<td>
Selesai
</td>
@endif


<td align="right">
<a href="{{ url('admin/print_spk/'.$p->spk->id) }}" class="btn btn-success btn-sm"  title="Print"><i class="fa fa-print"></i></a>

<!-- <a href="{{ url('admin/update_status_to_proses/'.$p->id) }}" class="btn btn-primary btn-sm"  title="Detail"><i class="fa fa-eye"></i></a> -->

<!-- <a href="{{ url('admin/goto_edit/'.$p->spk->id) }}" class="btn btn-warning btn-sm"  title="Edit"><i class="fa fa-pencil"></i></a> -->

<a href="#" class="btn btn-warning btn-sm"  title="Edit"><i class="fa fa-pencil"></i></a>

<a href="{{ url('admin/delete_spk/'.$p->spk->id) }}" class="btn btn-danger btn-sm"  title="Delete"><i class="fa fa-trash"></i></a>
</td>

</tr>      
@endforeach
</thead>
</table>
<br>
</br>

<!-- ------------------------------------ -->

@foreach($produksi as $prod)
<table style="width:100%">
<tr>
<td>Total Cetak  : {{ number_format($prod->sum('total_cetak')) }}</td>
<td align="right">Total Cetak By Filter : {{ number_format($prod->where('tanggal_produksi', '=',  request('tanggal_produksi'))->orwhere('mesin_id', '=',request('mesin_id'))->sum('total_cetak')) }}</td>
@break
@endforeach
</tr>

<tr><td>Halaman : {{ $produksi->currentPage() }}</td></tr>

<tr>
@foreach($produksi as $prod)
<td>Jumlah Data {{ $produksi->count() }} </td>
</tr>
@break
@endforeach

<tr>
<td>Data Per Halaman : {{ $produksi->perPage() }} </td>
</tr>
</table>

{{ $produksi->links() }}

</div>
</div>
<!------------------------------MODAL SEARCH---------------------------------->
<div id="myModal" class="modal fade" role="dialog">
<div class="modal-dialog">
<!-- konten modal-->
<div class="modal-content">
<!-- heading modal -->
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Select Filter</h4>
</div>
<!-- body modal -->
<div class="modal-body">
 <!------------------------SEARCH KODE PRODUKSI----------------------->
<form>   
<label>Kode Produksi</label><br>
<input type="text" name="kode_produksi" style="width:100%;" class="form-control" value="{{ request('kode_produksi') }}">
<br>

<label>Nomor SPK</label><br>
<input type="text" name="no_spk" style="width:100%;" class="form-control" value="{{ request('no_spk') }}">
<br>

<label>Customer</label><br>
<input type="text" name="nama_customer" style="width:100%;" class="form-control" value="{{ request('nama_customer') }}">
<br>



<input type="submit" class="btn btn-primary" value="Apply" title="Apply">
<a class = "link" href="../admin/produksi_view" ><button type="reset" class="btn btn-danger" title="Reset">Reset</a>
</button>
</form>
<!---------------------------END SEARCH---------------------------->
</div>
<!-- footer modal -->
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<!------------------------------END MODAL SEARCH------------------->
@endsection