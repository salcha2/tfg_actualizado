<!-- Encabezado y otros elementos -->
<?php require_once 'assets/php/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <!-- Mensaje de alerta -->
            <?php if($verified == 'Non Verified!'): ?>               
                <div class="alert alert-danger alert-dismissible text-center mt-2 m-0">
                    <button class="close" type="button" data-dismiss="alert">&times;</button>
                    <strong>Your E-mail is not verified! We've sent you an E-mail Verification link on your E-mail, check & verify now!</strong>
                </div>
            <?php endif; ?>
            <!-- Título de la sección -->
            <h4 class="text-center text-primary mt-2">Write Your Notes Here & Access Anytime Anywhere!</h4>
        </div>
    </div>
    <!-- Contenido de la tarjeta -->
    <div class="card border-primary">
        <h5 class="card-header bg-primary d-flex justify-content-between">
            <span class="text-light lead align-self-center">All Notes</span>
            <!-- Botón para abrir el modal de agregar nota -->
            <button id="openAddNoteModalBtn" class="btn btn-light">
                <i class="fas fa-plus-circle fa-lg"></i>&nbsp;Add New Note
            </button>
        </h5>
        <div class="card-body">
            <!-- Contenido de la tabla -->
            <div class="table-responsive" id="showNote">
                <table class="table table-striped text-center">
                    <!-- Cabecera de la tabla -->
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Note</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <!-- Cuerpo de la tabla (solo un ejemplo) -->
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Web Design</td>
                            <td>Lorem ipsum dolor sit amet</td>
                            <td>
                                <!-- Acciones (solo un ejemplo) -->
                                <a href="#" title="View Details" class="text-success infoBtn">
                                    <i class="fas fa-info-circle fa-lg"></i>
                                </a>
                                <a href="#" title="Edit Note" class="text-primary editBtn">
                                    <i class="fas fa-edit fa-lg"></i>
                                </a>
                                <a href="#" title="Delete Note" class="text-danger deleteBtn">
                                    <i class="fas fa-trash-alt fa-lg"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal para agregar una nueva nota -->
<div id="addNoteModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title text-light">Add New Note</h4>
                <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <!-- Formulario para agregar una nueva nota -->
                <form action="#" method="post" id="add-note-form" class="px-3">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control form-control-lg" placeholder="Enter Title" required>
                    </div>
                    <div class="form-group">
                        <label for="note">Note</label>
                        <textarea name="note" id="note" class="form-control form-control-lg" placeholder="Write Your Note Here..." rows="6" required></textarea>
                    </div>
                    <div class="form-group">
                        <!-- Cambia el tipo de botón a "button" -->
                        <button id="addNoteBtn" class="btn btn-success btn-block btn-lg">Add Note</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal para editar una nota -->
<div id="editNoteModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-light">Edit Note</h4>
                <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <!-- Formulario para editar una nota -->
                <form action="update_note.php" method="post" id="edit-note-form" class="px-3">
                    <input type="hidden" name="note_id" id="edit_note_id" value="">
                    <div class="form-group">
                        <label for="edit_title">Title</label>
                        <input type="text" name="edit_title" id="edit_title" class="form-control form-control-lg" placeholder="Enter Title" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_note">Note</label>
                        <textarea name="edit_note" id="edit_note" class="form-control form-control-lg" placeholder="Write Your Note Here..." rows="6" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="editNote" id="editNoteBtn" class="btn btn-info btn-block btn-lg">Update Note</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-2.0.7/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@8/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<script type="text/javascript">
    $(document).ready(function(){
        $("table").DataTable();

        //Add New Note Ajax Request
        $("#addNoteBtn").click(function(e){
            if($("#add-note-form")[0].checkValidity()){
                e.preventDefault();

                $("#addNoteBtn").val('Please Wait...');

                $.ajax({
                    url: 'assets/php/process.php',
                    method: 'post',
                    data: $("#add-note-form").serialize()+'&action=add_note',
                    success:function(response){
                        console.log(response);
                        $("#addNoteBtn").val("Add Note");
                        $("#addNoteModal").modal('hide');
                        // Mostrar la notificación con SweetAlert2
                        Swal.fire({
                            icon: 'success',
                            title: 'Note added successfully!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                    
                });
            }
        });

        //Display All Note of an user
        
    });
</script>


<script>
// JavaScript para abrir el modal de agregar nota cuando se hace clic en el botón
$(document).ready(function(){
    $('#openAddNoteModalBtn').click(function(){
        $('#addNoteModal').modal('show');
    });

    // AJAX para enviar el formulario al hacer clic en el botón "Add Note" dentro del modal
    // $('#addNoteBtn').click(function(e){
    //     if($("#add-note-form")[0].checkValidity()){
    //         e.preventDefault();
    //         $("#addNoteBtn").val('Please Wait...');

    //         $.ajax({
    //             url: 'assets/php/process.php',
    //             method: 'post',
    //             data: $("#add-note-form").serialize()+'&action=add_note',
    //             success:function(response){
                    
    //             }
    //         });
    //     }
    // });

    // JavaScript para abrir el modal de editar nota y cargar los datos en el formulario
    $('.editBtn').click(function(){
        $('#editNoteModal').modal('show');
        
        // Obtener los datos de la nota actual
        var title = $(this).closest('tr').find('td:eq(1)').text();
        var note = $(this).closest('tr').find('td:eq(2)').text();
        var noteId = $(this).closest('tr').find('td:eq(0)').text();
        
        // Llenar el formulario de edición con los datos de la nota actual
        $('#edit_title').val(title);
        $('#edit_note').val(note);
        $('#edit_note_id').val(noteId);
    });

    function displayAllNotes(){
            $.ajax({
                url: 'assets/php/process.php',
                method: 'post',
                data: { action: 'display_notes' },
                success:function(response){
                    console.log(response);
                }
            });
        }

});

</script>


</body>
</html>
