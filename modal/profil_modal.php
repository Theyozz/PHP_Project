<div class="modal fade" id="profilModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit profil</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="change_profil_wait.php" method="post" class="text-center" enctype="multipart/form-data">
                    <div class="mt-3 ">
                        <input type="file" class="form-control" name="img">
                    </div>
                    <div class="mt-3 ">
                        <input type="text" class="form-control" name="pseudo" placeholder="Pseudo">
                    </div>
                    <div class="mt-3 ">
                        <input type="text" class="form-control" name="mail" placeholder="Mail">
                    </div>
                    <div class="mt-3">
                        <input type="submit" class="btn btn-danger w-50 shadow-sm" value="Change">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>