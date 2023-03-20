<div style="width: 50px;" class="bg-dark fixed-bottom rounded-5 m-3">
        <button type="" class="bg-dark rounded-4" data-bs-toggle="modal" data-bs-target="#footermodal">
            <img width="50px" class="p-2" src="../img/plume-doie.png" alt="">
        </button>
    </div>
    <div class="modal fade" id="footermodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">What's up ?</h1>
                </div>
                <div class="modal-body">
                    <form action="../post_wait.php" method="post">
                        <textarea type="textarea" style="height: 150px;" class="form-control" name="content" placeholder="Write..."></textarea>
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary w-100 mt-4" value="Post">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>