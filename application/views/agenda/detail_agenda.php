<?php foreach ($agenda_today as $row):?>

  <div class="modal fade" id="detail_agenda<?php echo $row['id']; ?>">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="bd p-15"><h5 class="m-0">Detail Kegiatan</h5></div>
        <div class="modal-body">
          <div class="table-responsive">
			      <table class="table table-bordered table-striped" width="100%">
              <tbody>
                <tr>
                  <th valign="top" width="160">Nama Kegiatan</th>
                  <th valign="top" width="1">:</th>
                  <td><?php echo $row['nama']; ?></td>
                </tr>
                <tr>
                  <th valign="top" width="160">Tanggal</th>
                  <th valign="top" width="1">:</th>
                  <td><?php echo $row['tanggal']; ?></td>
                </tr>
                <tr>
                  <th valign="top" width="160">Jam</th>
                  <th valign="top" width="1">:</th>
                  <td><?php echo $row['waktu']; ?></td>
                </tr>
                <tr>
                  <th valign="top">Tempat</th>
                  <th valign="top">:</th>
                  <td><?php echo $row['tempat']; ?></td>
                </tr>
                <tr>
                  <th valign="top" width="160">Pakaian</th>
                  <th valign="top" width="1">:</th>
                  <td><?php echo $row['pakaian']; ?></td>
                </tr>
                <tr>
                  <th valign="top" width="160">Peserta</th>
                  <th valign="top" width="1">:</th>
                  <td><?php echo $row['peserta']; ?></td>
                </tr>
                <tr>
                  <th valign="top" width="160">Deskripsi</th>
                  <th valign="top" width="1">:</th>
                  <td><?php echo $row['deskripsi']; ?></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="text-right">
            <button
              class="btn btn-primary cur-p"
              data-dismiss="modal"
              name=""
            >
              Close
            </button>
          </div>
            
        </div>
      </div>
    </div>
  </div>

<?php endforeach; ?>


    