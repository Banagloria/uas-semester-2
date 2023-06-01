<div class="content-wrapper">

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1><?= $data['title']; ?></h1>

                </div>

            </div>

        </div>

    </section>

    <section class="content">

        <div class="card card-primary">

            <div class="card-header">

                <h3 class="card-title"><?= $data['title']; ?></h3>

            </div>

            <form role="form" action="<?= base_url; ?>/penjualan/updatePenjualan" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $data['penjualan']['id']; ?>">

                <div class="card-body">

                    <div class="form-group">

                        <label >Nama Barang</label>

                        <input type="text" class="form-control" placeholder="masukkan nama barang..." name="nama_barang" value="<?= $data['penjualan']['nama_barang'];?>">

                    </div>

                    <div class="form-group">

                        <label >Kategori Barang</label>

                        <select class="form-control" name="kategori_nama">

                            <option value="">Pilih Kategori</option>

                            <?php foreach ($data['kategori'] as $row) :?>

                                <option value="<?= $row['nama_kategori']; ?>" <?php if($data['penjualan']['kategori_nama'] == $row['nama_kategori']) { echo "selected"; } ?>><?= $row['nama_kategori']; ?></option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <div class="form-group">

                        <label >Jumlah Terjual</label>

                        <input type="number" class="form-control" placeholder="masukkan julah terjual..." name="jumlah_terjual" value="<?= $data['penjualan']['jumlah_terjual'];?>">

                    </div>

                    <div class="form-group">

                        <label >Harga Satuan</label>

                        <input type="number" class="form-control" placeholder="masukkan harga satuan..." name="harga_satuan" value="<?= $data['penjualan']['harga_satuan'];?>">

                    </div>

                </div>

                <div class="card-footer">

                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>

            </form>

        </div>

    </section>

</div>