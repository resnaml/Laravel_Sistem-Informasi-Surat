        @extends('layouts.main')

        @section('container')
            <!-- Custom styles for this template -->
            
        <body class="bg-light">
        <main>

        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner">
                
            <div class="carousel-item active">
                <img class="container" src="/img/Kurangi_Risiko_Penyebaran,_BP2MI_Turut_Serta_dalam_Penanganan_dan_Pengendalian_Covid-19_IMG-20200914-WA0028.jpg" height="500" weight="500">
                <div class="container">
                        <div class="carousel-caption text-start">
                        <h1>BP2MI Pusat</h1>
                        <p class="opacity-75">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore, error.</p>
                        </div>
                </div>
            </div>

            <div class="carousel-item">
                <img class="container" src="/img/Beri_Pelayanan_Prima,_BP3MI_Jabar_Laksanakan_Verifikasi_Dokumen_CPMI_G_to_G_Korea_Selatan_WhatsApp_Image_2023-01-16_at_07.26.18_-_UPT_BP2MI_JABAR.jpeg" height="500" weight="500">
                <div class="container">
                <div class="carousel-caption">
                    <h1>BP3MI Bandung</h1>
                        <p class="opacity-75">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium quo optio ipsam nostrum quasi ipsum quibusdam nobis quas enim distinctio.</p>
                        </div>
                </div>
                </div>
                
                <div class="carousel-item">
                    <img class="container" src="/img/kepala-badan-perlindungan-pekerja-migran-indonesia-bp2mi-benny-rhamdani_220606231725-509.jpg" height="500" weight="500">
                    <div class="container">
                    <div class="carousel-caption text-end">
                        <h1>Kepala BP2MI</h1>
                            <p class="opacity-75">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Non, libero voluptate hic exercitationem quas, magnam animi obcaecati reiciendis, fuga omnis minima atque tenetur ipsam asperiores.</p>
                            </div>
                    </div>
                    </div>

            </div>
            
        </div>
            
            
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
        </div>
        
        <!-- Marketing messaging and featurettes
        ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->
        
        <div class="container marketing">
        
            <div class="row">
            <div class="col-lg-4">
                
            </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
        
        
            <!-- START THE FEATURETTES -->
        
            <hr class="featurette-divider">
        
            <div class="row featurette ">
            <div class="col-md-7">
                <h2 class="text-uppercase text-center ">Sejarah Pengarsipan</h2>
                <p class="lead font-weight-normal text-center">Pengarsipan adalah sebuah proses dan cara dimana informasi dalam bentuk dokumen disimpan dengan aman dalam jangka waktu tertentu yang ditentukan oleh hukum. Dokumen dapat diarsipkan dalam berbagai format dan di berbagai perangkat. Meskipun suatu dokumen berstatus tidak aktif, namun dokumen itu dapat diaktifkan kembali.</p>
            </div>
            <div class="col-md-5">
                <img src="/img/arsip1.jpg" height="250" weight="380">
            </div>
            </div>
        
            <hr class="featurette-divider">
        
            <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="text-center text-uppercase">Mengapa Pengarsipan itu Penting ?</h2>
                <p class="lead mb-5 text-center">Dengan adanya arsip, diharapkan semua lapisan masyarakat akan lebih memudahkan dalam mengurus dan mengakses berbagai hal ketika berurusan dengan perangkat pemerintahan, dimana arsip memegang peranan penting. Begitu juga bagi instansi/lembaga pemerintahan dan swasta dalam menjalankan kegiatannya, melihat pentingnya arsip dalam seluruh urusan yang berkaitan dengan pengambilan keputusan, sumber informasi dalam rangka administrasi maupun birokrasi.</p>
            </div>
                <div class="col-md-5">
                    <img src="/img/arsip2.jpg" height="260" weight="400">
                </div>
            </div>
        
            <hr class="featurette-divider">
        
            <div class="row featurette">
            <div class="col-md-7">
                <h2 class="text-center text-uppercase">Peran Arsip dalam Kehidupan</h2>
                <p class="lead mb-5 text-center">Dengan adanya arsip, diharapkan semua lapisan masyarakat akan lebih memudahkan dalam mengurus dan mengakses berbagai hal ketika berurusan dengan perangkat pemerintahan, dimana arsip memegang peranan penting. Begitu juga bagi instansi/lembaga pemerintahan dan swasta dalam menjalankan kegiatannya, melihat pentingnya arsip dalam seluruh urusan yang berkaitan dengan kegiatan, rencana, pengambilan keputusan, sumber informasi dalam rangka administrasi maupun birokrasi.</p>
            </div>
                <div class="col-md-5">
                    <img src="/img/arsip3.jpg" height="250" weight="350">
                </div>
            </div>
            <hr class="featurette-divider">
        </div>
        <!-- /.container -->
        
        <!-- FOOTER -->
        <footer class="container">
            <p class="float-end"><a href="#">Back to top</a></p>
            <p>&copy; 2023 Aresss.
        </footer>
        </main>

            <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>    
        </body>
        </html>

        @endsection