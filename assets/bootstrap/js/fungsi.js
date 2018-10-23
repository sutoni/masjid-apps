// JavaScript Document
$(document).ready(function(){
		//mengaktifkan tooltip	
		$('[data-toggle="tooltip"]').tooltip();
		
	
		//****** DATA MASTER TOKO *********//
		//tampilkan form tambah data toko
		$("#btnTokoTambah").click(function(){
			$.ajax({url:'data_master/toko_add.php',
				success:function(html){$("#dataTambahUbah").html(html)},
				error: function() {$('#dataTambahUbah').html('<h3>Ajax Bermasalah !!!</h3>')},
			}); 	
						
			
		});
		
		//tampilkan form ubah data toko.
		$("#btnTokoUbah").click(function(){
			var kdToko = $(this).data('val');
			
			$.ajax({
				type:"POST",
				url :"data_master/toko_edit.php",
				data:{kodeToko:kdToko},
				//dataType: "json",
				success:function(resp){
					$("#dataTambahUbah").hide();
					$("#dataTambahUbah").html(resp);
					$("#dataTambahUbah").fadeIn(1000);
				},
				
			}); 
			//alert(kdToko);
		});	
	
		//handel perubahan data toko
		$(document).on('submit',"#formTokoUbah",function(e){
			e.preventDefault();	
			$.ajax({
				type:"POST",
				url:'data_master/toko_proses.php',
				data:new FormData(this),
				contentType:false,
				cache:false,
				processData:false,
				dataType: "json",
				success:function(html){
					$('#dataTambahUbah').html(html.msg1);
					window.setTimeout(function(){window.location=window.location;}, 1000);
				},	
				error: function() {$('#dataTambahUbah').html('<h3>Ajax Bermasalah !!!</h3>')},
			});
			
			//alert('diklik');
		});
		//****** DATA MASTER USER *********//
		//tampilkan form tambah data user
		$("#btnUserTambah").click(function(){
			//alert('Tambah User');
			$.ajax({url:'data_master/user_add.php',
				success:function(html){
						$("#dataTambahUbah").hide();
						$("#dataTambahUbah").html(html);
						$("#dataTambahUbah").fadeIn(1000)
					},
				error: function() {$('#dataTambahUbah').html('<h3>Ajax Bermasalah !!!</h3>')},
				
			}); 
		});
		
		//tambah dan edit user
		$(document).on('click',"#btnUserSimpan",function () {
			$("#formUser").submit(function(e){return false;});
			var id = $(this).data('id');
			if(id==1){
				//user baru
				var kdUser = $('#kode').val();
				var namaLengkap = $('#txtNamaLengkap').val();
				var userName = $('#txtUsername').val();
				var password = $('#txtPassword').val();
				var level = $('#txtLevel').val();
				var active = $('#txtActive').val();
				var data = {addUser:'',kdUser:kdUser,nmLengkap:namaLengkap,userName:userName,pwrd:password,level:level,active:active};
			}else if(id==2){
				//edit user
				var kdUser = $('#kode').val();
				var namaLengkap = $('#txtNamaLengkap').val();
				var userName = $('#txtUsername').val();
				var password = $('#txtPassword').val();
				var level = $('#txtLevel').val();
				var active = $('#txtActive').val();
				var data={ubahUser:'',kdUser:kdUser,nmLengkap:namaLengkap,userName:userName,pwrd:password,level:level,active:active};
			}
				if(namaLengkap.length<=0){$('#txtNamaLengkap').focus();$('.modal-body').html('<p>Nama Lengkap Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
				else if(userName.length<=0){$('#txtUsername').focus();$('.modal-body').html('<p>Username Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
				else if(password.length<=0){$('#txtPassword').focus();$('.modal-body').html('<p>Password Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
				else if(level.length<=0){$('#txtLevel').focus();$('.modal-body').html('<p>Level Akses Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
				else{
					$.ajax({
						type:"POST",
						url:'data_master/user_proses.php',
						data:data,
						dataType: "json",
						success:function(resp){
							$("#alertMsg").html(resp.msg1);
							window.setTimeout(function(){window.location=window.location;}, 2000);
						},
						
						error: function() {$('#alertMsg').html('<h3>Ajax Bermasalah !!!</h3>')},
						 //error: function(xmlHttpRequest, status, err){}
					});
				}; 
			
			//alert('id : '+id);	
		});
		//tampilkan form ubah data user.
		$(".btnUserUbah").click(function(){
			var kdUser = $(this).data('val');
			
			$.ajax({
				type:"POST",
				url :"data_master/user_edit.php",
				data:{kodeUser:kdUser},
				//dataType: "json",
				success:function(resp){
					$("#dataTambahUbah").hide();
					$("#dataTambahUbah").html(resp);
					$("#dataTambahUbah").fadeIn(1000);
				},
				error: function() {$('#dataTambahUbah').html('<h3>Ajax Bermasalah !!!</h3>')},
			});
			//alert(kdUser);
		});	
		
		//Hapus data user
		$(".btnUserHapus").click(function(){
			var r = confirm('ANDA YAKIN INGIN MENGHAPUS DATA INI ???');
			if(r==true){
				var kdRow = $(this).data('val');
				$.ajax({
					type:"POST",
					url:'data_master/user_proses.php',
					data:{hapusUser:'',kodeRow:kdRow},
					dataType: "json",
					success:function(resp){
						$("#dataTambahUbah").html(resp.msg1);
						window.setTimeout(function(){window.location=window.location;}, 1000);
					},
					error: function() {$('#dataTambahUbah').html('<h3>Ajax Bermasalah !!!</h3>')},
					 
				}); 
				//alert(kdRow);
			};
		});
		
		//****** DATA MASTER BARANG *********//
		//Tampilkan form tambah master barang
		$("#btnBarangTambah").click(function(){
			$.ajax({url:'data_master/barang_add.php',
				success:function(html){
					$("#dataTambahUbah").hide();	
					$("#dataTambahUbah").html(html)
					$("#dataTambahUbah").fadeIn(1000);
				},
				error: function() {$('#dataTambahUbah').html('<h3>Ajax Bermasalah !!!</h3>')},
			}); 
		}); 
		//tambah & ubah data master barang
		$(document).on('click',"#btnBarangSimpan",function () {
			$("#formBarang").submit(function(e){return false;});
			var id = $(this).data('id');
			if(id==1){
				var kdBarang = $('#kode').val();
				var namaBarang = $('#txtNama').val();
				var satuan = $('#txtSatuan').val();
				var kategori = $('#txtKategori').val();
				var hrgJual = $('#txtHargaJual').val();
				var hrgBeli = $('#txtHargaBeli').val();
				var active = $('#txtActive').val();
				var data={addBarang:'',kdBarang:kdBarang,nmBarang:namaBarang,satuan:satuan,kategori:kategori,hrgJual:hrgJual,hrgBeli:hrgBeli,active:active};
			}else if(id==2){
				var kdBarang = $('#kode').val();
				var namaBarang = $('#txtNama').val();
				var satuan = $('#txtSatuan').val();
				var kategori = $('#txtKategori').val();
				var hrgJual = $('#txtHargaJual').val();
				var hrgBeli = $('#txtHargaBeli').val();
				var active = $('#txtActive').val();
				var data={ubahBarang:'',kdBarang:kdBarang,inpNamaBarang:namaBarang,inpSatuan:satuan,inpKategori:kategori,inpHrgJual:hrgJual,inpHrgBeli:hrgBeli,inpActive:active};
			}	
			if(namaBarang.length<=0){$('#txtNama').focus();$('.modal-body').html('<p>Nama Barang Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
			else if(satuan.length<=0){$('#txtSatuan').focus();$('.modal-body').html('<p>Data Satuan Barang Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
			else if(kategori.length<=0){$('#txtKategori').focus();$('.modal-body').html('<p>Data Kategori Barang Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
			else if(hrgJual.length<=0){$('#txtHargaJual').focus();$('.modal-body').html('<p>Data Harga Jual Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
			else if(hrgBeli.length<=0){$('#txtHargaBeli').focus();$('.modal-body').html('<p>Data Harga Beli Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
			else{
				$.ajax({
					type:"POST",
					url:'data_master/barang_proses.php',
					data:data,
					dataType: "json",
					success:function(resp){
						$("#alertMsg").html(resp.msg1);
						window.setTimeout(function(){window.location=window.location;}, 1000);
					},
					
					error: function() {$('#alertMsg').html('<h3>Ajax Bermasalah !!!</h3>')},
					 //error: function(xmlHttpRequest, status, err){}
				});
			}; 
			
			//alert('id : '+id);	
		});
		//tampilkan form ubah data barang
		$(".btnBarangUbah").click(function(){
			var kdBarang = $(this).data('val');
			
			$.ajax({
				type:"POST",
				url :"data_master/barang_edit.php",
				data:{ubahBarang:'',kdBarang:kdBarang},
				//dataType: "json",
				success:function(resp){
					$("#dataTambahUbah").hide();
					$("#dataTambahUbah").html(resp);
					$("#dataTambahUbah").fadeIn(1000);
				},
				error: function() {$('#dataTambahUbah').html('<h3>Ajax Bermasalah !!!</h3>')},
			});
			//alert(kdBarang);
		});	
		//Hapus data barang
		$(".btnBarangHapus").click(function(){
			var r = confirm('ANDA YAKIN INGIN MENGHAPUS DATA INI ???');
			if(r==true){
				var kdRow = $(this).data('val');
				$.ajax({
					type:"POST",
					url:'data_master/barang_proses.php',
					data:{hapusBarang:'',kodeRow:kdRow},
					dataType: "json",
					success:function(resp){
						$("#dataTambahUbah").html(resp.msg1);
						window.setTimeout(function(){window.location=window.location;}, 1000);
					},
					error: function() {$('#dataTambahUbah').html('<h3>Ajax Bermasalah !!!</h3>')},
					 
				}); 
				//alert(kdRow);
			};
		});
		
		//****** DATA MASTER KATEGORI *********//
		//tampilkan data kategori barang
		$("#btnKategoriTambah").click(function(){
				$.ajax({url:'data_master/kategori_add.php',
					success:function(html){
						$("#dataTambahUbah").hide();
						$("#dataTambahUbah").html(html)
						$("#dataTambahUbah").fadeIn(1000);
					},
					error: function() {$('#dataTambahUbah').html('<h3>Ajax Bermasalah !!!</h3>')},
				}); 
		});
		//tangani operasi simpan data baru kategori barang
		$(document).on('click',"#btnKategoriSimpan",function () {
			$("#formKategori").submit(function(e){return false;});
			var id = $(this).data('id');
			if(id==1){
				var kode = $('#kode').val();
				var nama = $('#txtNama').val();
				var active = $('#txtActive').val();
				var data={addKategori:'',kode:kode,nama:nama,active:active};
			}else if(id==2){
				var kode = $('#kode').val();
				var nama = $('#txtNama').val();
				var active = $('#txtActive').val();
				var data={ubahKategori:'',dtaKode:kode,dtaNama:nama,dtaActive:active};
			}
			
			if(nama.length<=0){$('#txtNama').focus();$('.modal-body').html('<p>Nama Kategori Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
			else{
				$.ajax({
					type:"POST",
					url:'data_master/kategori_proses.php',
					data:data,
					dataType: "json",
					success:function(resp){
						$("#alertMsg").html(resp.msg1);
						window.setTimeout(function(){window.location=window.location;}, 1000);
						//$("#btnKategoriTambah").click();
					},
					
					error: function() {$('#alertMsg').html('<h3>Ajax Bermasalah !!!</h3>')},
					 //error: function(xmlHttpRequest, status, err){}
				});
				
			}; 
			//alert('id : '+id);	
		});
		//tampilkan form ubah data kategori
		$(".btnKategoriUbah").click(function(){
			var kode = $(this).data('val');
			
			$.ajax({
				type:"POST",
				url :"data_master/kategori_edit.php",
				data:{ubahKategori:'',kode:kode},
				//dataType: "json",
				success:function(resp){
					$("#dataTambahUbah").hide();
					$("#dataTambahUbah").html(resp);
					$("#dataTambahUbah").fadeIn(1000);
				},
				error: function() {$('#dataTambahUbah').html('<h3>Ajax Bermasalah !!!</h3>')},
			});
			//alert(kode);
		});	
		//Hapus data kategori
		$(".btnKategoriHapus").click(function(){
			var r = confirm('ANDA YAKIN INGIN MENGHAPUS DATA INI ???');
			if(r==true){
				var kode = $(this).data('val');
				$.ajax({
					type:"POST",
					url:'data_master/kategori_proses.php',
					data:{hapusKategori:'',kodeRow:kode},
					dataType: "json",
					success:function(resp){
						$("#dataTambahUbah").html(resp.msg1);
						window.setTimeout(function(){window.location=window.location;}, 2000);
					},
					error: function() {$('#dataTambahUbah').html('<h3>Ajax Bermasalah !!!</h3>')},
					 
				}); 
				//alert(kode);
			};
		});
		//****** DATA MASTER SATUAN *********//
		//tampilkan form tambah data satuan barang
		$("#btnSatuanTambah").click(function(){
			$.ajax({url:'data_master/satuan_add.php',
				success:function(html){
					$("#dataTambahUbah").hide();
					$("#dataTambahUbah").html(html)
					$("#dataTambahUbah").fadeIn(1000);
				},
				error: function() {$('#dataTambahUbah').html('<h3>Ajax Bermasalah !!!</h3>')},
			}); 
		});
		//tangani operasi simpan data baru satuan barang
		$(document).on('click',"#btnSatuanSimpan",function () {
			$("#formSatuan").submit(function(e){return false;});
			var id = $(this).data('id');
			if(id==1){
			var kode = $('#kode').val();
			var nama = $('#txtNama').val();
			var active = $('#txtActive').val();
			var data = {addSatuan:'',dtaKode:kode,dtaNama:nama,dtaActive:active};
			}else if(id==2){
				var kode = $('#kode').val();
				var nama = $('#txtNama').val();
				var active = $('#txtActive').val();
				var data={ubahSatuan:'',dtaKode:kode,dtaNama:nama,dtaActive:active};
				
			}	
			if(nama.length<=0){$('#txtNama').focus();$('.modal-body').html('<p>Nama Satuan Tidak Boleh Kosong<p>');$('#modal').modal('show');}
			else{
				$.ajax({
					type:"POST",
					url:'data_master/satuan_proses.php',
					data:data,
					dataType: "json",
					success:function(resp){
						$("#alertMsg").html(resp.msg1);
						window.setTimeout(function(){window.location=window.location;}, 2000);
					},
					
					error: function() {$('#alertMsg').html('<h3>Ajax Bermasalah !!!</h3>')},
					 //error: function(xmlHttpRequest, status, err){}
				});
			}; 
			//alert(active);	
		});
		//tampilkan form ubah data satuan barang
		$(".btnSatuanUbah").click(function(){
			var kode = $(this).data('val');
			
			$.ajax({
				type:"POST",
				url :"data_master/satuan_edit.php",
				data:{ubahSatuan:'',kode:kode},
				//dataType: "json",
				success:function(resp){
					$("#dataTambahUbah").hide();
					$("#dataTambahUbah").html(resp);
					$("#dataTambahUbah").fadeIn(1000);
				},
				error: function() {$('#dataTambahUbah').html('<h3>Ajax Bermasalah !!!</h3>')},
			});
			//alert(kode);
		});
		
		//Hapus data satuan
		$(".btnSatuanHapus").click(function(){
			var r = confirm('ANDA YAKIN INGIN MENGHAPUS DATA INI ???');
			if(r==true){
				var kode = $(this).data('val');
				$.ajax({
					type:"POST",
					url:'data_master/satuan_proses.php',
					data:{hapusSatuan:'',kodeRow:kode},
					dataType: "json",
					success:function(resp){
						$("#dataTambahUbah").html(resp.msg1);
						window.setTimeout(function(){window.location=window.location;}, 2000);
					},
					error: function() {$('#dataTambahUbah').html('<h3>Ajax Bermasalah !!!</h3>')},
					 
				}); 
				//alert(kode);
			};
		});
		//****** DATA MASTER SUPPLIER *********//
		//tampilkan form tambah data supplier
		$("#btnSuplTambah").click(function(){
			$.ajax({url:'data_master/supplier_add.php',
				success:function(html){
					$("#dataTambahUbah").hide();
					$("#dataTambahUbah").html(html)
					$("#dataTambahUbah").fadeIn(1000);
				},
				error: function() {$('#dataTambahUbah').html('<h3>Ajax Bermasalah !!!</h3>')},
			}); 
		}); 
		//tangani operasi simpan data baru supplier
		$(document).on('click',"#btnTambahSupplierSimpan",function () {
			$("#formSupplierTambah").submit(function(e){return false;});
			var kode = $('#kode').val();
			var nama = $('#txtNama').val();
			var alamat = $('#txtAlamat').val();
			var telp = $('#txtPhone').val();
			var fax = $('#txtFax').val();
			var kontak = $('#txtKontak').val();
			var active = $('#txtActive').val();
			
			if(nama.length<=0){$('#txtNama').focus();$('.modal-body').html('<p>Nama Supplier Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
			else if(alamat.length<=0){$('#txtAlamat').focus();$('.modal-body').html('<p>Alamat Supplier Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
			else if(telp.length<=0){$('#txtPhone').focus();$('.modal-body').html('<p>No. Telp Supplier Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
			else if(kontak.length<=0){$('#txtKontak').focus();$('.modal-body').html('<p>Nama Kontak Supplier Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
			else{
				$.ajax({
					type:"POST",
					url:'data_master/supplier_proses.php',
					data:{addSupplier:'',dtaKode:kode,dtaNama:nama,dtaAlamat:alamat,dtaTelp:telp,dtaFax:fax,dtaKontak:kontak,dtaActive:active},
					dataType: "json",
					success:function(resp){
						$("#alertMsg").html(resp.msg1);
						window.setTimeout(function(){window.location=window.location;}, 2000);
					},
					
					error: function() {$('#alertMsg').html('<h3>Ajax Bermasalah !!!</h3>')},
					 //error: function(xmlHttpRequest, status, err){}
				});
			}; 
			//alert(active);	
		});
		//tampilkan form ubah data supplier
		$(".btnSupplierUbah").click(function(){
			var kode = $(this).data('val');
			
			$.ajax({
				type:"POST",
				url :"data_master/supplier_edit.php",
				data:{ubahSupplier:'',kode:kode},
				//dataType: "json",
				success:function(resp){
					$("#dataTambahUbah").hide();
					$("#dataTambahUbah").html(resp);
					$("#dataTambahUbah").fadeIn(1000);
				},
				error: function() {$('#dataTambahUbah').html('<h3>Ajax Bermasalah !!!</h3>')},
			});
			//alert(kode);
		});
		//proses ubah data Supplier
		$(document).on('click',"#btnUbahSupplierSimpan",function () {
			$("#formSupplierUbah").submit(function(e){return false;});
			var kode = $('#kode').val();
			var nama = $('#txtNama').val();
			var alamat = $('#txtAlamat').val();
			var telp = $('#txtPhone').val();
			var fax = $('#txtFax').val();
			var kontak = $('#txtKontak').val();
			var active = $('#txtActive').val();
			
			if(nama.length<=0){$('#txtNama').focus();$('.modal-body').html('<p>Nama Supplier Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
			else if(alamat.length<=0){$('#txtAlamat').focus();$('.modal-body').html('<p>Alamat Supplier Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
			else if(telp.length<=0){$('#txtPhone').focus();$('.modal-body').html('<p>No. Telp Supplier Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
			else if(kontak.length<=0){$('#txtKontak').focus();$('.modal-body').html('<p>Nama Kontak Supplier Tidak Boleh Kosong<p>');$('#modalUser').modal('show');}
			else{
				
				$.ajax({
					type:"POST",
					url:'data_master/supplier_proses.php',
					data:{ubahSupplier:'',dtaKode:kode,dtaNama:nama,dtaAlamat:alamat,dtaTelp:telp,dtaFax:fax,dtaKontak:kontak,dtaActive:active},
					dataType: "json",
					success:function(resp){
						$("#alertMsg").html(resp.msg1);
						window.setTimeout(function(){window.location=window.location;}, 500);
					},
					
					error: function() {$('#alertMsg').html('<h3>Ajax Bermasalah !!!</h3>')},
					 //error: function(xmlHttpRequest, status, err){}
				});
				
			};
			//alert(kode);
		});
		//Hapus data satuan
		$(".btnSupplierHapus").click(function(){
			var r = confirm('ANDA YAKIN INGIN MENGHAPUS DATA INI ???');
			if(r==true){
				var kode = $(this).data('val');
				$.ajax({
					type:"POST",
					url:'data_master/supplier_proses.php',
					data:{hapusSupplier:'',kodeRow:kode},
					dataType: "json",
					success:function(resp){
						
						$("#dataTambahUbah").html(resp.msg1);
						window.setTimeout(function(){window.location=window.location;}, 2000);
					},
					error: function() {$('#dataTambahUbah').html('<h3>Ajax Bermasalah !!!</h3>')},
					 
				}); 
				//alert(kode);
			};
		});
		//****** TRANS PEMBELIAN *********//
		//Cari data satuan barang
		$('#txtBarang').on('change', function() {
		  var kdBarang = this.value;
		  //alert(kdBarang);
			$.ajax({
				type:"POST",
				url :"gudang/pembelian_proses.php",
				data:{kodeBarang:kdBarang},
				dataType: "json",
				success:function(resp){
					$("#satuanBarang").html(resp.msg1);
					$("#txtHarga").val(resp.msg2);
				},
			});
			//alert(kdBarang);
		}); 
		
		//tambah item pembelian
		$("#btnAddItem").click(function(){
			$("#formPembelian").submit(function(e){return false;});
			var btnId = this.id;
			var kdBarang = $('#txtBarang').val();
			var kdSatuan = $('#txtSatuan').val();
			var harga  = $('#txtHarga').val();
			var jumlah = $('#txtJumlah').val();
			//clear atribut required
			$('#txtTgl').attr('required',false);$('#txtNoFaktur').attr('required',false);$('#txtSupplier').attr('required',false);
			
			if(kdBarang.length<=0){$('#txtBarang').attr('required',true);$('#txtBarang').focus();$('.modal-body').html('<p>Nama Barang Tidak Boleh Kosong<p>');$('#modalPembelian').modal('show');}
			else if(kdSatuan.length<=0){$('#txtSatuan').attr('required',true);$('#txtSatuan').focus();$('.modal-body').html('<p>Data Satuan Tidak Boleh Kosong<p>');$('#modalPembelian').modal('show');}
			else if(harga<=0){$('#txtHarga').attr('required',true);$('#txtHarga').focus();$('.modal-body').html('<p>Data Harga Tidak Boleh Kosong<p>');$('#modalPembelian').modal('show');}
			else if(jumlah<=0){$('#txtJumlah').attr('required',true);$('#txtJumlah').focus();$('.modal-body').html('<p>Data Jumlah Tidak Boleh Kosong<p>');$('#modalPembelian').modal('show');}
			else{
				
				$.ajax({
					type:"POST",
					url:"gudang/pembelian_proses.php",
					data:{addItem:'',buttonId:btnId,codeBarang:kdBarang,kodeSatuan:kdSatuan,hrgBeli:harga,qty:jumlah},
					dataType: "json",
					success:function(resp){
						$("#alertMsg").html(resp.msg1);
						$("#alertMsg2").html(resp.msg2);
						$("#tblPembelian").html(resp.msg3);
						if($("#tblPembelian").length>0){
							$('#txtBarang').val('');
							$('#txtSatuan').val('');
							$('#txtHarga').val('');
							$('#txtJumlah').val('');
							$('#txtBarang').focus();
						};
					},
					error: function() {$('#alertMsg').html('<h3>Ajax Bermasalah !!!</h3>')},
				});
			}; 	
			//alert(btnId);
		});
		/*
		//menghapus baris pada tabel pembelian
		$(document).on('click',"#tblPembelian .btnHapus",function () {
			var r = confirm('ANDA YAKIN INGIN MENGHAPUS DATA INI ???');
			if(r==true){
				var kdRow = $(this).data('val');
				alert(kdRow);
				$.ajax({
					type:"POST",
					url:"gudang/pembelian_proses.php",
					data:{hapusItem:'',kodeRow:kdRow},
					dataType: "json",
					//contentType: 'application/json',
					success:function(resp){
						window.setTimeout(function(){window.location=window.location;}, 10);
						//alert('sukses');
						//$("#alertMsg").html(resp.msg1);
						//$("#tblArea").html(resp.msg2);
					},
					error: function (xhttp, status, res){console.log("xhttp:" + xhttp + "|" + "status:" + status + "|" + "res:" + res);},
					//error: function() {$('#alertMsg').html('<h3>Ajax Response Bermasalah !!!</h3>')},
					
				});
			};
			
		});
		*/
		//check no faktur
		$( "#txtNoFaktur" ).blur(function(){
			var noFaktur = $(this).val();
			if(noFaktur.length>=1){
				
				$.ajax({
					type:"POST",
					url:"gudang/pembelian_proses.php",
					data:{checkFaktur:'',noFaktur:noFaktur},
					dataType: "json",
					success:function(resp){
						
						$("#txtNoFaktur").focus();
						$('.modal-body').html(resp.msg1);
						$('.modal-footer .btn').hide();
						$('#modalPembelian').modal('show');
						//$("#alertMsg").html(resp.msg1);
						window.setTimeout(function(){$("#modalPembelian").modal('hide')}, 4000);
						
					},
				});
				
			}
			//alert(noFaktur);
		});
		//simpan data pembelian
		$("#btnPembelianSimpan").click(function(){
			$("#formPembelian").submit(function(e){return false;});
			var tgl = $('#txtTgl').val();
			var noFaktur = $('#txtNoFaktur').val();
			var supl = $('#txtSupplier').val();
			//clear alert message lenght
			$("#alertMsg,#alertMsg2,#alertMsg3").empty();
			//clear atribut
			$('#txtBarang').attr('required',false);$('#txtSatuan').attr('required',false);$('#txtHarga').attr('required',false);$('#txtJumlah').attr('required',false);
			if(tgl.length<=0){$('#txtTgl').attr('required',true);$('#txtTgl').focus();$('.modal-body').html('<p>Data tanggal tidak boleh kosong<p>');$('#modalPembelian').modal('show');}
			else if(noFaktur.length<=0){$('#txtNoFaktur').attr('required',true);$('#txtNoFaktur').focus();$('.modal-body').html('<p>No. Faktur tidak boleh kosong<p>');$('#modalPembelian').modal('show');}
			else if(supl.length<=0){$('#txtSupplier').attr('required',true);$('#txtSupplier').focus();$('.modal-body').html('<p>Data Supplier tidak boleh kosong<p>');$('#modalPembelian').modal('show');}
			else{
			
				$.ajax({
					type:"POST",
					url:"gudang/pembelian_proses.php",
					data:{simpanBeli:'',tgl:tgl,noFaktur:noFaktur,kdSupl:supl},
					dataType: "json",
					success:function(resp){
						$("#alertMsg").html(resp.msg1);
						var errMsg = $("#alertMsg").html(resp.msg1);
						var errMsg2 = $("#alertMsg2").html(resp.msg2);
						var errMsg3 = $("#alertMsg3").html(resp.msg3);
						
						//alert('Msg 1 : '+$("#alertMsg").text()+', Msg 2 : '+$("#alertMsg2").text()+', Msg 3 : '+$("#alertMsg3").text());	
						
						if( $('#alertMsg2').text().length!=0 ){
							var r = confirm('CETAK NOTA PEMBELIAN ???');
							if(r==true){
								//$('#panelPembelian').load('gudang/faktur_pembelian.php?faktur='+noFaktur);	
								window.open('gudang/faktur_pembelian.php?no_faktur='+noFaktur+'','page','toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=600,height=600,left=50,top=50,titlebar=yes');	
								window.setTimeout(function(){window.location=window.location;}, 1000);
							}else{

								window.setTimeout(function(){window.location=window.location;}, 1000);
							}
						}
						window.setTimeout(function(){window.location=window.location;}, 2000);		
					},
					error: function (xhttp, status, res){console.log("xhttp:" + xhttp + "|" + "status:" + status + "|" + "res:" + res);},
				});
			}
			//alert('success');
		});	
		
		
		//laporan stock barang. 
		$("#btnCariStock").click(function(){
			$("#formCariStock").submit(function(e){e.preventDefault();});
			var kategori = $('#kategori').val();
			var jmlStock = $('#jmlStock').val();
			$.ajax({
				type:"POST",
				url:"gudang/pembelian_proses.php",
				data:{cariStock:'',kategori:kategori,jmlStock:jmlStock},
				dataType:"json",
				success:function(resp){$("#tblPlaceHolder").html(resp.msg1);},
				//error: function(){$('#alertMsg').html('<h3>Ajax Bermasalah !!!</h3>')},
				error: function (xhttp, status, res){console.log("xhttp:" + xhttp + "|" + "status:" + status + "|" + "res:" + res);},
			});
			//alert(kategori +', '+jmlStock);
		});	
		
	//****** TRANSAKSI PENJUALAN *********//
	
	//input kode barang
	$('#inpKodeBarang').keypress(function(e) {
		if(e.which == 13) {
			var kdBarang = $(this).val()
			var noFaktur = $('#inpNoFaktur').val();
			if(kdBarang.length>=1){
				
				$.ajax({
					type:"POST",
					url:"kasir/penjualan_proses.php",
					data:{cariBarang:'',kdBarang:kdBarang,noFaktur:noFaktur},
					dataType: "json",
					success:function(resp){
						$("#alertMsg").html(resp.msg1);
						window.setTimeout(function(){window.location=window.location;}, 10);
						$('#inpKodeBarang').focus();
					},
					//error: function() {$('#alertMsg').html('<h3>Ajax Bermasalah !!!</h3>')},
					error: function (xhttp, status, res){console.log("xhttp:" + xhttp + "|" + "status:" + status + "|" + "res:" + res);},
				});	
				//alert(noFaktur);	
			}
			
		}
	});
	//hapus item penjualan.
	$(".btnHapusJual").click(function(){
		var r = confirm('YAKIN INGIN MENGHAPUS DATA INI ???');
		if(r==true){
				var id = $(this).data('val');
				$.ajax({
					type:"POST",
					url:"kasir/penjualan_proses.php",
					data:{hapusJual:'',kodeRow:id},
					dataType: "json",
					success:function(resp){
						$("#alertMsg").html(resp.msg1);
						window.setTimeout(function(){window.location=window.location;}, 0);
					},
					
				});
		};	
		
		
	});
	
	//simpan data penjualan
	$("#btnJualSimpan").click(function(){
		var noFaktur = $('#inpNoFaktur').val();
			$.ajax({
					type:"POST",
					url:"kasir/penjualan_proses.php",
					data:{simpanJual:'',noFaktur:noFaktur},
					dataType: "json",
					success:function(resp){
						$("#alertMsg").html(resp.msg1);
						window.setTimeout(function(){window.location=window.location;}, 0);
					},
					error: function() {$('#alertMsg').html('<h3>Ajax Bermasalah !!!</h3>')},
			});
		//alert(noFaktur);
	});
	//laporan setoran kasir. 
	$("#btnKasirSetoran").click(function(){
		$("#formKasirSetoran").submit(function(e){return false;});
		
		var tglAwal = $('#tglAwal').val();
		var blnAwal = $('#blnAwal').val();
		var thnAwal = $('#thnAwal').val();
		var tglAkhir = $('#tglAkhir').val();
		var blnAkhir = $('#blnAkhir').val();
		var thnAkhir = $('#thnAkhir').val();
		var user = $('#user').val();
		
		$.ajax({
					type:"POST",
					url:"kasir/penjualan_proses.php",
					data:{setoranKasir:'',tglAwal:tglAwal,blnAwal:blnAwal,thnAwal:thnAwal,tglAkhir:tglAkhir,blnAkhir:blnAkhir,thnAkhir:thnAkhir,user:user},
					dataType: "json",
					success:function(resp){
						$("#tblPlaceHolder").html(resp.msg1);
						//window.setTimeout(function(){window.location=window.location;}, 0);
					},
					error: function() {$('#alertMsg').html('<h3>Ajax Bermasalah !!!</h3>')},
			});
	
		//alert(thnAkhir);
	});	
	
	//****** LAPORAN *********//
	//Lap. Pembelian
	$("#btnLapPembelianShow").click(function(){
		$("#formLapPembelian").submit(function(e){return false;});
		
		var tglAwal = $('#tglAwal').val();
		var blnAwal = $('#blnAwal').val();
		var thnAwal = $('#thnAwal').val();
		var tglAkhir= $('#tglAkhir').val();
		var blnAkhir= $('#blnAkhir').val();
		var thnAkhir= $('#thnAkhir').val();
		
		$.ajax({
					type:"POST",
					url:"laporan/laporan_proses.php",
					data:{lapBeli:'',tglAwal:tglAwal,blnAwal:blnAwal,thnAwal:thnAwal,tglAkhir:tglAkhir,blnAkhir:blnAkhir,thnAkhir:thnAkhir},
					dataType: "json",
					success:function(resp){
						$("#tblPlaceHolder").html(resp.msg1);
						//window.setTimeout(function(){window.location=window.location;}, 0);
					},
					error: function() {$('#alertMsg').html('<h3>Ajax Bermasalah !!!</h3>')},
			});
	
		//alert(thnAkhir);
		
	});
	//Lap. Penjualan
	$("#btnLapPenjualanShow").click(function(){
		$("#formLapPenjualan").submit(function(e){return false;});
		
		var tglAwal = $('#tglAwal').val();
		var blnAwal = $('#blnAwal').val();
		var thnAwal = $('#thnAwal').val();
		var tglAkhir= $('#tglAkhir').val();
		var blnAkhir= $('#blnAkhir').val();
		var thnAkhir= $('#thnAkhir').val();
		
		$.ajax({
					type:"POST",
					url:"laporan/laporan_proses.php",
					data:{lapJual:'',tglAwal:tglAwal,blnAwal:blnAwal,thnAwal:thnAwal,tglAkhir:tglAkhir,blnAkhir:blnAkhir,thnAkhir:thnAkhir},
					dataType: "json",
					success:function(resp){
						$("#tblPlaceHolder").html(resp.msg1);
						//window.setTimeout(function(){window.location=window.location;}, 0);
					},
					error: function() {$('#alertMsg').html('<h3>Ajax Bermasalah !!!</h3>')},
			});
	
		//alert(thnAkhir);
		
	});
	//Lap. Profit Penjualan
	$("#btnLapProfitShow").click(function(){
		$("#formLapProfit").submit(function(e){return false;});
		
		var tglAwal = $('#tglAwal').val();
		var blnAwal = $('#blnAwal').val();
		var thnAwal = $('#thnAwal').val();
		var tglAkhir= $('#tglAkhir').val();
		var blnAkhir= $('#blnAkhir').val();
		var thnAkhir= $('#thnAkhir').val();
		
		$.ajax({
					type:"POST",
					url:"laporan/laporan_proses.php",
					data:{lapProfit:'',tglAwal:tglAwal,blnAwal:blnAwal,thnAwal:thnAwal,tglAkhir:tglAkhir,blnAkhir:blnAkhir,thnAkhir:thnAkhir},
					dataType: "json",
					success:function(resp){
						$("#tblPlaceHolder").html(resp.msg1);
						//window.setTimeout(function(){window.location=window.location;}, 0);
					},
					error: function() {$('#alertMsg').html('<h3>Ajax Bermasalah !!!</h3>')},
			});
	
		//alert(thnAkhir);
		
	});
	//Lap. Stock Barang
	$("#btnLapStockShow").click(function(){
		$("#formLaporanStock").submit(function(e){return false;});
		
		var kategori = $('#kategori').val();
		var jmlStock = $('#jmlStock').val();
			
			$.ajax({
						type:"POST",
						url:"laporan/laporan_proses.php",
						data:{cariStock:'',kategori:kategori,jmlStock:jmlStock},
						dataType: "json",
						success:function(resp){
							$("#tblPlaceHolder").html(resp.msg1);
							//window.setTimeout(function(){window.location=window.location;}, 0);
						},
						error: function() {$('#alertMsg').html('<h3>Ajax Bermasalah !!!</h3>')},
				});
	
		//alert(thnAkhir);
		
	});
	
	
});	


	