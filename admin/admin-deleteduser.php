<?php
    require_once 'assets/php/admin-header.php';
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card border-danger mt-4">
            <div class="card-header bg-danger text-white">
                <h4 class="m-0">Deleted Users</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive" id="showAllDeletedUsers">
                    <p class="text-center align-self-center lead">Please Wait...</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer Area -->
</div>
</div>
</div>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-2.0.7/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    $(document).ready(function(){
        //Fetch All users Ajax Request
        fetchAllDeletedUsers();

        function fetchAllDeletedUsers(){
            $.ajax({
                url: 'assets/php/admin-action.php',
                method: 'post',
                data: { action: 'fetchAllDeletedUsers' },
                success: function(response){
                    $("#showAllDeletedUsers").html(response); // Corrección: Agregar "#" para seleccionar por ID
                    $("table").DataTable({
                        order: [0, 'desc']
                    });
                }
            });
        }

        //Restore deleted user ajax request
    $("body").on("click", ".restoreUserIcon", function(e){
    e.preventDefault();
    var res_id = $(this).attr('id'); // Use .data('id') to get the data-id attribute value
    Swal.fire({
        title: "Are you sure want restore this user?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, restore it!"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'assets/php/admin-action.php',
                method: 'post',
                data: { res_id: res_id },
                success:function(response){
                    Swal.fire({
                        title: "Restored!",
                        text: "User restored successfully !",
                        icon: "success"
                    });
                    fetchAllDeletedUsers();
                },
                error: function(xhr, status, error) {
                    console.error("AJAX error: ", status, error);
                }
            });
        }
    });
});
    });
</script>

</body>
</html>
