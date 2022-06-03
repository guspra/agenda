<div class="modal fade" id="add_agenda">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="bd p-15"><h5 class="m-0">Tambah Agenda Kegiatan</h5></div>
        <div class="modal-body">
          <form method="POST" action="agenda/v/t">
            <div class="form-group">
              <label class="fw-500" for="nama">Nama Kegiatan</label>
              <input class="form-control border-grey" id="nama" name="nama" required />
            </div>
            <div class="row">
              <div class="col-md-6">
                <label class="fw-500" for="tanggal">Tanggal</label>
                <div class="timepicker-input input-icon form-group">
                  <div class="input-group">
                    <div
                      class="icon-agenda bgc-white bd bdwR-0"
                    >
                      <i class="ti-calendar"></i>
                    </div>
                    <input
                      type="text"
                      class="form-control border-grey start-date"
                      placeholder="Pilih tanggal"
                      data-provide="datepicker"
                      data-date-format="d-M-yyyy"
                      name="tanggal"
                      id="tanggal"
                      required
                    />
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <label class="fw-500" for="waktu">Jam</label>
                <div class="clockpicker input-icon form-group" data-autoclose="true">
                  <div class="input-group">
                    <div
                      class="icon-agenda bgc-white bd bdwR-0"
                    >
                      <i class="ti-time"></i>
                    </div>
                    <input
                      type="text"
                      class="form-control border-grey"
                      placeholder="Pilih jam"
                      name="waktu"
                      id="waktu"
                      required
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="fw-500" for="tempat">Tempat Kegiatan</label>
              <input class="form-control border-grey" id="tempat" name="tempat" required />
            </div>
            <div class="form-group">
              <label class="fw-500" for="pakaian">Pakaian</label>
              <input class="form-control border-grey" id="pakaian" name="pakaian" required />
            </div>
            <div class="form-group">
              <label class="fw-500" for="peserta">Peserta Kegiatan</label>
              <input class="form-control border-grey" id="peserta" name="peserta" required />
            </div>
            <div class="form-group" for="deskripsi">
              <label class="fw-500">Deskripsi Kegiatan</label>
              <textarea
                class="form-control border-grey"
                rows="5"
                name="deskripsi"
                id="deskripsi"
                required
              ></textarea>
            </div>
            
              <div class="text-right">
              <button
                class="btn btn-secondary cur-p float-left"
                data-dismiss="modal"
                name=""
              >
                Kembali
              </button>
              <button
                class="btn btn-success cur-p"
                name=""
              >
                Simpan
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
    


<script type="text/javascript">
    $('.clockpicker').clockpicker();
</script>