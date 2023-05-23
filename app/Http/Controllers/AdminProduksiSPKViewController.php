<?php namespace App\Http\Controllers;

	use Session;
	use Illuminate\Http\Request;
	use DB;
	use CRUDBooster;
	use Carbon\Carbon;
  use Validator;
  use Redirect;
  use PDF;

	class AdminProduksiSPKViewController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "nama_customer";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = false;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "t206_produksi";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Kode Produksi","name"=>"kode_produksi"];
			$this->col[] = ["label"=>"Nama Customer","name"=>"nama_customer"];
			$this->col[] = ["label"=>"No Spk","name"=>"no_spk"];
			$this->col[] = ["label"=>"Qty Produksi","name"=>"qty_produksi"];
			// $this->col[] = ["label"=>"Mesin","name"=>"id_mesin","join"=>"mesin,id"];
			$this->col[] = ["label"=>"Mesin","name"=>"id_mesin"];
			$this->col[] = ["label"=>"Tanggal Mulai","name"=>"tanggal_mulai"];
			$this->col[] = ["label"=>"Tanggal Selesai","name"=>"tanggal_selesai"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Kode Produksi','name'=>'kode_produksi','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Nama Customer','name'=>'nama_customer','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'No Spk','name'=>'no_spk','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Qty Produksi','name'=>'qty_produksi','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Mesin','name'=>'id_mesin','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'mesin,id'];
			$this->form[] = ['label'=>'Tanggal Mulai','name'=>'tanggal_mulai','type'=>'datetime','validation'=>'required|date_format:Y-m-d H:i:s','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Tanggal Selesai','name'=>'tanggal_selesai','type'=>'datetime','validation'=>'required|date_format:Y-m-d H:i:s','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Lokasi Produksi','name'=>'lokasi_produksi','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Operator','name'=>'operator','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Status Produksi','name'=>'status_produksi','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Keterangan','name'=>'keterangan','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ["label"=>"Kode Produksi","name"=>"kode_produksi","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Nama Customer","name"=>"nama_customer","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"No Spk","name"=>"no_spk","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Qty Produksi","name"=>"qty_produksi","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Mesin","name"=>"id_mesin","type"=>"select2","required"=>TRUE,"validation"=>"required|min:1|max:255","datatable"=>"mesin,id"];
			//$this->form[] = ["label"=>"Tanggal Mulai","name"=>"tanggal_mulai","type"=>"datetime","required"=>TRUE,"validation"=>"required|date_format:Y-m-d H:i:s"];
			//$this->form[] = ["label"=>"Tanggal Selesai","name"=>"tanggal_selesai","type"=>"datetime","required"=>TRUE,"validation"=>"required|date_format:Y-m-d H:i:s"];
			//$this->form[] = ["label"=>"Lokasi Produksi","name"=>"lokasi_produksi","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Operator","name"=>"operator","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Status Produksi","name"=>"status_produksi","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Keterangan","name"=>"keterangan","type"=>"textarea","required"=>TRUE,"validation"=>"required|string|min:5|max:5000"];
			# OLD END FORM

			/* 
	        | ---------------------------------------------------------------------- 
	        | Sub Module
	        | ----------------------------------------------------------------------     
			| @label          = Label of action 
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class  
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        | 
	        */
	        $this->sub_module = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)     
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        | 
	        */
	        $this->addaction = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Button Selected
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button 
	        | Then about the action, you should code at actionButtonSelected method 
	        | 
	        */
	        $this->button_selected = array();

	                
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
	        */
	        $this->alert        = array();
	                

	        
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add more button to header button 
	        | ----------------------------------------------------------------------     
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
	        */
	        $this->index_button = array();



	        /* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
	        */
	        $this->table_row_color = array();     	          

	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | You may use this bellow array to add statistic at dashboard 
	        | ---------------------------------------------------------------------- 
	        | @label, @count, @icon, @color 
	        |
	        */
	        $this->index_statistic = array();



	        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        $this->script_js = NULL;


            /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        $this->pre_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code after index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it after index table
	        | $this->post_index_html = "<p>test</p>";
	        |
	        */
	        $this->post_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array 
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
	        $this->load_js = array();
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Add css style at body 
	        | ---------------------------------------------------------------------- 
	        | css code in the variable 
	        | $this->style_css = ".style{....}";
	        |
	        */
	        $this->style_css = NULL;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include css File 
	        | ---------------------------------------------------------------------- 
	        | URL of your css each array 
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
	        $this->load_css = array();
	        
	        
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for button selected
	    | ---------------------------------------------------------------------- 
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here
	            
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
	    public function hook_query_index(&$query) {
	        //Your code here
	            
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
	    	//Your code here
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_edit(&$postdata,$id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {
	        //Your code here 

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    }



/*--------------------------FUNGSI UNTUK PAGE VIEW--------------------------*/
/*--------------------------------------------------------------------------*/


//--VIEW SPK--

public function getIndex() {

if(!CRUDBooster::isView()) CRUDBooster::redirect(CRUDBooster::adminPath(),trans('crudbooster.denied_access'));

$datenow = Carbon::now();
$getJabatan=Crudbooster::myPrivilegeId();
$EmployeeID=Crudbooster::myId();

  $query = \App\Models\t210_rincianproduk::when(request('spk'), function($query){
$query->whereHas('spk', function($nested){
$nested->where('id_spk', 'LIKE', '%'. request('id_spk') .'%');    
        });
$query->whereHas('spk', function($nested){
$nested->where('tanggal', 'LIKE', '%'. request('tanggal') .'%');    
        });
		   })
->when(request('tanggal_produksi'), function($query){
$query->where('tanggal_produksi', 'LIKE', '%'. request('tanggal_produksi') .'%');
})

->when(request('mesin_id'), function($query){
$query->where('mesin_id', '=', request('mesin_id'));
})

->selectRaw('id_spk,mesin_id,tanggal_produksi, SUM(total_cetak) AS qty_total')
->groupby('id_spk','mesin_id','tanggal_produksi')
->orderby('id','desc')
->paginate()
->appends(request()->query());

//---------------------------
   $query2 = DB::table('t207_mesinproduksi')
   ->get();

//---------------------------
   $query3 = DB::table('t210_rincianproduk')
   ->where('mesin_id','=',7) 
   ->where('status','<',4)
   ->selectRaw('id_spk, SUM(total_cetak) AS qty_total')
   ->groupby('id_spk')
   ->get();

//---------------------------
   $query4 = DB::table('t210_rincianproduk')
   ->where('mesin_id','=',6) 
   ->where('status','<',4)
   ->selectRaw('id_spk, SUM(total_cetak) AS qty_total')
   ->groupby('id_spk')
   ->get();
//---------------------------
   $query5 = DB::table('t209_suratperintahkerja')
   ->get();


  
   //untuk menampilkan data di view
   $data = [];
   $total = 0;
   $data['absenlembur'] = 'Products Data';
   $data['produksi'] = $query;
   $data['mesin'] = $query2;
   $data['kapasitasm52'] = $query3;
   $data['kapasitasm74'] = $query4;
   $data['spk'] = $query5;
  
  
 return view('viewindex/Project_SPK_Produksi/custom_spk_view',$data);
  
}


//--UPDATE STATUS SPK KE PROSES--

public function update_status_to_proses($id){
			
DB::table('t209_suratperintahkerja')
->where('id','=',$id)
->update(['status'=>'3']);

DB::table('t210_rincianproduk')
->where('id_spk','=',$id)
->update(['status'=>'3']);

DB::table('t212_prosesproduksi')
->where('id_spk','=',$id)
->update(['status'=>'3']);

DB::table('t211_detailrincian')
->where('id_spk','=',$id)
->update(['status'=>'3']);

DB::table('t213_keteranganproduksi')
->where('id_spk','=',$id)
->update(['status'=>'3']);

CRUDBooster::redirect($_SERVER['HTTP_REFERER'],"Update Status Berhasil","success");
}

//--DELETE SPK--

public function delete_spk($id){
			
DB::table('t209_suratperintahkerja')
->where('id','=',$id)
->delete();

DB::table('t210_rincianproduk')
->where('id_spk','=',$id)
->delete();

DB::table('t212_prosesproduksi')
->where('id_spk','=',$id)
->delete();

DB::table('t211_detailrincian')
->where('id_spk','=',$id)
->delete();

DB::table('t213_keteranganproduksi')
->where('id_spk','=',$id)
->delete();

CRUDBooster::redirect($_SERVER['HTTP_REFERER'],"Delete Data Berhasil","success");
}


//--PRINT SPK--

public function print_spk($id)
		{

$datenow = Carbon::now();
$getJabatan=Crudbooster::myPrivilegeId();
$EmployeeID=Crudbooster::myId();
$get_id = DB::table('t209_suratperintahkerja')
->where('id','=',$id)
->value('id');

$get_employee = DB::table('t209_suratperintahkerja')
->where('id','=',$id)
->value('created_by');

$query = DB::table('t210_rincianproduk')
->where('id_spk','=',$get_id)
->get();

//---------------------------
$query2 = DB::table('t209_suratperintahkerja')
->where('id','=',$id)
->get();

//---------------------------
$query3 = \App\Models\t212_prosesproduksi::where('id_spk','=',$get_id)
->get();

//---------------------------
$query4 = DB::table('t213_keteranganproduksi')
->where('id_spk','=',$get_id)
->get();

//---------------------------
$query5 = DB::table('hrde200_employee')
->where('id','=',$get_employee)
->get();

//---------------------------
$query6 = DB::table('t211_detailrincian')
->where('id_spk','=',$get_id)
->get();
 

 $generatePDF = PDF::loadView('exports.PrintSPK_pdf',array('query'=>$query,'query2'=>$query2,'query3'=>$query3,'query4'=>$query4,'query5'=>$query5,'query6'=>$query6))->setPaper('a4','portrait');return $generatePDF->stream();		

}

/*-----------------------END FUNGSI UNTUK PAGE VIEW-------------------------*/
/*--------------------------------------------------------------------------*/





/*------------------FUNGSI UNTUK EDIT DATA YG SUDAH DIINPUT-----------------*/
/*--------------------------------------------------------------------------*/


//--VIEW PAGE EDIT--
public function goto_edit($id)
		{
$datenow = Carbon::now();
$getJabatan=Crudbooster::myPrivilegeId();
$EmployeeID=Crudbooster::myId();


$query = DB::table('t209_suratperintahkerja')
->where('id','=',$id)
->get();

//---------------------------
$query2 = DB::table('t210_rincianproduk')
->where('id_spk','=',$id)
->get();

//---------------------------
$query3 = DB::table('t211_detailrincian')
->where('id_spk','=',$id)
->get();

//---------------------------
$query4 = \App\Models\t212_prosesproduksi::where('id_spk','=',$id)
->get();

//---------------------------
$query5 = DB::table('t213_keteranganproduksi')
->where('id_spk','=',$id)
->get();

   //untuk menampilkan data di view
   $data = [];
   $total = 0;
   $data['absenlembur'] = 'Products Data';
   $data['spk'] = $query;
   $data['rincian'] = $query2;
   $data['detail'] = $query3;
   $data['proses'] = $query4;
   $data['keterangan'] = $query5;
  
  return view('viewindex/Project_SPK_Produksi/custom_spk_edit',$data);

}

/*-EDIT FORM SPK-*/

public function edit_spk(Request $request)
{
$datenow = Carbon::now();
$getJabatan=Crudbooster::myPrivilegeId();
$EmployeeID=Crudbooster::myId();

	DB::table('t209_suratperintahkerja')->update([ 		
      'tanggal' => $request->post('tanggal'),
		'judul' => $request->post('judul'),
		'no_spk' => $request->post('no_spk'),
		'jumlah_pesanan' => $request->post('jumlah_pesanan'),
		'tgl_pengiriman' => $request->post('tgl_pengiriman'),
		'no_dokumen' => $request->post('no_dokumen'),
		'no_revisi' => $request->post('no_revisi'),
		'hal' => $request->post('hal'),
		'no_po' => $request->post('no_po'),
		'kode_item' => $request->post('kode_item'),
		'nama_customer' => $request->post('nama_customer'),
		'jenis_kerjaan' => $request->post('jenis_kerjaan'),
		'no_sales_order' => $request->post('no_sales_order')		
	]);

return redirect()->back();
}

/*-EDIT FORM RINCIAN-*/

public function edit_rincian(Request $request)
{
$datenow = Carbon::now();
$getJabatan=Crudbooster::myPrivilegeId();
$EmployeeID=Crudbooster::myId();

	DB::table('t210_rincianproduk')->update([ 		
		'dimensi' => $request->post('dimensi'),
		'spesifikasi_proses' => $request->post('spesifikasi_proses'),
		'jenis_bahan' => $request->post('jenis_bahan'),
		'jumlah_katern' => $request->post('jumlah_katern'),
		'ukuran_kertas' => $request->post('ukuran_kertas'),
		'jumlah_warna' => $request->post('jumlah_warna'),
		'jumlah_warna_muka' => $request->post('jumlah_warna_muka'),
		'jumlah_cetak' => $request->post('jumlah_cetak'),
		'insheet_cetak' => $request->post('insheet_cetak'),
		'total_cetak' => $request->post('total_cetak'),
		'keterangan' => $request->post('keterangan')		
	]);

return redirect()->back();
}

/*-EDIT FORM RINCIAN DETAIL-*/

public function edit_detail(Request $request)
{
$datenow = Carbon::now();
$getJabatan=Crudbooster::myPrivilegeId();
$EmployeeID=Crudbooster::myId();

	DB::table('t211_detailrincian')->update([ 		
		'bentuk' => $request->post('bentuk'),
		'bentuk_ket1' => $request->post('bentuk_ket1'),
		'bentuk_ket2' => $request->post('bentuk_ket2'),
		'bentuk_ket3' => $request->post('bentuk_ket3'),
		'bentuk_ket4' => $request->post('bentuk_ket4'),
		'bentuk_ket5' => $request->post('bentuk_ket5'),
		'bentuk_ket6' => $request->post('bentuk_ket6'),
		'mesin_id' => $request->post('mesin_id'),
		'mesin_ket1' => $request->post('mesin_ket1'),
		'mesin_ket2' => $request->post('mesin_ket2'),
		'warna' => $request->post('warna'),
		'warna_ket1' => $request->post('warna_ket1'),
		'warna_ket2' => $request->post('warna_ket2'),
		'warna_ket3' => $request->post('warna_ket3'),
		'warna_ket4' => $request->post('warna_ket4'),
		'acuan' => $request->post('acuan'),
		'jumlah_up' => $request->post('jumlah_up'),
		'finishing' => $request->post('finishing'),
		'finishing_ket1' => $request->post('finishing_ket1'),
		'finishing_ket2' => $request->post('finishing_ket2'),
		'finishing_ket3' => $request->post('finishing_ket3'),
		'finishing_ket4' => $request->post('finishing_ket4'),
		'finishing_ket5' => $request->post('finishing_ket5'),
		'finishing_ket6' => $request->post('finishing_ket6'),
		'finishing_ket7' => $request->post('finishing_ket7'),
		'finishing_ket8' => $request->post('finishing_ket8'),
		'finishing_ket9' => $request->post('finishing_ket9'),
		'finishing_ket10' => $request->post('finishing_ket10')	
	]);

return redirect()->back();
}


/*-EDIT FORM KETERANGAN-*/

public function edit_keterangan(Request $request)
{
$datenow = Carbon::now();
$getJabatan=Crudbooster::myPrivilegeId();
$EmployeeID=Crudbooster::myId();

	DB::table('t213_keteranganproduksi')->update([ 		
   'keterangan_produksi' => $request->post('keterangan_produksi')	
	]);

return redirect()->back();
}
	}