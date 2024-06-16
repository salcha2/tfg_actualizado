<?php
    require_once 'assets/php/admin-header.php';
?>
<div class="row">
<div class="col-lg-12">
            <div class="card border-secondary mt-4"> <!-- Agregué la clase "mt-4" para añadir un margen superior -->
                <div class="card-header bg-secondary text-white">
                    <h4 class="m-0">Total Buildings By All Users</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive" id="showAllNotes">
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
            fetchAllNotes();

        function fetchAllNotes(){
            $.ajax({
                url: 'assets/php/admin-action.php',
                method: 'post',
                data: { action: 'fetchAllNotes' },
                success:function(response){
                    $("#showAllNotes").html(response); // Corrección: Agregar "#" para seleccionar por ID
                    $("table").DataTable({
                        order: [0, 'desc']
                    });
                }
            });
        }
        });
    </script>
</body>
</html>
