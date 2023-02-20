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
            </div>

            <div class="carousel-item">
                <img class="container" src="/img/kepala-badan-perlindungan-pekerja-migran-indonesia-bp2mi-benny-rhamdani_220606231725-509.jpg" height="500" weight="500">
        
                <div class="container">
                <div class="carousel-caption">
                    
                </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="container" src="/img/BP2MI_logo.png" height="500" weight="500">
        
                <div class="container">
                <div class="carousel-caption text-end">
                    
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
        
            <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading fw-normal lh-1">First featurette heading.</h2>
                <p class="lead">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellat, eius! In rem sint maxime consectetur dolores cumque deserunt? Consequatur distinctio maiores repellendus laboriosam nemo aut beatae quibusdam, accusamus, rem perferendis quam. Eaque, quisquam amet inventore corporis quam velit temporibus optio eum, asperiores veniam maxime, nisi aspernatur laboriosam! Quam blanditiis assumenda repellat, numquam debitis, sunt, adipisci ipsum similique voluptates sapiente magnam.</p>
            </div>
            <div class="col-md-5">
                <img src="/img/sejarah1.jpg" height="440" weight="440">
            </div>
            </div>
        
            <hr class="featurette-divider">
        
            <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading fw-normal lh-1">Oh yeah, it’s that good.</h2>
                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, voluptatibus quidem officia voluptatum, odit laborum aperiam suscipit unde dolore, nesciunt voluptas quasi atque facilis inventore et blanditiis consequatur repellendus totam voluptates animi temporibus nisi ut alias? Mollitia sunt facilis hic?</p>
            </div>
            <div class="col-md-5 order-md-1">
                <img src="/img/bp2mi_jerman1.jpg" height="430" weight="430">
            </div>
            </div>
        
            <hr class="featurette-divider">
        
            <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading fw-normal lh-1">And lastly, this one.</h2>
                <p class="lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis reiciendis neque iste! Ad, eveniet molestiae?</p>
            </div>
            <div class="col-md-5">
                <img src="/img/5e1e772d26146.jpg" height="430" weight="430">
            </div>
            </div>
        
            <hr class="featurette-divider">
        
        </div><!-- /.container -->
        
        
        <!-- FOOTER -->
        <footer class="container">
            <p class="float-end"><a href="#">Back to top</a></p>
            <p>&copy; 2022 Aresss.
        </footer>
        </main>

            <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>    
        
        </body>
        </html>

        @endsection