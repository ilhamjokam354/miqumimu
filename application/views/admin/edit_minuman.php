<div class="container-fluid">
    <h3><i class="fas fa-edit"></i> Edit Minuman</h3>
    <?php foreach ($minuman as $key):?>
    <form action="<?php echo base_url().'mmadmins/data_minuman/update'?>" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="judul_produk">Judul Produk</label>
        <input type="text" name="judul_produk" id="judul_produk" autofocus required class="form-control" value="<?= $key->judul_produk?>"> 
        <input type="hidden" name="id" value="<?= $key->id_minuman?>">
    </div>
    
    <div class="form-group">
        <label for="pesan_order_wa">Pesan Order WA</label>
        <input type="text" name="pesan_order_wa" id="pesan_order_wa" autofocus required class="form-control" value="<?= $key->pesan_order_wa?>"> 
    </div>
    <div class="form-group">
        <label for="text_discount">Text Discount</label>
        <input type="number" name="text_discount" id="text_discount" autofocus disabled class="form-control" value="<?= $key->text_discount?>"> 
    </div>
    
    <div class="form-group">
        <label for="rating">Rating</label>
        <input type="number" name="rating" id="rating" autofocus  class="form-control" min="1" max="5" value="<?= $key->rating?>"> 
    </div>
    <div class="form-group">
        <label for="harga_asli">Harga Asli</label>
        <input type="text" name="harga_asli" id="harga_asli" autofocus required class="form-control" value="<?= $key->harga_asli?>"> 
    </div>
    <div class="form-group">
        <label for="harga_potong">Harga Potong</label>
        <input type="text" name="harga_potong" id="harga_potong" autofocus  class="form-control" value="<?= $key->harga_potong?>"> 
    </div>

    <div class="form-group">
        <label for="gambar">Gambar (Usahakan Ukuran 300 x 300)</label><br>
        <input type="file" name="gambar" id="gambar" autofocus > 
    </div>

        <button type="submit" class="btn btn-sm btn-primary mt-3">Simpan</button>
    </form>
    <?php endforeach?>
</div>