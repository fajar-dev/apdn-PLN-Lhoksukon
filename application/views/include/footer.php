 </div>

            </div>
        </div>
    </div>
    
    <script src="<?php echo base_url()?>assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.bundle.min.js"></script>

    <script src="<?php echo base_url()?>assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/magnific/jquery.magnific-popup.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/toastify/toastify.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

    <?php if(($_SERVER['PHP_SELF']) == ($_SERVER['SCRIPT_NAME'].'/page/laporan')){?> 
    <script>
       $(document).ready(function() {
        $('#example').DataTable( {
          paging: false,
          ordering: false,
          info: false,
          searching: false,
            dom: 'Bfrtip',
            buttons: [
              {
                extend: 'print',
                messageTop: 'SIBASAH PTPN III Kebun Gunung Para',
              },
              {
                  extend: 'excel',
                  messageTop: 'SIBASAH PTPN III Kebun Gunung Para',
              },
              {
                extend: 'pdfHtml5',
                messageTop: 'SIBASAH PTPN III Kebun Gunung Para',
                download: 'open',
                pageSize: 'A4'
              }
            ]
        } );
      } ); 
    </script>
    <?php } ?> 
    <?php if(isset($harian)){?> 
    <script>
      $(document).ready(function() {
        $('#periode').DataTable( {
          paging: false,
          ordering: false,
          info: false,
          searching: false,
            dom: 'Bfrtip',
            buttons: [
              {
                extend: 'print',
                title: 'Laporan periode <?php echo $dari.' - '.$sampai?>',
                messageTop: 'SIBASAH PTPN III Kebun Gunung Para',
              },
              {
                  extend: 'excel',
                  title: 'Laporan periode <?php echo $dari.' - '.$sampai?>',
                  messageTop: 'SIBASAH PTPN III Kebun Gunung Para',
              },
              {
                extend: 'pdfHtml5',
                title: 'Laporan periode <?php echo $dari.' - '.$sampai?>',
                messageTop: 'SIBASAH PTPN III Kebun Gunung Para',
                download: 'open',
                pageSize: 'A4'
              }
            ]
        } );
    } ); 
    </script>
    <?php } ?> 
      <script>
        // Simple Datatable
        const dataTable = new simpleDatatables.DataTable("#table1", {
        });

      // Basic
        $("#select").select2({
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        });
    </script>
    <script>
      $('.test-popup-link').magnificPopup({
        type: 'image'
        // other options
      });
      
      $('.btn-del').on('click',function(e) {
          e.preventDefault();
          const href = $(this).attr('href')
          Swal.fire({
            title: 'Hapus data ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'delete'
          }).then((result) => {
            if (result.value) {
              document.location.href = href;
            }
          })
        })
    
    </script>
    <?php if(($_SERVER['PHP_SELF']) == ($_SERVER['SCRIPT_NAME'].'/page/dashboard')){?> 
    <script>
      var optionsProfileVisit = {
        annotations: {
          position: 'back'
        },
        dataLabels: {
          enabled:false
        },
        chart: {
          type: 'bar',
          height: 300
        },
        fill: {
          opacity:1
        },
        plotOptions: {
        },
        series: [{
          name: 'total',
          data: [<?php foreach($hasil as $data){echo round($data->berat,1).',';}?>]
        }],
        colors: '#435ebe',
        xaxis: {
          categories: [<?php foreach($hasil as $data){echo '"'.$data->nama.'" ,';}?>],
        },
      }
      let optionsVisitorsProfile  = {
        series: [<?php echo round($plastik->hasil,1); ?>, <?php echo round($kertas->hasil,1); ?>, <?php echo round($kaleng->hasil,1); ?>],
        labels: ['Plastik', 'Kertas', 'kaleng'],
        colors: ['#ff7976','#5ddab4', '#57caeb'],
        chart: {
          type: 'donut',
          width: '100%',
          height:'350px'
        },
        legend: {
          position: 'bottom'
        },
        plotOptions: {
          pie: {
            donut: {
              size: '0%'
            }
          }
        }
      }
      var chartVisitorsProfile = new ApexCharts(document.getElementById('chart-visitors-profile'), optionsVisitorsProfile)
      var chartProfileVisit = new ApexCharts(document.querySelector("#chart-profile-visit"), optionsProfileVisit);
      chartProfileVisit.render();
      chartVisitorsProfile.render()
    </script>
    <?php } ?>
    <?php
    if($this->session->flashdata('msg') == "tambah"){
      echo'
      <script>
            Toastify({
                text: "<strong>Berhasil</strong> menambahkan data !!",
                duration: 3000,
                close:true,
                gravity:"top",
                position: "right",
                backgroundColor: "#4fbe87",
            }).showToast();
      </script>
      ';
    }elseif($this->session->flashdata('msg') == "hapus"){
      echo'
      <script>
            Toastify({
                text: "<strong>Berhasil</strong> menghapus data !!",
                duration: 3000,
                close:true,
                gravity:"top",
                position: "right",
                backgroundColor: "#4fbe87",
            }).showToast();
      </script>
      ';
    }elseif($this->session->flashdata('msg') == "edit"){
      echo'
      <script>
            Toastify({
                text: "<strong>Berhasil</strong> mengubah data !!",
                duration: 3000,
                close:true,
                gravity:"top",
                position: "right",
                backgroundColor: "#4fbe87",
            }).showToast();
      </script>
      ';
    }?>

</body>

</html>