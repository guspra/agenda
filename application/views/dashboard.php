<main class="main-content bgc-grey-100">
  <div id="mainContent">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <div class="bdrs-3 ov-h bgc-white bd">
            <div class="bgc-deep-purple-500 ta-c p-30">
              <h1 class="fw-300 mB-5 lh-1 c-white">
                <?php echo $this->Mcrud->hari_id($hari_ini); ?>
              </h1>
              <h3 class="c-white"><?php echo $this->Mcrud->tgl_id($hari_ini, 'full'); ?></h3>
            </div>
            <div class="pos-r">
              <button
                type="button"
                class="mT-nv-50 pos-a r-10 t-2 btn cur-p bdrs-50p p-0 w-3r h-3r btn-warning"
                data-toggle="modal"
                data-target="#add_agenda"
              >
                <i class="ti-plus"></i>
              </button>
              <ul class="m-0 p-0 mT-20">
                <?php if ($agenda_today != null):
                  foreach ($agenda_today as $row): ?>
                <li class="bdB peers ai-c jc-sb fxw-nw">
                  <a
                    class="td-n p-20 peers fxw-nw mR-20 peer-greed c-grey-900 link-agenda"
                    href="javascript:void(0);"
                    data-toggle="modal"
                    data-target="#detail_agenda<?php echo $row['id']; ?>"
                    ><div class="peer mR-15">
                      <i class="fa fa-fw fa-clock-o c-green-500"></i>
                    </div>
                    <div class="peer">
                      <span class="fw-600"><?php echo $row['nama']; ?></span>
                      <div class="c-grey-600">
                        <span class="c-grey-700"><?php echo $this->Mcrud->jam($row['waktu']); ?> - </span
                        ><i><?php echo $row['tempat'] ?></i>
                      </div>
                    </div></a
                  >
                  <div class="peers mR-15">
                    <div class="peer">
                      <a
                        href=""
                        class="td-n c-deep-purple-500 cH-blue-500 fsz-md p-5"
                        data-toggle="modal"
                        data-target="#edit_agenda<?php echo $row['id']; ?>"
                        ><i class="ti-pencil"></i
                      ></a>
                    </div>
                    <div class="peer">
                      <a
                        href=""
                        class="td-n c-red-500 cH-blue-500 fsz-md p-5"
                        data-toggle="modal"
                        data-target="#delete_agenda<?php echo $row['id']; ?>"
                        ><i class="ti-trash"></i
                      ></a>
                    </div>
                  </div>
                </li>
                <?php endforeach;
                else : ?>
                  <div class="p-20"><h6 class="ta-c fsz-sm">-- Belum ada agenda --</h6></div>
                <?php endif; ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-8"><div id="calendar"></div></div>
      </div>

      <!-- Add Agenda  -->
      <?php $this->load->view('agenda/add_agenda'); ?>

      <!-- Detail Agenda  -->
      <?php $this->load->view('agenda/detail_agenda'); ?>

      <!-- Detail Agenda  -->
      <?php $this->load->view('agenda/edit_agenda'); ?>

      <!-- Detail Agenda  -->
      <?php $this->load->view('agenda/delete_agenda'); ?>
    </div>
  </div>
</main>
  
<script src="node_modules/fullcalendar/main.js"></script>
<script src="node_modules/fullcalendar/locales/id.js"></script>
<script>
  const agenda = <?php echo json_encode($agenda);  ?>;
  var arr_events = [];

  agenda.forEach(agendaFunction);

  function agendaFunction(item, index) {
    arr_events[index] = {
      title: item.nama,
      start: item.tanggal
    }
  }

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      locale: 'id',
      selectable: true,
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      dateClick: function(info) {
        var clicked_date = info.dateStr;
        $.ajax({
          type:"POST",
          url: "users/index",
          data: "clicked_date=" + clicked_date,
          success: function(data){
          },
        });
      },
      events: arr_events
    });
    calendar.render();
  });

</script>
  
