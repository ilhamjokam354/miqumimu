<div class="container-fluid">
    <h3><i class="fas fa-edit"></i> Edit Slider</h3>
    <?php foreach ($slider as $key):?>
    <form action="<?php echo base_url().'mmadmins/data_slider/update'?>" method="post" enctype="multipart/form-data">
    
        <div class="form-group">
            <label for="description">Deskripsi Gallery</label>
            <input type="hidden" name="id" value="<?php echo $key->id_slider?>" >
            
        </div>
        <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" id="judul" value="<?= $key->judul?>" autofocus required class="form-control"> 
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <input type="text" name="description" id="description" value="<?= $key->description?>" autofocus  class="form-control"> 
        </div>
        <div class="form-group">
            <label for="tdiscount1">Text Discount 1</label>
            <input type="text" name="tdiscount1" id="tdiscount1" value="<?= $key->text_discount_1?>" autofocus  class="form-control"> 
        </div>
        <div class="form-group">
            <label for="tdiscount2">Text Discount 2</label>
            <input type="text" name="tdiscount2" id="tdiscount2" value="<?= $key->text_discount_2?>" autofocus  class="form-control"> 
        </div>


        <div class="form-group">
                <label for="gambar">Gambar (Pastikan Gambar Ukuran 770 x 950)</label><br>
                <input type="file" name="gambar" id="gambar" autofocus  > 
        </div>

        <button type="submit" class="btn btn-sm btn-primary mt-3">Simpan</button>
    </form>
    <?php endforeach?>
</div>