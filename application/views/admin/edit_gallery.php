<div class="container-fluid">
    <h3><i class="fas fa-edit"></i> Edit Gallery</h3>
    <?php foreach ($gallery as $key):?>
    <form action="<?php echo base_url().'mmadmins/data_gallery/update'?>" method="post" enctype="multipart/form-data">
    
        <div class="form-group">
            <label for="description">Deskripsi Gallery</label>
            <input type="hidden" name="id" value="<?php echo $key->id_gallery?>" >
            <input type="text" name="description" class="form-control" value="<?= $key->description?>" autofocus required>
        </div>

        <div class="form-group">
                <label for="gambar">Gambar (Usahakan ukuran 1080 x 1080)</label><br>
                <input type="file" name="gambar" id="gambar" autofocus > 
        </div>

        <button type="submit" class="btn btn-sm btn-primary mt-3">Simpan</button>
    </form>
    <?php endforeach?>
</div>