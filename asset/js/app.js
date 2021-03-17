document.onkeydown = function (e) {
    if (event.keyCode == 123 ) {
      return false;
    }
    if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
      return false;
    }
    if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
      return false;
    }
    if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
      return false;
    }
    if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
      return false;
    }
    if (e.ctrlKey && e.shiftKey && e.keyCode == 'K'.charCodeAt(0)) {
      return false;
    }
  }
$(document).ready(function(){
		$('#btn-tambah-form').click(function(){
			var jumlah = parseInt($('#jumlah-form').val());
			var nextForm = jumlah + 1;
			var kode_pemagang = $('#input-kode-pemagang').val();

			$('#insert-form').append("<hr style='height:1px;border:none;color:#333;background-color:#333;'/>" + 
				
                      "<input type='hidden' class='form-control' value='"+ kode_pemagang +"' readonly name='kode_pemagang[]'>"+
                   
                "<div class='form-group row'>"+
                    "<label class='col-sm-2 col-form-label'>Hubungan Keluarga</label>"+
                    "<div class='col-sm-5'>"+
                      "<select name='hubungan_keluarga[]' class='form-control'>"+
                        "<option>Hubungan Keluarga</option>"+
                        "<option value='Ayah'>Ayah</option>"+
                        "<option value='Ibu'>Ibu</option>"+
                        "<option value='Suami'>Suami</option>"+
                        "<option value='Istri'>Istri</option>"+
                        "<option value='Saya'>Saya</option>"+
                        "<option value='Kakek'>Kakek</option>"+
                        "<option value='Nenek'>Nenek</option>"+
                        "<option value='Paman'>Paman</option>"+
                        "<option value='Bibi'>Bibi</option>"+
                        "<option value='Anak.L'>Anak Laki - laki</option>"+
                        "<option value='Anak.P'>Anak Perempuan</option>"+
                        "<option value='Adik.P'>Adik Perempuan</option>"+
                        "<option value='Kakak.P'>Kakak Perempuan</option>"+
                        "<option value='Adik.L'>Adik Laki - laki</option>"+
                        "<option value='Kakak.L'>Kakak Laki - laki</option>"+
                      "</select>"+
                    "</div>"+
                "</div>"+
                "<div class='form-group row'>"+
                    "<label class='col-sm-2 col-form-label'>Nama</label>"+
                    "<div class='col-sm-5'>"+
                      "<input type='text' class='form-control' name='nama[]' placeholder='Nama Anggota Keluarga'>"+
                    "</div>"+
                "</div>"+
                "<div class='form-group row'>"+
                    "<label class='col-sm-2 col-form-label'>Usia</label>"+
                    "<div class='col-sm-5'>"+
                      "<input type='number' min='0' class='form-control' name='usia[]' placeholder='Usia Anggota Keluarga'>"+
                    "</div>"+
                "</div>"+
                "<div class='form-group row'>"+
                    "<label class='col-sm-2 col-form-label'>Pekerjaan</label>"+
                    "<div class='col-sm-3'>"+
                      "<input type='text' class='form-control' name='pekerjaan[]' placeholder='Pekerjaan Anggota Keluarga'>"+
                    "</div>"+
                    "<div class='col-sm-5'>"+
                      "<input type='text' class='form-control' name='pekerjaan_jep[]' placeholder='Pekerjaan Anggota Keluarga dalam Bahasa Jepang'>"+
                    "</div>"+
                  "</div>"+
                  "<div class='form-group row'>"+
                    "<label class='col-sm-2 col-form-label'>Gaji Jepang</label>"+
                    "<div class='col-sm-5'>"+
                      "<input type='number' min='0' class='form-control' name='gaji_jpn[]' placeholder='Jika Anggota Keluarga Bekerja di Jepang'>"+
                    "</div>"+
                  "</div>"+
                  "<div class='form-group row'>"+
                    "<label class='col-sm-2 col-form-label'>Gaji Indonesia</label>"+
                    "<div class='col-sm-5'>"+
                      "<input type='number' min='0' class='form-control' name='gaji_idn[]' placeholder='Jika Anggota Keluarga Bekerja di Indonesia'>"+
                    "</div>"+
                  "</div>");
			$('#btn-reset-form').click(function(){
				$('#insert-form').html("")
			})
		})
    $('#btn-tambah-form-pendidikan').click(function(){
      
      var kode_pemagang = $('#kode-pemagang-pendidikan').val();

      $('#insert-form-pendidikan').append("<hr style='height:1px;border:none;color:#333;background-color:#333;'/>" + 
        
                      "<input type='hidden' class='form-control' value='"+ kode_pemagang +"' readonly name='kode_pemagang[]'>"
                    +"</div>"+
                "</div>"+
                "<div class='form-group row'>"+
                    "<label class='col-sm-2 col-form-label'>Nama Sekolah</label>"+
                    "<div class='col-sm-5'>"+
                      "<input type='text' class='form-control' name='sekolah[]' placeholder='Nama Sekolah'>"+
                    "</div>"+
                "</div>"+
                "<div class='form-group row'>"+
                    "<label class='col-sm-2 col-form-label'>Jenis Pendidikan</label>"+
                    "<div class='col-sm-5'>"+
                      "<select name='jenis_pendidikan[]' class='form-control'>"+
                        "<option>Jenis Pendidikan</option>"+
                        "<option value='SD'>SD Sederajat</option>"+
                        "<option value='SLTP'>SLTP Sederajat</option>"+
                        "<option value='SLTA'>SLTA Sederajat</option>"+
                        "<option value='D3'>D3 Sederajat</option>"+
                        "<option value='D4'>D4 Sederajat</option>"+
                        "<option value='S1'>S1 Sederajat</option>"+
                      "</select>"+
                    "</div>"+
                "</div>"+
                "<div class='form-group row'>"+
                    "<label class='col-sm-2 col-form-label'>Tahun Masuk</label>"+
                    "<div class='col-sm-3'>"+
                      "<input type='number' class='form-control' name='tahun_msk[]' placeholder='Tahun Masuk'>"+
                    "</div>"+
                    "<div class='col-sm-2'>"+
                      "<select class='custom-select' name='bulan_msk[]'>"+
                          "<option>Bulan</option>"+
                          "<option value='1'>Januari</option>"+
                          "<option value='2'>Februari</option>"+
                          "<option value='3'>Maret</option>"+
                          "<option value='4'>April</option>"+
                          "<option value='5'>Mei</option>"+
                          "<option value='6'>Juni</option>"+
                          "<option value='7'>Juli</option>"+
                          "<option value='8'>Agustus</option>"+
                          "<option value='9'>September</option>"+
                          "<option value='10'>Oktober</option>"+
                          "<option value='11'>November</option>"+
                          "<option value='12'>Desember</option>"+
                        "</select>"+
                    "</div>"+
                "</div>"+
                "<div class='form-group row'>"+
                    "<label class='col-sm-2 col-form-label'>Tahun Keluar</label>"+
                    "<div class='col-sm-3'>"+
                      "<input type='number' class='form-control' name='tahun_klr[]' placeholder='Tahun Keluar'>"+
                    "</div>"+                                      
                    "<div class='col-sm-2'>"+
                      "<select class='custom-select' name='bulan_klr[]'>"+
                          "<option>Bulan</option>"+
                          "<option value='1'>Januari</option>"+
                          "<option value='2'>Februari</option>"+
                          "<option value='3'>Maret</option>"+
                          "<option value='4'>April</option>"+
                          "<option value='5'>Mei</option>"+
                          "<option value='6'>Juni</option>"+
                          "<option value='7'>Juli</option>"+
                          "<option value='8'>Agustus</option>"+
                          "<option value='9'>September</option>"+
                          "<option value='10'>Oktober</option>"+
                          "<option value='11'>November</option>"+
                          "<option value='12'>Desember</option>"+
                      "</select>"+
                    "</div>"+
                "</div>"+
                "<div class='form-group row'>"+
                    "<label class='col-sm-2 col-form-label'>Jurusan</label>"+
                    "<div class='col-sm-5'>"+
                      "<input type='text' class='form-control' name='jurusan[]' placeholder='Jika tidak ada, berikan tanda -'>"+
                    "</div>"+
                  "</div>");
      $('#btn-reset-form-pendidikan').click(function(){
        $('#insert-form-pendidikan').html("")
      })
    })
		$('#btn-tambah-form-pekerjaan').click(function(){
			
			var no = 1;
			// var nextForm = jumlah + 1;
			var kode_pemagang_kerja = $('#input-kode-pemagang-kerja').val();

			$('#insert-form-kerja').append("<hr style='height:1px;border:none;color:#333;background-color:#333;'/>" + 
				
                      "<input type='hidden' class='form-control' value='"+ kode_pemagang_kerja +"' readonly name='kode_pemagang[]'>"+
        
                "<div class='form-group row'>"+
                    "<label class='col-sm-3 col-form-label'>Nama Perusahaan</label>"+
                    "<div class='col-sm-5'>"+
                      "<input type='text' class='form-control' name='nama_perusahaan[]' placeholder='Nama Perusahaan'>"+
                    "</div>"+
                    "<div class='col-sm-4'>"+
                      "<input type='text' class='form-control' name='nama_perusahaan_jep[]' placeholder='Nama Perusahaan dalam Bahasa Jepang'>"+
                    "</div>"+
                "</div>"+
                "<div class='form-group row'>"+
                    "<label class='col-sm-3 col-form-label'>Tahun Masuk</label>"+
                    "<div class='col-sm-3'>"+
                      "<input type='number' class='form-control' name='tahun_msk[]' min='1975' placeholder='Tahun Masuk'>"+
                    "</div>"+
                    "<div class='col-sm-2'>"+
                      "<select class='custom-select' name='bulan_msk[]'>"+
                          "<option>Bulan</option>"+
                          "<option value='1'>Januari</option>"+
                          "<option value='2'>Februari</option>"+
                          "<option value='3'>Maret</option>"+
                          "<option value='4'>April</option>"+
                          "<option value='5'>Mei</option>"+
                          "<option value='6'>Juni</option>"+
                          "<option value='7'>Juli</option>"+
                          "<option value='8'>Agustus</option>"+
                          "<option value='9'>September</option>"+
                          "<option value='10'>Oktober</option>"+
                          "<option value='11'>November</option>"+
                          "<option value='12'>Desember</option>"+
                        "</select>"+
                    "</div>"+
                  "</div>"+
                  
                  "<div class='form-group row'>"+
                    "<label class='col-sm-3 col-form-label'>Tahun Keluar</label>"+
                    "<div class='col-sm-3'>"+
                      "<input type='number' class='form-control' name='tahun_klr[]' min='1975' placeholder='Tahun Keluar'>"+
                    "</div>"+
                    "<div class='col-sm-2'>"+
                      "<select class='custom-select' name='bulan_klr[]'>"+
                          "<option>Bulan</option>"+
                          "<option value='1'>Januari</option>"+
                          "<option value='2'>Februari</option>"+
                          "<option value='3'>Maret</option>"+
                          "<option value='4'>April</option>"+
                          "<option value='5'>Mei</option>"+
                          "<option value='6'>Juni</option>"+
                          "<option value='7'>Juli</option>"+
                          "<option value='8'>Agustus</option>"+
                          "<option value='9'>September</option>"+
                          "<option value='10'>Oktober</option>"+
                          "<option value='11'>November</option>"+
                          "<option value='12'>Desember</option>"+
                        "</select>"+
                    "</div>"+
                  "</div>"+
                "<div class='form-group row'>"+
                    "<label class='col-sm-3 col-form-label'>Jenis Pekerjaan</label>"+
                    "<div class='col-sm-5'>"+
                      "<input type='text' class='form-control' name='jenis_kerja[]' placeholder='Jenis Pekerjaan'>"+
                    "</div>"+
                    "<div class='col-sm-4'>"+
                      "<input type='text' class='form-control' name='jenis_kerja_jep[]' placeholder='Jenis Pekerjaan dalam Bahasa Jepang'>"+
                    "</div>"+
                  "</div>"+
                  "<div class='form-group row'>"+
                    "<label class='col-sm-3 col-form-label'>Status Kerja</label>"+
                    "<div class='col-sm-2'>"+
                      "<select class='custom-select' name='sts_kerja[]'>"+
                          "<option>Status Kerja</option>"+
                          "<option value='magang'>Magang</option>"+
                          "<option value='karyawan'>Karyawan</option>"+
                        "</select>"+
                    "</div>"+
                  "</div>"+
                  "<div class='form-group row'>"+
                    "<label class='col-sm-3 col-form-label'>Gaji Pekerjaan</label>"+
                    "<div class='col-sm-5'>"+
                      "<input type='number' class='form-control' name='gaji[]' placeholder='Gaji Pekerjaan'>"+
                    "</div>"+
                  "</div>");
      no++;
			$('#btn-reset-form-kerja').click(function(){
				$('#insert-form-kerja').html("")
        no--;
			})
		})
	})
$(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#newComers").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#perusahaan").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
