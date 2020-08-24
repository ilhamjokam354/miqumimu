<div class="container-fluid">
    <h3><i class="fas fa-edit"></i> Edit Testimoni</h3>
    <?php foreach ($testimoni as $key):?>
    <form action="<?php echo base_url().'mmadmins/data_testimoni/update'?>" method="post" enctype="multipart/form-data">
    
            <div class="form-group">
                <label for="nama_testimoni">Nama Testimoni</label>
                <input type="hidden" name="id" value="<?= $key->id_testimoni?>">
                <input type="text" name="nama_testimoni" id="nama_testimoni" autofocus required class="form-control" value="<?= $key->nama_testimoni?>"> 
            </div>
            <div class="form-group">
                <label for="kedudukan_testimoni">Kedudukan Testimoni</label>
                <input type="text" name="kedudukan_testimoni" id="kedudukan_testimoni" autofocus class="form-control" value="<?= $key->kedudukan_testimoni?>"> 
            </div>
            <div class="form-group">
                <label for="pesan_testimoni">Pesan Testimoni</label>
                <input type="text" name="pesan_testimoni" id="pesan_testimoni" autofocus class="form-control" placeholder="Masukan Link IG (Optional)"> 
            </div>
            <div class="form-group">
                <label for="link_fb">Link FB</label>
                <input type="text" name="link_fb" id="link_fb" autofocus  class="form-control"  value="<?= $key->link_fb?>"> 
            </div>
            <div class="form-group">
                <label for="link_ig">Link IG</label>
                <input type="text" name="link_ig" id="link_ig" autofocus class="form-control" value="<?= $key->link_ig?>"> 
            </div>


        <div class="form-group">
                <label for="gambar_testimoni">Gambar (Usahakan Ukuran 80 x 80)</label><br>
                <input type="file" name="gambar_testimoni" id="gambar_testimoni" autofocus > 
        </div>

        <button type="submit" class="btn btn-sm btn-primary mt-3">Simpan</button>
    </form>
    <?php endforeach?>
</div>