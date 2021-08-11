<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Perpustakaan SMA Negeri 13 Banjarmasin</title>
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?= asset('frontend/css/styles.css') ?>" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#Buku_Populer">Buku Populer</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">Alamat</a></li>
                        <li class="nav-item"><a class="nav-link" href="#team">Info Pustakawan</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Selamat Datang</div>
                <div class="masthead-heading text-uppercase">Perpustakan SMA Negeri 13 Banjarmasin</div>
                <a class="btn btn-warning btn-xl text-uppercase " href="<?= site_url('login') ?>">Login</a>
            </div>
        </header>
        <?php if($buku): ?>
        <!-- Buku Populer Grid-->
        <section class="page-section bg-light" id="Buku_Populer">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Buku Populer</h2>
                    <h3 class="section-subheading text-muted">Koleksi buku yang sering dipinjam oleh siswa</h3>
                </div>
                <div class="row">
                    <?php foreach($buku as $item): ?>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="Buku_Populer-item">
                            <a class="Buku_Populer-link" data-bs-toggle="modal" href="#<?= 'modal-' . $item['id_buku'] ?>">
                                <div class="Buku_Populer-hover">
                                    <div class="Buku_Populer-hover-content"><i class="fas fa-eye fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="<?= $item['foto'] ? upload($item['foto']) : asset('img/book.png'); ?>" alt="<?= $item['judul'] ?>" />
                            </a>
                            <div class="Buku_Populer-caption">
                                <div class="Buku_Populer-caption-heading"><?= $item['judul'] ?></div>
                                <div class="Buku_Populer-caption-subheading text-muted"><?= $item['kategori'] ?: '-' ?></div>
                            </div>
                        </div>

                        <!-- Portfolio item 1 modal popup-->
                        <div class="Buku_Populer-modal modal fade" id="<?= 'modal-' . $item['id_buku'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="close-modal" data-bs-dismiss="modal"><img src="<?= asset('frontend/assets/img/close-icon.svg') ?>" alt="Close modal" /></div>
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-8">
                                                <div class="modal-body">
                                                    <!-- Project details-->
                                                    <h2 class="text-uppercase"><?= $item['judul'] ?></h2>
                                                    <p class="item-intro text-muted"><?= $item['kategori'] ?: '-' ?></p>
                                                    <img class="img-fluid d-block mx-auto" src="<?= $item['foto'] ? upload($item['foto']) : asset('img/book.png'); ?>" alt="<?= $item['judul'] ?>" />
                                                    <!-- <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p> -->
                                                    <ul class="list-inline">
                                                        <li>
                                                            <strong>Penulis:</strong>
                                                            <?= $item['pengarang'] ?: '-' ?>
                                                        </li>
                                                        <li>
                                                            <strong>Penerbit:</strong>
                                                            <?= $item['penerbit'] ?: '-' ?>
                                                        </li>
                                                        <li>
                                                            <strong>Kategori:</strong>
                                                            <?= $item['kategori'] ?: '-' ?>
                                                        </li>
                                                        <li>
                                                            <strong>Klasifikasi:</strong>
                                                            <?= $item['klasifikasi'] ?: '-' ?>
                                                        </li>
                                                    </ul>
                                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                                        <i class="fas fa-times me-1"></i>
                                                        Close Project
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>
        <!-- About-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Alamat</h2>
                    <h3 class="section-subheading text-muted">Alamat perpustakaan SMA Negeri 13 Banjarmasin</h3>
                </div>
                <ul class="timeline">
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="<?= asset('frontend/assets/img/about/1.jpg') ?>" alt="Perpustakaan" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                
                            </div>
                            <br>
                            <div class="timeline-body"><p class="text-muted">Jl. Setia No.24-B, RT.37, Pemurus Dalam, Kec. Banjarmasin Sel., Kota Banjarmasin, Kalimantan Selatan 70248</p></div>
                        </div>
                    </li>
                    
                    <li class="timeline-inverted">
                        <a target="_blank" href="https://www.google.com/maps/place/State+Senior+High+School+13+Banjarmasin/@-3.3610056,114.6189371,17z/data=!3m1!4b1!4m5!3m4!1s0x2de426d3117bbaa9:0xa2f2d9978adcd808!8m2!3d-3.3610056!4d114.6211258">
                        <div class="timeline-image">
                            <h2>
                                <br>Google Maps<br/>
                            </h2>
                        </div>
                        </a>
                    </li>
                </ul>
            </div>
        </section>
        <!-- Team-->
        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Info Pustakawan</h2>
                    <h3 class="section-subheading text-muted">Anggota perpustakaan SMA Negeri 13 Banjarmasin</h3>
                </div>
                <div class="row">
                    <?php foreach($petugas as $item): ?>
                    <div class="col-md-6">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="<?= $item['foto'] ? upload($item['foto']) : asset('img/avatar.png'); ?>" alt="<?= $item['nama'] ?>" />
                            <h4><?= $item['nama'] ?></h4>
                            <p class="text-muted"><?= $item['jabatan'] ?> Perpustakaan</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p></div>
                </div>
            </div>
        </section>
        <!-- Clients-->
        <div class="py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="https://www.instagram.com/sman13banjarmasin/?hl=en">
                            <img class="img-fluid img-brand d-block mx-auto" src="<?= asset('frontend/assets/img/logos/Instagram.svg') ?>" alt="Sosial Media" />
                        </a> 
                        <br>
                        <div class="text-center">Instagram</div>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="http://www.sman13-bjm.sch.id/">
                            <img class="img-fluid img-brand d-block mx-auto" src="<?= asset('frontend/assets/img/logos/Web.svg') ?>" alt="Sosial Media" />
                        </a> 
                        <br>
                        <div class="text-center">Web</div>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="https://www.facebook.com/groups/194211930725348/">
                            <img class="img-fluid img-brand d-block mx-auto" src="<?= asset('frontend/assets/img/logos/Facebook.svg') ?>" alt="Sosial Media" />
                        </a> 
                        <br>
                        <div class="text-center">Facebook</div>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="https://www.youtube.com/channel/UCGK5Sz_JkussphAWKyQbLrA">
                            <img class="img-fluid img-brand d-block mx-auto" src="<?= asset('frontend/assets/img/logos/Youtube.svg') ?>" alt="Sosial Media" />
                        </a> 
                        <br>
                        <div class="text-center">Youtube</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?= asset('frontend/js/scripts.js') ?>"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
