<!-- Encabezado y otros elementos -->
<?php require_once 'assets/php/header.php'; ?>


<!-- Estilos CSS -->
<style>
    /* Agrega tus estilos aquí */
    /* Estilos CSS */
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa; /* Cambio de color de fondo */
}

.container {
    margin-top: 20px;
}

.card-header {
    background-color: #007bff;
    color: #fff;
}

/* Estilos para la tabla */
.table {
    width: 100%;
    border-collapse: collapse;
    border-radius: 8px;
    overflow: hidden;
}

.table th,
.table td {
    padding: 10px;
    vertical-align: middle;
}

.table thead {
    background-color: #007bff;
    color: #fff;
}

.table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

/* Estilos para los botones */
.btn {
    padding: 8px 16px;
    border-radius: 4px;
}

.btn-info {
    background-color: #17a2b8;
    border-color: #17a2b8;
    color: #fff;
}

.btn-info:hover {
    background-color: #138496;
    border-color: #117a8b;
}

.btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
    color: #fff;
}

.btn-danger:hover {
    background-color: #c82333;
    border-color: #bd2130;
}

.btn-success {
    background-color: #28a745;
    border-color: #28a745;
    color: #fff;
}

.btn-success:hover {
    background-color: #218838;
    border-color: #1e7e34;
}

/* Estilos para el modal */
.modal-content {
    border-radius: 8px;
}

.modal-header {
    border-bottom: 1px solid #dee2e6;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
    background-color: #007bff;
    color: #fff;
}

.modal-title {
    font-weight: bold;
}

.modal-body,
.modal-footer {
    border-top: 1px solid #dee2e6;
}

.modal-footer {
    border-bottom-left-radius: 8px;
    border-bottom-right-radius: 8px;
}

/* Estilos para los botones dentro de la tabla */
.btn-group {
    display: flex;
    justify-content: space-around;
}


    /* Agrega más estilos según lo necesites */
