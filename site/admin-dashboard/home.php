<?php include 'db_connect.php' ?>
<style>
    span.float-right.summary_icon {
        font-size: 3rem;
        position: absolute;
        right: 1rem;
        top: 0;
    }

    .imgs {
        margin: .5em;
        max-width: calc(100%);
        max-height: calc(100%);
    }

    .imgs img {
        max-width: calc(100%);
        max-height: calc(100%);
        cursor: pointer;
    }

    #imagesCarousel,
    #imagesCarousel .carousel-inner,
    #imagesCarousel .carousel-item {
        height: 60vh !important;
        background: black;
    }

    #imagesCarousel .carousel-item.active {
        display: flex !important;
    }

    #imagesCarousel .carousel-item-next {
        display: flex !important;
    }

    #imagesCarousel .carousel-item img {
        margin: auto;
    }

    #imagesCarousel img {
        width: auto !important;
        height: auto !important;
        max-height: calc(100%) !important;
        max-width: calc(100%) !important;
    }
</style>

<div class="containe-fluid">
    <div class="row mt-3 ml-3 mr-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <?php echo "Welcome back " . $_SESSION['login_name'] . "!"  ?>
                    <hr>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="card border-primary">
                                <div class="card-body bg-primary">
                                    <div class="card-body text-white">
                                        <span class="float-right summary_icon"> <i class="fa fa-home "></i></span>
                                        <h4><b>
                                                <?php echo $conn->query("SELECT  distinct market_name FROM demand_1")->num_rows ?>
                                            </b></h4>
                                        <p><b>Total Markets</b></p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="index.php?page=houses" class="text-primary float-right">View List <span class="fa fa-angle-right"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card border-warning">
                                <div class="card-body bg-warning">
                                    <div class="card-body text-white">
                                        <span class="float-right summary_icon"> <i class="fa fa-user-friends "></i></span>
                                        <h4><b>
                                                <?php echo $conn->query("SELECT distinct owner_name FROM demand_1 ")->num_rows ?>
                                            </b></h4>
                                        <p><b>Total Tenants</b></p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="index.php?page=tenants" class="text-primary float-right">View List <span class="fa fa-angle-right"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card border-success">
                                <div class="card-body bg-success">
                                    <div class="card-body text-white">
                                        <span class="float-right summary_icon"> <i class="fa fa-file-invoice "></i></span>
                                        <h4><b>
                                                <?php
                                                // $payment = $conn->query("SELECT sum(amount) as paid FROM payments where date(date_created) = '" . date('Y-m-d') . "' ");
                                                // echo $payment->num_rows > 0 ? number_format($payment->fetch_array()['paid'], 2) : 0;
                                                $payment = $conn->query("SELECT SUM(amount) as paid FROM payments WHERE MONTH(date_created) = MONTH(CURRENT_DATE()) AND YEAR(date_created) = YEAR(CURRENT_DATE())");
                                                echo $payment->num_rows > 0 ? number_format($payment->fetch_array()['paid'], 2) : 0;
                                                ?>
                                            </b></h4>
                                        <p><b>Payments This Month</b></p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="index.php?page=invoices" class="text-primary float-right">View Payments <span class="fa fa-angle-right"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <p id="demo"></p>
                    <div class="row">
                        <div class="col-sm-8">
                            <canvas id="monthlydue"></canvas>
                        </div>

                        <div class="col-sm-4">
                            <canvas id="typeofshop"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var zones = <?php echo json_encode($zones); ?>;
    document.getElementById("demo").innerHTML = zones;
</script>
<script>
    const ctx = document.getElementById('monthlydue');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['आसिनगर झोन-वागदे', 'धंतोली -देशपांडे', 'धरमपेठ-भानुसे', 'धरमपेठ-राऊत', 'गांधीबाग-देवकाटे', 'गांधीबाग-जिवतोडे', 'हनुमान नगर- राठोड', 'लकडगंज-नाना वाट', 'मंगळवारी-बडे', 'सतरंजीपुरा-कपिल ठाकरे'],
            datasets: [{
                label: 'Monthly Due Rent',
                data: [12, 19, 3, 5, 2, 3, 4, 5, 6, 7],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false
                    }
                }],
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<script>
    const ctx1 = document.getElementById('typeofshop');

    new Chart(ctx1, {
        type: 'pie',
        data: {
            labels: ['अस्थाई जागा', 'ओटे', 'IOC जागा', 'POC जागा', 'मोठी शाॅप', 'पडाव जागा'],
            datasets: [{
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 1
            }]
        },

    });
</script>
<script>
    $('#manage-records').submit(function(e) {
        e.preventDefault()
        start_load()
        $.ajax({
            url: 'ajax.php?action=save_track',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success: function(resp) {
                resp = JSON.parse(resp)
                if (resp.status == 1) {
                    alert_toast("Data successfully saved", 'success')
                    setTimeout(function() {
                        location.reload()
                    }, 800)

                }

            }
        })
    })
    $('#tracking_id').on('keypress', function(e) {
        if (e.which == 13) {
            get_person()
        }
    })
    $('#check').on('click', function(e) {
        get_person()
    })

    function get_person() {
        start_load()
        $.ajax({
            url: 'ajax.php?action=get_pdetails',
            method: "POST",
            data: {
                tracking_id: $('#tracking_id').val()
            },
            success: function(resp) {
                if (resp) {
                    resp = JSON.parse(resp)
                    if (resp.status == 1) {
                        $('#name').html(resp.name)
                        $('#address').html(resp.address)
                        $('[name="person_id"]').val(resp.id)
                        $('#details').show()
                        end_load()

                    } else if (resp.status == 2) {
                        alert_toast("Unknow tracking id.", 'danger');
                        end_load();
                    }
                }
            }
        })
    }
</script>
<?php
$query = "SELECT DISTINCT zone_name FROM bakaya";
$is_query_run = mysqli_query($conn, $query);
$zones = array();
if ($is_query_run) {
    while ($query_executed = mysqli_fetch_assoc($is_query_run)) {
        $zones[] = $query_executed["zone_name"];
    }
}
while ($zone = array_pop($zones)) {
    $query = "SELECT SUM(monthly_rent) FROM bakaya WHERE zone_name = '$zone'";
    $is_query_run = mysqli_query($conn, $query);
    $monthly_rent = array();
    //  $i=0;
    if ($is_query_run) {
        while ($query_executed = mysqli_fetch_assoc($is_query_run)) {
            $monthly_rent[] = $query_executed["SUM(monthly_rent)"];
        }
    }
    //  $i=$i+1;
}
//print_r($monthly_rent);
$query = "SELECT DISTINCT shop_type FROM bakaya";
$is_query_run = mysqli_query($conn, $query);
$shop_types = array();
if ($is_query_run) {
    while ($query_executed = mysqli_fetch_assoc($is_query_run)) {
        $shop_types[] = $query_executed["shop_type"];
    }
}
?>