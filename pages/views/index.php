    
    <?php
        include ('../partials/head.php');
        $pageTitle = "Forside";
        
        include ('../partials/nav.php');

    ?>

        <div class="container d-flex my-5">
            <div class="row align-items-center">
                <div class="col-6">
                    <div class="card shadow p-3 mb-5 bg-body rounded">
                        <img src="/img/pexels-spencer-davis-4388164.jpg" class="card-img-top" alt="...">
                        
                        <div class="card-body">
                            <h5 class="card-title">Fortidsminder</h5>
                            <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Numquam quibusdam sit assumenda delectus, ipsa maiores provident minima? Similique excepturi commodi, sed, voluptas dolor nobis maiores iure eaque officia laudantium sapiente!</p>
                            <a href="/pages/views/fortidsminder.php" class="btn btn-primary">Find fortidsminder</a>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card shadow p-3 mb-5 bg-body rounded">
                        <img src="/img/pexels-pixabay-262978.jpg" class="card-img-top" alt="...">
                        
                        <div class="card-body">
                            <h5 class="card-title">Spisesteder</h5>
                            <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Numquam quibusdam sit assumenda delectus, ipsa maiores provident minima? Similique excepturi commodi, sed, voluptas dolor nobis maiores iure eaque officia laudantium sapiente!</p>
                            <a href="/pages/views/testside.php" class="btn btn-primary">Find spisesteder</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>


    <?php
    
        include ('../partials/footer.php');
