<div class="p-3">
    <form id="add_subcomment_<?= $data['id_comment'] ?>" class="comment">
        <input type="hidden" name="idparent" value="<?= $data['id_comment'] ?>">
        <input type="hidden" name="idpost" value="<?= $data['idpost_comment'] ?>">
        <div class="row">
            <div class="form-group col-md-6">
                <label for="name">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama">
            </div>
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <label for="message">Komentar</label>
            <textarea name="message" id="message" cols="30" rows="3" class="form-control" placeholder="Tiggalkan Komentar Anda..."></textarea>
        </div>
        <div class="form-group mb-0">
            <button type="button" class="btn btn-sm btn-nm btn-send content_center btn-subcomment" data-comment-id="<?= $data['id_comment'] ?>">
                <span>
                    <div>Kirim Komentar</div>
                    <i class="fas fa-angle-double-right"></i>
                </span>
            </button>
        </div>
    </form>
</div>