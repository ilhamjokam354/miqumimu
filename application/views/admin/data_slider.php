<div class="container-fluid">
  <div class="row">
      <div class="col-md-6"> 
        <button class="btn btn-sm btn-success mb-3" data-toggle="modal" data-target="#mDataGallery"><i class="fas fa-plus fa-sm"></i> Tambah Slider</button>

      </div>
      <div class="col-md-6"> 
        <?php echo form_open('mmadmins/data_slider/search') ?>
                <div class="input-group">
                  <input type="text" name="keyword" required class="form-control bg-light border-0 small" placeholder="Cari... ex: (judul, deskripsi)" aria-label="Search" aria-describedby="basic-addon2">
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
            <th>Text Discount 1</th>
            <th>Text Discount 2</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            
            <th colspan="2" class="text-center">Aksi</th>
        </tr>
        <?php $no=1; foreach ($slider as $key):?>
        <tr>
            <td><?php echo $no++?></td>
            <td><img src="<?= base_url()?>uploads/slider/<?php echo $key->gambar_slider?>" width="200" height="100" alt="Gambar Slider"></td>
            <td><?php echo $key->text_discount_1?></td>
            <td><?php echo $key->text_discount_2?></td>
            <td><?php echo $key->judul?></td>
            <td><?php echo $key->description?></td>
            <td onclick="return confirm('Apakah Anda Yakin Ingin Mengubah!')"><?php echo anchor('mmadmins/data_slider/edit/'.$key->id_slider, '<div class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="Update"> <i class="fa fa-edit" ></i></div>')?></td>
            <td onclick="return confirm('Apakah Anda Yakin Ingin Menghapus!')"><?php echo anchor('mmadmins/data_slider/hapus/'.$key->id_slider, '<div class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash"></i> </div>')?></td>
        </tr>
        <?php endforeach?>
    </table>

</div>

<!-- Modal -->
<div class="modal fade" id="mDataGallery" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Slider</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'mmadmins/data_slider/tambahData'?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" id="judul" autofocus required class="form-control" placeholder="Masukan Judul"> 
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <input type="text" name="description" id="description" autofocus  class="form-control" placeholder="Masukan Deskripsi (Optional)"> 
            </div>
            <div class="form-group">
                <label for="tdiscount1">Text Discount 1</label>
                <input type="text" name="tdiscount1" id="tdiscount1" autofocus  class="form-control" placeholder="Masukan Text Discount (Optional)"> 
            </div>
            <div class="form-group">
                <label for="tdiscount2">Text Discount 2</label>
                <input type="text" name="tdiscount2" id="tdiscount2" autofocus  class="form-control" placeholder="Masukan Text Discount (Optional)"> 
            </div>

            <div class="form-group">
                <label for="gambar">Gambar (Usahakan Ukuran 770 x 950 pixels)</label><br>
                <input type="file" name="gambar" id="gambar" autofocus required  > 
            </div>

            <div class="modal-footer">
        
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>