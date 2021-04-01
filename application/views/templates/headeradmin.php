<!doctype html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul ?></title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css');?>" >
  </head>
  <body>

  
<div class="nav-container">
        <div class="wrapper">
            <nav>
                <div class="logo">
                    E-Library
                </div>

                <ul class="nav-items">
                    <li>
                        <a href="<?= base_url('home'); ?>">Home</a>
                    </li>

                    <li>
                        <a href="<?= base_url('bukukamu/indexadmin'); ?>">Admin Page</a>
                    </li>

                    <li>
                        <a href="<?= base_url('bukutersedia'); ?>">Buku Tersedia</a>
                    </li>

                    <li>
                        <a href="<?= base_url('about'); ?>">About</a>
                    </li>
                <div class="row">
                	<div class="col-md-6">
                		<li>
                			<a href="<?= base_url('login/keluar')?>?"onclick="return confirm('Yakin?');">Keluar</a>
                		</li>
                	</div>
                </div>
                </ul>
            </nav>
        </div>
    </div>