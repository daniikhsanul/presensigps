@extends('layouts.admin.tabler')
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <h2 class="page-title">
            Data Karyawan
          </h2>
        </div>
      </div>
    </div>
  </div>
  <div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-12">
                          @if (Session::get('success'))                          
                            <div class="alert alert-success">
                              {{Session::get('success')}}
                            </div>
                          @endif

                          @if (Session::get('warning'))                          
                            <div class="alert alert-warning">
                              {{Session::get('warning')}}
                            </div>
                          @endif
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <a href="#" class="btn btn-primary" id="btnTambahkaryawan">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                              <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                              <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                              <path d="M12 11l0 6"></path>
                              <path d="M9 14l6 0"></path>
                           </svg>
                            Tambah Data</a>
                        </div>
                      </div>
                        <div class="row mt-2">
                          <div class="col-12">
                            <form action="/karyawan" method="GET">
                              <div class="row">
                                <div class="col-6">
                                  <div class="form-group">
                                    <input type="text" name="nama_karyawan" id="nama_karyawan" class="form-control" placeholder="Nama Karyawan" value="{{ Request('nama_karyawan') }}">
                                  </div>
                                </div>
                                <div class="col-4">
                                  <div class="form-group">
                                    <select name="kode_dept" id="kode_dept" class="form-select">
                                      <option value="">Departemen</option>
                                      @foreach ( $departemen as $d )
                                        <option {{ Request('kode_dept')==$d->kode_dept ? 'selected' : ''}} 
                                        value="{{ $d->kode_dept }}">{{ $d->nama_dept }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                                <div class="col-2">
                                  <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                        <path d="M21 21l-6 -6"></path>
                                     </svg>
                                     Cari
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>

                      <div class="row mt-2">
                        <div class="col-12">
                          <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NIK</th>
                                    <th>NAMA</th>
                                    <th>JABATAN</th>
                                    <th>NO. HP</th>
                                    <th>FOTO</th>
                                    <th>DEPARTEMEN</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($karyawan as $d)
                                @php
                                    $path = Storage::url('uploads/karyawan/'.$d->foto);        
                                @endphp
                                    <tr>
                                        <td>{{ $loop->iteration + $karyawan->firstItem()-1 }}</td>
                                        <td>{{ $d->nik }}</td>
                                        <td>{{ $d->nama_lengkap }}</td>
                                        <td>{{ $d->jabatan }}</td>
                                        <td>{{ $d->no_hp }}</td>
                                        <td>
                                            @if (empty($d->foto))
                                            <img src="{{ asset('assets/img/sample/avatar/avatar1.jpg') }}" class="avatar" alt=""></td>
                                            @else
                                            <img src="{{ url($path) }}" class="avatar" alt="">                              
                                            @endif
                                        </td>                                    
                                        <td>{{ $d->nama_dept }}</td>
                                        <td>
                                          <div class="btn-group">
                                            <a href="#" class="edit btn btn-info btn-sm" nik="{{ $d->nik }}">
                                              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                                <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                                <path d="M16 5l3 3"></path>
                                              </svg>
                                            </a>
                                            
                                            <form action="/karyawan/{{ $d->nik }}/delete" style="margin-left: 5px" method="POST">
                                              @csrf
                                              <a class="btn btn-danger btn-sm delete-confirm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                  <path d="M20 6a1 1 0 0 1 .117 1.993l-.117 .007h-.081l-.919 11a3 3 0 0 1 -2.824 2.995l-.176 .005h-8c-1.598 0 -2.904 -1.249 -2.992 -2.75l-.005 -.167l-.923 -11.083h-.08a1 1 0 0 1 -.117 -1.993l.117 -.007h16z" stroke-width="0" fill="currentColor"></path>
                                                  <path d="M14 2a2 2 0 0 1 2 2a1 1 0 0 1 -1.993 .117l-.007 -.117h-4l-.007 .117a1 1 0 0 1 -1.993 -.117a2 2 0 0 1 1.85 -1.995l.15 -.005h4z" stroke-width="0" fill="currentColor"></path>
                                               </svg>
                                              </a>
                                            </form>
                                          </div>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>   
                          {{ $karyawan->links('vendor.pagination.bootstrap-4') }}
                        </div>
                      </div>
                
                    </div>
                </div>
            </div>
        </div>
    </div>    
  </div>
  <div class="modal modal-blur fade" id="modal-inputkaryawan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Data Karyawan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/karyawan/store" method="POST" id="formKaryawan" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-12">
                <div class="input-icon mb-3">
                  <span class="input-icon-addon">
                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-barcode" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M4 7v-1a2 2 0 0 1 2 -2h2"></path>
                      <path d="M4 17v1a2 2 0 0 0 2 2h2"></path>
                      <path d="M16 4h2a2 2 0 0 1 2 2v1"></path>
                      <path d="M16 20h2a2 2 0 0 0 2 -2v-1"></path>
                      <path d="M5 11h1v2h-1z"></path>
                      <path d="M10 11l0 2"></path>
                      <path d="M14 11h1v2h-1z"></path>
                      <path d="M19 11l0 2"></path>
                   </svg>
                  </span>
                  <input type="text" value="" id="nik" class="form-control" name="nik" placeholder="NIK">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="input-icon mb-3">
                  <span class="input-icon-addon">
                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-writing" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M20 17v-12c0 -1.121 -.879 -2 -2 -2s-2 .879 -2 2v12l2 2l2 -2z"></path>
                      <path d="M16 7h4"></path>
                      <path d="M18 19h-13a2 2 0 1 1 0 -4h4a2 2 0 1 0 0 -4h-3"></path>
                   </svg>
                  </span>
                  <input type="text" value="" id="nama_lengkap" class="form-control" name="nama_lengkap" placeholder="NAMA KARYAWAN">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="input-icon mb-3">
                  <span class="input-icon-addon">
                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-badges-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M16.486 12.143l-4.486 2.69l-4.486 -2.69a1 1 0 0 0 -1.514 .857v4a1 1 0 0 0 .486 .857l5 3a1 1 0 0 0 1.028 0l5 -3a1 1 0 0 0 .486 -.857v-4a1 1 0 0 0 -1.514 -.857z" stroke-width="0" fill="currentColor"></path>
                      <path d="M16.486 3.143l-4.486 2.69l-4.486 -2.69a1 1 0 0 0 -1.514 .857v4a1 1 0 0 0 .486 .857l5 3a1 1 0 0 0 1.028 0l5 -3a1 1 0 0 0 .486 -.857v-4a1 1 0 0 0 -1.514 -.857z" stroke-width="0" fill="currentColor"></path>
                   </svg>
                  </span>
                  <input type="text" value="" id="jabatan" class="form-control" name="jabatan" placeholder="JABATAN">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="input-icon mb-3">
                  <span class="input-icon-addon">
                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-mobile" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M6 5a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2v-14z"></path>
                      <path d="M11 4h2"></path>
                      <path d="M12 17v.01"></path>
                   </svg>
                  </span>
                  <input type="text" value="" id="no_hp" class="form-control" name="no_hp" placeholder="NO HP">
                </div>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-12">
                <input type="file" name="foto" class="form-control">
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-12">
                <select name="kode_dept" id="kode_dept" class="form-select">
                  <option value="">Departemen</option>
                  @foreach ( $departemen as $d )
                    <option {{ Request('kode_dept')==$d->kode_dept ? 'selected' : ''}} 
                    value="{{ $d->kode_dept }}">{{ $d->nama_dept }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-12">
                <div class="form-group">
                  <button class="btn btn-primary w-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M10 14l11 -11"></path>
                      <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5"></path>
                   </svg>
                    Simpan</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- modaledit -->
  <div class="modal modal-blur fade" id="modal-editkaryawan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Data Karyawan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="loadeditform">
          
        </div>
      </div>
    </div>
  </div>
@endsection

@push('myscript')
  <script>
    $(function(){
      $("#btnTambahkaryawan").click(function(){
        $("#modal-inputkaryawan").modal("show");
      });

      $(".edit").click(function(){
        var nik = $(this).attr('nik');
        $.ajax({
          type:'POST'
          , url:'/karyawan/edit'
          , cache:false
          , data: {
            _token: '{{ csrf_token() }}'
            ,  nik: nik
          },
          success:function(respond){
            $("#loadeditform").html(respond);
          }
        });
       $("#modal-editkaryawan").modal("show");
      });
      
      $(".delete-confirm").click(function(e){
        var form = $(this).closest('form');
        e.preventDefault();
        Swal.fire({
          title: 'Apakah kamu yakin ingin menghapus data ini?',
          text: "Jika iya, data ini akan dihapus permanen lho..",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Hapus Saja'
        }).then((result) => {
          if (result.isConfirmed) {
            form.submit();
            Swal.fire(
              'Deleted!',
              'Data Berhasil Dihapus',
              'success'
            )
          }
        })
      });
      
     $("#formKaryawan").submit(function(){
          var nik = $("#nik").val();
          var nama_lengkap = $("#nama_lengkap").val();
          var jabatan = $("#jabatan").val();
          var no_hp = $("#no_hp").val();
          var kode_dept = $("formKaryawan").find("#kode_dept").val();
        if (nik == ""){
          //alert('NIK HARUS DIISI');
          Swal.fire({
            title: 'Eittss!',
            text: 'NIK Harus Diisi',
            icon: 'warning',
            confirmButtonText: 'Yuk Diisi Dulu'
          }).then((result)=>{
            $("#nik").focus();
          });
          return false;

        }else if (nama_lengkap == ""){
          Swal.fire({
            title: 'Eittss!',
            text: 'Nama Harus Diisi',
            icon: 'warning',
            confirmButtonText: 'Yuk Diisi Dulu'
          }).then((result)=>{
            $("#nama_lengkap").focus();
          });
          return false;

        }else if (jabatan == ""){
          Swal.fire({
            title: 'Eittss!',
            text: 'Jabatan Harus Diisi',
            icon: 'warning',
            confirmButtonText: 'Yuk Diisi Dulu'
          }).then((result)=>{
            $("#jabatan").focus();
          });
          return false;

        }else if (no_hp == ""){
          Swal.fire({
            title: 'Eittss!',
            text: 'No HP Harus Diisi',
            icon: 'warning',
            confirmButtonText: 'Yuk Diisi Dulu'
          }).then((result)=>{
            $("#no_hp").focus();
          });
          return false;
        
        }else if (kode_dept == ""){
          Swal.fire({
            title: 'Eittss!',
            text: 'Departemen Harus Diisi',
            icon: 'warning',
            confirmButtonText: 'Yuk Diisi Dulu'
          }).then((result)=>{
            $("#kode_dept").focus();
          });
          return false;
        }

     });
    });
  </script>
@endpush