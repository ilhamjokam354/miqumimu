<div class="container-fluid">
  <div class="row">
      <div class="col-md-6"> 
        <button class="btn btn-sm btn-success mb-3" data-toggle="modal" data-target="#mDataGallery"><i class="fas fa-plus fa-sm"></i> Tambah Lainya</button>

      </div>
      <div class="col-md-6"> 
        <?php echo form_open('mmadmins/data_lainya/search') ?>
                <div class="input-group">
                  <input type="text" name="keyword" required class="form-control bg-light border-0 small" placeholder="Cari... ex: (judul produk, harga)" aria-label="Search" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                      <i class="fas fa-search fa-sm"></i> 
                    </button>
                  </div>
                </div>
          <?php echo form_close() ?>

      </div>
    </div>

    <table class="table table-bordered table-responsive-sm table-hover">
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Judul Produk</th>
            <th>Pesan Order WA</th>
            <th>Text Discount</th>
            
            <th>Rating</th>
            <th>Harga Asli</th>
            <th>Harga Potong</th>
            
            <th colspan="2" class="text-center">Aksi</th>
        </tr>
        <?php $no=1; foreach ($lainya as $key):?>
        <tr>
            <td><?php echo $no++?></td>
            <td><img src="<?= base_url()?>uploads/produk/lainya/<?php echo $key->gambar?>" width="200" height="100" alt="Gambar Produk"></td>
            <td><?php echo $key->judul_produk?></td>
            <td><?php echo $key->pesan_order_wa?></td>
            <td><?php echo substr($key->text_discount,0,2);?>%</td>
            
            <td><?php echo $key->rating?></td>
            <td><?php echo $key->harga_asli?></td>
            <td><?php echo $key->harga_potong?></td>
            <td onclick="return confirm('Apakah Anda Yakin Ingin Mengubah!')"><?php echo anchor('mmadmins/data_lainya/edit/'.$key->id_lainya, '<div class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="Update"> <i class="fa fa-edit" ></i></div>')?></td>
            <td onclick="return confirm('Apakah Anda Yakin Ingin Menghapus!')"><?php echo anchor('mmadmins/data_lainya/hapus/'.$key->id_lainya, '<div class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash"></i> </div>')?></td>
        </tr>
        <?php endforeach?>
    </table>

</div>

<!-- Modal -->
<div class="modal fade" id="mDataGallery" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Lainya</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'mmadmins/data_lainya/tambahData'?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="judul_produk">Judul Produk</label>
                <input type="text" name="judul_produk" id="judul_produk" autofocus required class="form-control" placeholder="Masukan Judul Produk"> 
            </div>
            
            <div class="form-group">
                <label for="pesan_order_wa">Pesan Order WA</label>
                <input type="text" name="pesan_order_wa" id="pesan_order_wa" autofocus required class="form-control" placeholder="Masukan Pesan Order WA"> 
            </div>
            <div class="form-group">
                <label for="text_discount">Text Discount</label>
                <input type="number" name="text_discount" id="text_discount" autofocus disabled class="form-control" placeholder="Otomatis Terisi Setelah Memasukan Harga Asli dan Potong"> 
            </div>
            
            <div class="form-group">
                <label for="rating">Rating</label>
                <input type="number" name="rating" id="rating" autofocus  class="form-control" min="1" max="5" placeholder="Masukan Angka MAX 5"> 
            </div>
            <div class="form-group">
                <label for="harga_asli">Harga Asli</label>
                <input type="number" name="harga_asli" id="harga_asli" autofocus required class="form-control" placeholder="Masukan Harga Produk (Angka)"> 
            </div>
            <div class="form-group">
                <label for="harga_potong">Harga Potong</label>
                <input type="number" name="harga_potong" id="harga_potong" autofocus  class="form-control" placeholder="Masukan Harga Discount Bila Ada (Angka)"> 
            </div>

            <div class="form-group">
                <label for="gambar">Gambar (Usahakan Ukuran 300 x 300)</label><br>
                <input type="file" name="gambar" id="gambar" autofocus required > 
            </div>

            <div class="modal-footer">
        
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>