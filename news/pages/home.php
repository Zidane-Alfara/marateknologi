<div class="col-xl-8 stretch-card grid-margin">
    <div class="row">
        <div class="position-relative">
            <img src="assets/images/banner.jpg" alt="banner" class="img-fluid" />
            <div class="banner-content">
                <div class="badge badge-danger fs-12 font-weight-bold mb-3">
                    global news
                </div>
                <h1 class="mb-0">GLOBAL PANDEMIC</h1>
                <h1 class="mb-2">
                    Coronavirus Outbreak LIVE Updates: ICSE, CBSE Exams
                    Postponed, 168 Trains
                </h1>
                <div class="fs-12">
                    <span class="mr-2">Photo </span>10 Minutes ago
                </div>
            </div>
        </div>
        <div class="content-wrapper" style="padding: 30px 0px;">
            <div class="row">
                <div class="col-xl-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h1 class="font-weight-600 mb-4">
                                        TECHNOLOGY
                                    </h1>
                                </div>

                                <?php

                                    include('config.php');

                                    $query = mysqli_query($conn, "SELECT * FROM tbl_news WHERE category='technology' ORDER BY id DESC LIMIT 0,2");

                                    while ($contentById = mysqli_fetch_assoc($query)) { ?>

                                <div class="col-sm-4 grid-margin">
                                    <div class="position-relative">
                                        <div class="rotate-img">
                                            <img src="assets/images/<?= $contentById['thumbnail']; ?>" alt="thumb"
                                                class="img-fluid" />
                                        </div>
                                        <div class="badge-positioned">
                                            <span class="badge badge-danger font-weight-bold"><?= $contentById['category']; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8  grid-margin">
                                    <h2 class="mb-2 font-weight-600"><a
                                            href="?pages=<?= $contentById['pagging']; ?>&id=<?= base64_encode(mysqli_real_escape_string($conn, $contentById['id'])); ?>"
                                            style="color: black;"><?= $contentById['judul']; ?></a></h2>
                                    <div class="fs-13 mb-2">
                                        <span class="mr-2"><i class="mdi mdi-calendar"></i>&nbsp; <?= substr($contentById['tanggal'], 0,10); ?></span>
                                    </div>
                                    <p class="mb-0">
                                        <?= substr(strip_tags(htmlspecialchars_decode($contentById["content"])), 0, 140); ?>...
                                    </p>
                                </div>

                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h1 class="font-weight-600 mb-4">
                                        CYBERSECURITY
                                    </h1>
                                </div>

                                <?php

                                    $query = mysqli_query($conn, "SELECT * FROM tbl_news WHERE category='cybersecurity' ORDER BY id DESC LIMIT 0,2");

                                    while ($contentById = mysqli_fetch_assoc($query)) { ?>

                                <div class="col-sm-4 grid-margin">
                                    <div class="position-relative">
                                        <div class="rotate-img">
                                            <img src="assets/images/<?= $contentById['thumbnail']; ?>" alt="thumb"
                                                class="img-fluid" />
                                        </div>
                                        <div class="badge-positioned">
                                            <span class="badge badge-danger font-weight-bold"><?= substr($contentById['category'], 0,10); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8  grid-margin">
                                    <h2 class="mb-2 font-weight-600"><a
                                            href="?pages=<?= $contentById['pagging']; ?>&id=<?= base64_encode(mysqli_real_escape_string($conn, $contentById['id'])); ?>"
                                            style="color: black;"><?= $contentById['judul']; ?></a></h2>
                                    <div class="fs-13 mb-2">
                                        <span class="mr-2"><i class="mdi mdi-calendar"></i>&nbsp; <?= substr($contentById['tanggal'], 0,10); ?> </span>
                                    </div>
                                    <p class="mb-0">
                                        <?= substr(strip_tags(htmlspecialchars_decode($contentById["content"])), 0, 140); ?>...
                                    </p>
                                </div>

                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h1 class="font-weight-600 mb-4">
                                        TIPS AND TRICKS
                                    </h1>
                                </div>
                                <?php

                                    $query = mysqli_query($conn, "SELECT * FROM tbl_news WHERE category='tips' ORDER BY id DESC LIMIT 0,2");

                                    while ($contentById = mysqli_fetch_assoc($query)) { ?>

                                <div class="col-sm-4 grid-margin">
                                    <div class="position-relative">
                                        <div class="rotate-img">
                                            <img src="assets/images/<?= $contentById['thumbnail']; ?>" alt="thumb"
                                                class="img-fluid" />
                                        </div>
                                        <div class="badge-positioned">
                                            <span class="badge badge-danger font-weight-bold"><?= $contentById['category']; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8  grid-margin">
                                    <h2 class="mb-2 font-weight-600"><a
                                            href="?pages=<?= $contentById['pagging']; ?>&id=<?= base64_encode(mysqli_real_escape_string($conn, $contentById['id'])); ?>"
                                            style="color: black;"><?= $contentById['judul']; ?></a></h2>
                                    <div class="fs-13 mb-2">
                                        <span class="mr-2"><i class="mdi mdi-calendar"></i>&nbsp; <?= substr($contentById['tanggal'], 0,10); ?></span>
                                    </div>
                                    <p class="mb-0">
                                        <?= substr(strip_tags(htmlspecialchars_decode($contentById["content"])), 0, 140); ?>...
                                    </p>
                                </div>

                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>