<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/app/css/styles.css">
    <script>
        function printProspective() {
            var content = document.getElementById("printProspective").innerHTML;
            var page = window.open('', '');
            page.document.write('<html><head><title>Prospective Menu</title></head>');
            page.document.write('<body><center><h1>Prospective Menu<h1>');
            page.document.write(content);
            page.document.write('</center></body></html>');
            page.document.close();
            page.print();
        }
    </script>
    <title>Prospective Menu</title>
</head>

<body>

    <!-- side navigation bar -->
    <div class="sidenav">
        <center>
        <a href="<?=BASE?>User/adminIndex"><img class="logo" src="/images/logo.png" alt=""></a>
        <h2 class="nav-title" style="color:white; margin-top: 30px">Welcome <?=$_SESSION["username"]?>!</h2>
        
        <h4 style="color:white; letter-spacing: 2px;"><?=$_SESSION["fullname"]?></h4>

        <div class="admin-navbar-items">
            <a style="color: #2fadfc; "href="<?=BASE?>User/adminIndex">Prospective Menu</a>
            <hr class="admin-hr">
            <a href="<?=BASE?>User/food">Food Inventory</a>
            <hr class="admin-hr">
            <a href="<?=BASE?>User/cleaning">Cleaning Supplies</a>
            <hr class="admin-hr">
            <a href="<?=BASE?>User/ingredients">Ingredients</a>
            <hr class="admin-hr">
            <a href="<?=BASE?>User/shopping">Shopping List</a>
            <hr class="admin-hr">
            <a href="<?=BASE?>User/discarded">Discarded List</a>
            <hr class="admin-hr">
            <a href="<?=BASE?>User/customers">Customers</a>
        </div>

        </center>
        <hr>
        <div class="text-center setting-logout-position-admin">
            <a href="<?=BASE?>User/adminSettings">Settings</a>
            <center>
                <hr class="setting-logout-hr">
            </center>
            <a href="<?=BASE?>Main/logout" class="logouthover">Logout</a>
        </div>
    </div>

    <!-- Prospective Display -->
    <div class="blue-box">

        <!-- Title and Search Bar -->
        <div class="container"> 
            <div class="row">
                <form action="/Item/searchProspective" method="POST">
                    <div class="col-12 d-flex flex-row" style="margin-top: 2%;">
                        <h1 id="foodTitle" style="color:white;">Prospective Menu</h1>
                        <div class="input-group rounded">
                            <input name="search" type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                            aria-describedby="search-addon" />
                            <span class="input-group-text border-0" id="search-addon">
                                <button type="submit" style="border:none;"> 
                            <i><img src="/images/search-icon.png"></i>
                        </button>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Add Button and Print Button -->
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-row" style="margin-top: 5%;">
                    <a href="<?=BASE?>Item/addProspectiveItem" class="btn btn-success" style="margin-left: 85%; margin-right: 2%;">Add</a>
                    <button class="btn btn-outline-light" onclick="printProspective()">Print</button>
                </div>
            </div>
        </div>

        <!-- Prospective View -->
        <div id="printProspective">
            <div class="container" style="margin-top: 5%;">
                <table class="table table-light table-hover" style="width: 87.9%; margin-left: 6%">
                    <tr class="table-secondary" style="table-layout: fixed;">
                        <th style="width: 20%">Images</th>
                        <th style="width: 13%">Name</th>
                        <th style="width: 30%">Description</th>
                        <th style="width:  8%">Price</th>
                        <th style="width:  8%">Goals</th>
                        <th style="width:  8%">Votes</th>
                        <th style="width:  12%">Actions</th>
                    </tr>
                </table>

                <div class="row overflow-auto" style="width: 90%; height: 50%; margin-left: 5%">
                    <div class="">
                        <table class="table table-light table-hover " style="table-layout: fixed; width:100%;">
                            <tr class="table-secondary">
                                <th style="width: 20%"></th>
                                <th style="width: 13%"></th>
                                <th style="width: 30%"></th>
                                <th style="width:  8%"></th>
                                <th style="width:  8%"></th>
                                <th style="width:  8%"></th>
                                <th style="width:  12%"></th>
                            </tr>
                            <?php 
                                foreach($data as $results) {
                                echo " <tr> 
                                            <td >
                                                <img src='$results->filename' style='width:120px; height: 120px;'>
                                            </td>
                                            <td style='word-wrap:break-word'>$results->item_name</td>
                                            <td style='word-wrap:break-word'>$results->item_description </td>
                                            <td >$results->item_price</td>
                                            <td >$results->goal</td>
                                            <td >$results->vote_count</td>
                                            <td >
                                                <a href='/Item/editProspectiveItem/$results->item_id' class='btn btn-primary' style='width:100%;''>Edit</a>
                                                <a href='/Item/deleteProspectiveItem/$results->item_id' class='btn btn-danger mt-2' style='width:100%;'>Delete</a>
                                            </td>
                                        </tr>";
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- black footer -->
    <footer class="footer">
        <center> 
            <div class="mt-2 allotherfooters">269 Boul. St-Jean #245J (Plaza Pointe-Claire)  Montreal,  QC <div> 
        </center>
    </footer>

</body>
</html>