</style>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <!-- Mensaje de alerta -->
            <?php if ($verified == 'Non Verified!'): ?>
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
                <table class="table table-striped table-sm text-center" id="noteTable">
                    <!-- Cabecera de la tabla -->
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>nombre</th>
                            <th>descripcion</th>
                            <th>result_vulnerability</th>

                            <th>result_risk</th>
                            <th>result_functionality</th>
                            <th>id_v1</th>
                            <th>id_v2</th>
                            <th>id_v3</th>
                            <th>id_v4</th>
                            <th>id_v5</th>
                            <th>id_v6</th>
                            <th>id_v7</th>
                            <th>id_v8</th>
                            <th>id_v9</th>
                            <th>id_v10</th>
                            <th>id_v11</th>
                            <th>id_v12</th>
                            <th>id_v13</th>
                            <th>id_v14</th>
                            <th>id_v15</th>
                            <th>id_v16</th>
                            <th>id_v17</th>
                            <th>id_v18</th>
                            <th>id_v19</th>
                            <th>id_v20</th>
                            <th>id_v21</th>

                            <th>coordenadas</th>
                            <th>created_at</th>
                            <th>updated_at</th>


                            <th>Action</th>
                        </tr>
                    </thead>
                    <!-- Cuerpo de la tabla (se generará dinámicamente con jQuery) -->
                    <tbody>

                    

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
    $(document).ready(function() {
        $("table").DataTable();

        // Add New Note Ajax Request
        $("#addNoteBtn").click(function(e) {
            if ($("#add-note-form")[0].checkValidity()) {
                e.preventDefault();

                $("#addNoteBtn").val('Please Wait...');

                $.ajax({
                    url: 'assets/php/process.php',
                    method: 'post',
                    data: $("#add-note-form").serialize() + '&action=add_note',
                    success: function(response) {
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
                        displayAllNotes(); // Refresh the notes display
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX error: ", status, error);
                    }
                });
            }
        });

        
     // Display All Notes of a user
function displayAllNotes() {
    $.ajax({
        url: 'assets/php/process.php',
        method: 'post',
        data: { action: 'display_notes' },
        success: function(response) {
            console.log("Response from server:", response);
            try {
                var jsonResponse = JSON.parse(response);
                if (jsonResponse.debug) {
                    console.log("Debug messages:", jsonResponse.debug);
                }
                if (jsonResponse.notes) {
                    console.log("User notes:", jsonResponse.notes);
                    let notesHtml = '';
                    $.each(jsonResponse.notes, function(index, note) {
                        notesHtml += '<tr>';
                        notesHtml += '<td>' + (index + 1) + '</td>';
                        notesHtml += '<td>' + note.nombre + '</td>';
                        notesHtml += '<td>' + note.descripcion + '</td>';
                        notesHtml += '<td>' + note.result_vulnerability + '</td>';
                        notesHtml += '<td>' + note.result_risk + '</td>';
                        notesHtml += '<td>' + note.result_functionality + '</td>';
                        notesHtml += '<td>' + note.id_v1 + '</td>';
                        notesHtml += '<td>' + note.id_v2 + '</td>';
                        notesHtml += '<td>' + note.id_v3 + '</td>';
                        notesHtml += '<td>' + note.id_v4 + '</td>';
                        notesHtml += '<td>' + note.id_v5 + '</td>';
                        notesHtml += '<td>' + note.id_v6 + '</td>';
                        notesHtml += '<td>' + note.id_v7 + '</td>';
                        notesHtml += '<td>' + note.id_v8 + '</td>';
                        notesHtml += '<td>' + note.id_v9 + '</td>';
                        notesHtml += '<td>' + note.id_v10 + '</td>';
                        notesHtml += '<td>' + note.id_v11 + '</td>';
                        notesHtml += '<td>' + note.id_v12 + '</td>';
                        notesHtml += '<td>' + note.id_v13 + '</td>';
                        notesHtml += '<td>' + note.id_v14 + '</td>';
                        notesHtml += '<td>' + note.id_v15 + '</td>';
                        notesHtml += '<td>' + note.id_v16 + '</td>';
                        notesHtml += '<td>' + note.id_v17 + '</td>';
                        notesHtml += '<td>' + note.id_v18 + '</td>';
                        notesHtml += '<td>' + note.id_v19 + '</td>';
                        notesHtml += '<td>' + note.id_v20 + '</td>';
                        notesHtml += '<td>' + note.id_v21 + '</td>';
                        notesHtml += '<td>' + note.coordenadas + '</td>';
                        notesHtml += '<td>' + note.created_at + '</td>';
                        notesHtml += '<td>' + note.updated_at + '</td>';
                        notesHtml += '<td>';
                        notesHtml += '<div class="btn-group" role="group">';
                        notesHtml += '<button type="button" class="btn btn-success infoBtn" title="View Details"><i class="fas fa-info-circle fa-lg"></i></button>';
                        notesHtml += '<button type="button" class="btn btn-primary editBtn" data-id="' + note.id + '" title="Edit Note"><i class="fas fa-edit fa-lg"></i></button>';
                        notesHtml += '<button type="button" class="btn btn-danger deleteBtn" title="Delete Note"><i class="fas fa-trash-alt fa-lg"></i></button>';
                        notesHtml += '</div>';
                        notesHtml += '</td>';
                        notesHtml += '</tr>';
                    });
                    $('#showNote tbody').html(notesHtml);
                    
                } else {
                    console.log("No notes found.");
                    $('#showNote tbody').html('<tr><td colspan="4">No notes found</td></tr>');
                }
            } catch (e) {
                console.error("Error parsing JSON response:", e);
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX error: ", status, error);
        }
    });
}


        // JavaScript para abrir el modal de agregar nota cuando se hace clic en el botón
        $('#openAddNoteModalBtn').click(function() {
            $('#addNoteModal').modal('show');
        });

        // // JavaScript para abrir el modal de editar nota y cargar los datos en el formulario
        // $(document).on('click', '.editBtn', function() {
        //     $('#editNoteModal').modal('show');
        //     // Obtener los datos de la nota actual
        //     var title = $(this).closest('tr').find('td:eq(1)').text();
        //     var note = $(this).closest('tr').find('td:eq(2)').text();
        //     var noteId = $(this).closest('tr').find('td:eq(0)').text();
        //     // Llenar el formulario de edición con los datos de la nota actual
        //     $('#edit_title').val(title);
        //     $('#edit_note').val(note);
        //     $('#edit_note_id').val(noteId);
        // });

        //EDIT NOTE OF AN USER AJAX REQUEST

        $(document).on('click', '.editBtn', function(e) {
    e.preventDefault();
    $('#editNoteModal').modal('show');

    var edit_id = $(this).data('id'); // Obtiene el ID del atributo data-id
    //console.log('ID del registro a editar:', edit_id); // Imprime el ID en la consola para verificar

    // Aquí puedes cargar los datos de la nota en el formulario de edición usando edit_id
    $.ajax({
        url: 'assets/php/process.php',
        method: 'post',
        data: { action: 'get_note', id: edit_id },
        success: function(response) {
            


            //console.log(data);
            // Suponiendo que el servidor devuelve la nota como un objeto JSON
            var note = JSON.parse(response);
            $('#edit_title').val(note.nombre);
            $('#edit_note').val(note.descripcion);
            $('#edit_note_id').val(note.id);
        },
        error: function(xhr, status, error) {
            console.error("AJAX error: ", status, error);
        }
    });
});

//Update Note of An User Ajax Request
$("#editNoteBtn").click(function(e){
    if($("#edit-note-form")[0].checkValidity()){
        e.preventDefault();


        $.ajax({
            url: 'assets/php/process.php',
            method: 'post',
            data: $("#edit-note-form").serialize()+"&action=update_note",
            success:function(response){
                console.log(response);
            }
        });
    }
})



        // Inicializar la visualización de todas las notas
        displayAllNotes();
    });
</script>

</body>
</html>
