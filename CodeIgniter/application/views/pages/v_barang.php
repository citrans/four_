<!--========================= Content Wrapper ==============================-->
<div class="tabbable tabs-left">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tabDistro" data-toggle="tab"><strong>DISTRO</strong></a></li>
        <li><a href="#tabKonveksi" data-toggle="tab"><strong>KONVEKSI</strong></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tabDistro">
            <?php $this->load->view('pages/v_distro')?>
        </div>
        <div class="tab-pane" id="tabKonveksi">
            <?php $this->load->view('pages/v_konveksi')?>
        </div>
    </div>
</div>