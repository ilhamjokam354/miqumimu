<div class="container-fluid">
  <div class="row">
      <div class="col-md-6"> 
        <button class="btn btn-sm btn-success mb-3" data-toggle="modal" data-target="#mDataGallery"><i class="fas fa-plus fa-sm"></i> Tambah Testimoni</button>

      </div>
      <div class="col-md-6"> 
        <?php echo form_open('mmadmins/data_testimoni/search') ?>
                <div class="input-group">
                  <input type="text" name="keyword" required class="form-control bg-light border-0 small" placeholder="Cari... ex: (nama testimoni, kedudukan testimoni)" aria-label="Search" aria-describedby="basic-addon2">
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
            <th>Nama Testimoni</th>
            <th>Kedudukan Testimoni</th>
            <th>Link FB</th>
            <th>Link IG</th>
            
            <th colspan="2" class="text-center">Aksi</th>
        </tr>
        <?php $no=1; foreach ($testimoni as $key):?>
        <tr>
            <td><?php echo $no++?></td>
            <td><img src="<?= base_url()?>uploads/testimoni/<?php echo $key->gambar_testimoni?>" width="200" height="100" alt="Gambar Produk"></td>
            <td><?php echo $key->nama_testimoni?></td>
            <td><?php echo $key->kedudukan_testimoni?></td>
            <td><?php echo $key->link_fb?></td>
            <td><?php echo $key->link_ig?></td>
            
            <td onclick="return confirm('Apakah Anda Yakin Ingin Mengubah!')"><?php echo anchor('mmadmins/data_testimoni/edit/'.$key->id_testimoni, '<div class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="Update"> <i class="fa fa-edit" ></i></div>')?></td>
            <td onclick="return confirm('Apakah Anda Yakin Ingin Menghapus!')"><?php echo anchor('mmadmins/data_testimoni/hapus/'.$key->id_testimoni, '<div class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash"></i> </div>')?></td>
        </tr>
        <?php endforeach?>
    </table>

</div>

<!-- Modal -->
<div class="modal fade" id="mDataGallery" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Testimoni</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'mmadmins/data_testimoni/tambahData'?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama_testimoni">Nama Testimoni</label>
                <input type="text" name="nama_testimoni" id="nama_testimoni" autofocus required class="form-control" placeholder="Masukan Nama Testimoni"> 
            </div>
            <div class="form-group">
                <label for="kedudukan_testimoni">Kedudukan Testimoni</label>
                <input type="text" name="kedudukan_testimoni" id="kedudukan_testimoni" autofocus class="form-control" placeholder="Masukan Kedudukan Testimoni (Optional)"> 
            </div>
            <div class="form-group">
                <label for="pesan_testimoni">Pesan Testimoni</label>
                <input type="text" name="pesan_testimoni" id="pesan_testimoni" autofocus class="form-control" placeholder="Masukan Link IG (Optional)"> 
            </div>
            <div class="form-group">
                <label for="link_fb">Link FB</label>
                <input type="text" name="link_fb" id="link_fb" autofocus  class="form-control"  placeholder="Masukan Link FB (Optional)"> 
            </div>
            <div class="form-group">
                <label for="link_ig">Link IG</label>
                <input type="text" name="link_ig" id="link_ig" autofocus class="form-control" placeholder="Masukan Link IG (Optional)"> 
            </div>

            <div class="form-group">
                <label for="gambar_testimoni">Gambar (Usahakan Ukuran 80 x 80)</label><br>
                <input type="file" name="gambar_testimoni" id="gambar_testimoni" autofocus required > 
            </div>

            <div class="modal-footer">
        
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>