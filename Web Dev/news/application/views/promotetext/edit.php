<!DOCTYPE html>

<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta charset="utf-8">

<title>ประกาศโปรโมชั่น</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>js/jquery-te-1.4.0.css" />
<script src="<?php echo base_url(); ?>js/jquery-1.11.3.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery-te-1.4.0.min.js"></script>
<body>

    <?php $this->load->view($master); ?>
    <br/><br/><br/><br/>
    <div class="container">
        <div class="starter-template">
            <div class="row">
                <div class="col-sm-12">
                    <?php $atts = array('enctype' => 'multipart/form-data', 'class' => 'form-horizontal');
							echo form_open('promotetextmanage/promotetextupdate', $atts);
 ?>
<input type="hidden" name="id" value="<?php echo $promotetext[0]['id'] ?>" />
                        <textarea class="editor" name="detail"><?php echo $promotetext[0]['detail']; ?></textarea>
                        <br><input type="reset" value="คืนค่าเดิม"> <input type="submit" value="บันทึก">
                    <?php form_close(); ?>

                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $(".editor").jqte();
        });
    </script>
</body>
