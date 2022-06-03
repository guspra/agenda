<?php foreach ($agenda_today as $row):  ?>

  <div class="modal fade" id="edit_agenda<?php echo $row['id']; ?>">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="bd p-15"><h5 class="m-0">Ubah Agenda Kegiatan</h5></div>
        <div class="modal-body">
          <form method="POST" action="agenda/v/e">
            <input type="hidden" value="<?php echo $row['id']; ?>" name="id_agenda" />
            <div class="form-group">
              <label class="fw-500" for="nama">Nama Kegiatan</label>
              <input class="form-control border-grey" id="nama" name="nama" value="<?php echo $row['nama'] ?>" required />
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
                      value="<?php echo date('d-M-Y', strtotime($row['tanggal'])); ?>"
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
                      value="<?php echo $row['waktu'] ?>"
                      required
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="fw-500" for="tempat">Tempat Kegiatan</label>
              <input class="form-control border-grey" id="tempat" name="tempat" value="<?php echo $row['tempat'] ?>" required />
            </div>
            <div class="form-group">
              <label class="fw-500" for="pakaian">Pakaian</label>
              <input class="form-control border-grey" id="pakaian" name="pakaian" value="<?php echo $row['pakaian'] ?>" required />
            </div>
            <div class="form-group">
              <label class="fw-500" for="peserta">Peserta Kegiatan</label>
              <input class="form-control border-grey" id="peserta" name="peserta" value="<?php echo $row['peserta'] ?>" required />
            </div>
            <div class="form-group" for="deskripsi">
              <label class="fw-500">Deskripsi Kegiatan</label>
              <textarea
                class="form-control border-grey"
                rows="5"
                name="deskripsi"
                id="deskripsi"
                required
              ><?php echo $row['deskripsi'] ?></textarea>
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
<?php endforeach; ?>
    


<script type="text/javascript">
    $('.clockpicker').clockpicker();
</script>