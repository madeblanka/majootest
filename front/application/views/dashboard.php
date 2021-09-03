<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Selamat Datang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://netdna.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <?php foreach($barang as $b):?>
        <div class="col-md-6 col-lg-4 g-mb-30">
          <article class="u-shadow-v18 g-bg-white text-center rounded g-px-20 g-py-40 g-mb-5">
            <img class="d-inline-block img-fluid mb-4" src="<?= base_url(); ?>uploads/<?= $b->gambar?>" alt="<?= $b->deskripsi?>">
            <h4 class="h5 g-color-black g-font-weight-600 g-mb-10"><?= $b->nama ?></h4>
            <p><?= $b->deskripsi?></p>
            <span class="d-block g-color-primary g-font-size-16">Rp. <?= $b->harga?></span>
          </article>
        </div>
        <?php endforeach?>
    </div>
</div>

<style type="text/css">
body{
    margin-top:20px;
    background-color: #fafafa !important;
}
@media (min-width: 0) {
    .g-mb-30 {
        margin-bottom: 2.14286rem !important;
    }
}

@media (min-width: 0) {
    .g-py-40 {
        padding-top: 2.85714rem !important;
        padding-bottom: 2.85714rem !important;
    }
}

@media (min-width: 0) {
    .g-px-20 {
        padding-left: 1.42857rem !important;
        padding-right: 1.42857rem !important;
    }
}
@media (min-width: 0){
    .g-mb-5 {
        margin-bottom: 0.35714rem !important;
    }
}

.g-bg-white {
    background-color: #fff !important;
}

.u-shadow-v18 {
    box-shadow: 0 5px 10px -6px rgba(0, 0, 0, 0.15);
}

.g-color-primary {
    color: #72c02c !important;
}

.g-font-size-16 {
    font-size: 1.14286rem !important;
}

.g-mb-10 {
    margin-bottom: 0.71429rem !important;
}

.g-mb-10 {
    margin-bottom: 0.71429rem !important;
}

.g-color-black {
    color: #000 !important;
}

.g-font-weight-600 {
    font-weight: 600 !important;
}
</style>

<script type="text/javascript">

</script>
</body>
</html>