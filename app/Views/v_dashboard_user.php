<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row mb-2">
            <div class="col-12">
                <div class="alert alert-success">
                    <h5><i class="icon fas fa-check"></i> Selamat Datang Sahabat! <?= session()->get('nama_user') ?></h5>
                    <p class="mb-0">Anda login sebagai Pengurus Cabang <?= session()->get('cabang') ?>. Kelola data kader dengan bijak.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box shadow-sm hover-effect">
                    <span class="info-box-icon bg-green elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text text-bold">Data MAPABA</span>
                        <span class="info-box-number">
                            <?= $total_mapaba ?>
                            <small>Kader</small>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box shadow-sm hover-effect">
                    <span class="info-box-icon bg-green elevation-1"><i class="fas fa-user-graduate"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text text-bold">Data PKD</span>
                        <span class="info-box-number">
                            <?= $total_pkd ?>
                            <small>Kader</small>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box shadow-sm hover-effect">
                    <span class="info-box-icon bg-green elevation-1"><i class="fas fa-user-tie"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text text-bold">Data PKL</span>
                        <span class="info-box-number">
                            <?= $total_pkl ?>
                            <small>Kader</small>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box shadow-sm hover-effect">
                    <span class="info-box-icon bg-green elevation-1"><i class="fas fa-user-shield"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text text-bold">Data PKN</span>
                        <span class="info-box-number">
                            <?= $total_pkn ?>
                            <small>Kader</small>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box shadow-sm hover-effect">
                    <span class="info-box-icon bg-green elevation-1"><i class="fas fa-user-check"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text text-bold">Data ALUMNI</span>
                        <span class="info-box-number">
                            <?= $total_alumni ?>
                            <small>Kader</small>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .hover-effect {
        transition: transform 0.2s ease;
    }

    .hover-effect:hover {
        transform: translateY(-5px);
    }

    .info-box {
        min-height: 100px;
        background: linear-gradient(90deg, rgba(9, 9, 121, 0.3787640056022409) 0%, rgba(0, 212, 255, 0.5888480392156863) 100%);
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .info-box:nth-child(odd) .info-box-icon {
        background-color: #24308d !important;
    }

    .info-box:nth-child(even) .info-box-icon {
        background-color: #ffc107 !important;
    }

    .info-box-icon {
        border-radius: 10px 0 0 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        background: #24308d !important;
    }

    .info-box-icon i {
        font-size: 1.8rem;
        color: #ffc107 !important;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    }

    .info-box:nth-child(odd) .info-box-icon,
    .info-box:nth-child(even) .info-box-icon {
        background: #24308d !important;
    }

    .info-box-text {
        font-size: 1.1rem;
        color: #000;
    }

    .info-box-number {
        font-size: 1.5rem;
        font-weight: 600;
    }

    .info-box-number small {
        font-size: 0.9rem;
        color: #000;
        margin-left: 5px;
    }

    .alert-success {
        border-radius: 10px;
        border-left: 5px solid #28a745;
        background-color: #d4edda;
        color: #155724;
    }

    .info-box:nth-child(odd):hover {
        box-shadow: 0 0 15px rgba(0, 123, 255, 0.2);
    }

    .info-box:nth-child(even):hover {
        box-shadow: 0 0 15px rgba(255, 193, 7, 0.2);
    }
</style>