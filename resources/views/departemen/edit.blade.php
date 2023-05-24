<form action="/departemen/{{ $departemen->kode_dept }}/update" method="POST" id="formDepartemen">
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
        <input type="text" value="{{ $departemen->kode_dept }}" id="kode_dept" class="form-control" name="kode_dept" placeholder="Kode Dept" readonly>
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
        <input type="text" value="{{ $departemen->nama_dept }}" id="nama_dept" class="form-control" name="nama_dept" placeholder="Nama Dept">
      </div>
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