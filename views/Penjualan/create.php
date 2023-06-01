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

            <form role="form" action="<?= base_url; ?>/penjualan/simpanPenjualan" method="POST" enctype="multipart/form-data">

                <div class="card-body">

                    <div class="form-group">

                        <label >Nama Barang</label>

                        <input type="text" class="form-control" placeholder="masukkan nama barang..." name="nama_barang" required>

                    </div>

                    <div class="form-group">

                        <label >Kategori Barang</label>

                        <select class="form-control" name="kategori_nama">

                            <option value="">Pilih Kategori</option>

                            <?php foreach ($data['kategori'] as $row) :?>

                                <option value="<?= $row['nama_kategori']; ?>"><?= $row['nama_kategori']; ?></option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <div class="form-group">

                        <label >Jumlah Terjual</label>

                        <input type="number" class="form-control" placeholder="masukkan julah terjual..." name="jumlah_terjual" required>

                    </div>

                    <div class="form-group">

                        <label >Harga Satuan</label>

                        <input type="number" class="form-control" placeholder="masukkan harga satuan..." name="harga_satuan" required>

                    </div>

                </div>

                <div class="card-footer">

                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>

            </form>

        </div>

    </section>

</div>
