<?php
    $pageTitle = "Fortidsminder";
    include ('../partials/head.php');
    
    include ('../partials/nav.php');
?>

    <div class="container d-flex my-5">
        <div class="row align-items-center">
            <div class="col-2">
                <div class="dropdown">
                    <form action="/fortidsminder.php" method="GET">
                    <select class="">
                        <option selected>Vælg region</option>
                        <!-- foreach funktion -->
                        <option value="3">Three</option>
                    </select>
                    
                    </form>
                </div>
            </div>

            <div class="col-5 border">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, voluptas sint rem sequi itaque harum saepe distinctio nesciunt ullam mollitia qui voluptates neque atque eius eaque ratione a temporibus commodi!</p>
            </div>
            <div class="col-5 border">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus corrupti ipsam expedita ratione atque esse dolores cum blanditiis delectus possimus, officiis perferendis facere cupiditate in exercitationem quae id, iste sapiente?</p>
            </div>
        </div>
    </div>


<?php     
    include ('../partials/footer.php');
