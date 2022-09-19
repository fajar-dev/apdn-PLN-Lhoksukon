 </div>

            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/main.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/magnific/jquery.magnific-popup.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/toastify/toastify.js"></script>

      <script>
        // Simple Datatable
        const dataTable = new simpleDatatables.DataTable("#table1", {
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