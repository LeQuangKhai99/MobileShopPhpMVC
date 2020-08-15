<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14895.67801714745!2d105.78196426977539!3d21.035906599999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab482b7693c1%3A0x13047177f26c9113!2zVGjhur8gZ2nhu5tpIERpIMSR4buZbmcgLSBD4bqndSBHaeG6pXk!5e0!3m2!1svi!2s!4v1591795716040!5m2!1svi!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

<?php 
    if (isset($data['success'])) {
        echo "<script>alert('".$data['success']."')</script>";
    }
?>
<div style="width: 50%; margin: auto;">
    <h2 style="text-align: center; margin: 50px 0;">Hãy nhập các thông tin cần liên hệ</h2>
    <form action="<?php echo constant("path")?>Customer/postContact" method="post">
            <div class="form-group">
                <label class="control-label col-md-6">Họ và tên</label>
                <input required class="form-control" name="Name" type="text" value="">
            </div>
            <div class="form-group">
                <label class="control-label col-md-6" >Địa chỉ email</label>
                <input required class="form-control" name="Email" type="email" value="">
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">Số điện thoại</label>
                <input required class="form-control" name="Phone" type="text" value="">
            </div>
            <div class="form-group">
                <label class="control-label col-md-6" >Địa chỉ</label>
                <input required class="form-control" name="Address" type="text" value="">
            </div>
            <div class="form-group">
                <label class="control-label col-md-6" >Nội dung</label>
                <textarea required class="form-control" name="Content" rows="6"></textarea>
            </div>
            <button style="margin-bottom: 50px" type="submit" class="btn btn-primary">Gửi</button>
    </form>
</div>