<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Karyawan</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
        <?php
          include_once "../database/database.php";

          if(isset($_POST['button_simpan'])){
            $nik = $_POST['nik'];
            $nama_karyawan = $_POST['nama_karyawan'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $status_menikah = $_POST['status_menikah'];
  
            // $insertSQL = "INSERT INTO karyawan VALUES (NULL,'".$nik."','".$nama_karyawan."','".$jenis_kelamin."','".$status_menikah."')";
            $insertSQL = "INSERT INTO karyawan VALUES (NULL, ?, ?, ?, ?)";

            $database = new Database();
            $connection = $database->getConnection();
            $statment = $connection->prepare($insertSQL);
            $statment->bindParam(1, $nik);
            $statment->bindParam(2, $nama_karyawan);
            $statment->bindParam(3, $jenis_kelamin);
            $statment->bindParam(4, $status_menikah);
            $statment->execute();

            header("Location: ?page=karyawan");
          }
        ?>
      </div>
      <div>
        <form action="" method="post">
          <div class="mb-3">
            <label for="nik" class="form-label">Nomor Induk Karyawan</label>
            <input type="text" class="form-control" id="nik" name="nik">
          </div>
          <div class="mb-3">
            <label for="nama_karyawan" class="form-label">Nama karyawan</label>
            <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan">
          </div>
          <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
              <div class="form-check">
                  <input class="form-check-input" type="radio" value="Laki-laki" name="jenis_kelamin" id="jenis_kelamin"checked>
                  <label class="form-check-label" for="jenis_kelamin">
                    Laki-laki
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" value="Perempuan" name="jenis_kelamin" id="jenis_kelamin">
                  <label class="form-check-label" for="jenis_kelamin">
                    Perempuan
                  </label>
              </div>
            </div>
          <div class="mb-3">
            <label for="status_menikah" class="form-label">Status Menikah</label>
            <input type="text" class="form-control" id="status_menikah" name="status_menikah">
          </div>
          <button class="btn btn-success" type="submit" name="button_simpan"><span data-feather="database"></span> Simpan</button>
        </form>
      </div>
</main>