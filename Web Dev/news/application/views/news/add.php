<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Products</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
		<script src="<?php echo base_url(); ?>js/jquery-1.11.3.min.js"></script> 
		
		<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

		<!-- Include Date Range Picker -->
		<script type="text/javascript" src="<?php echo base_url(); ?>js/daterangepicker.js"></script>
		<script src="<?php echo base_url(); ?>js/tinymce/jquery.tinymce.min.js"></script> 
		<script src="<?php echo base_url(); ?>js/tinymce/tinymce.min.js"></script> 
		
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/daterangepicker.css" />
	</head>
	<style>
		.starter-template {
			padding: 90px 15px;
		}
	</style>
	<body>
		<?php $this->load->view($master); ?>
		<div class="container">
			<div class="starter-template">
				<div class="row">
					<div class="col-sm-12">
						<h2>ข่าว</h2>
						<hr />
						<?php $atts = array('enctype' => 'multipart/form-data', 'class' => 'form-horizontal');
							echo form_open('newsmanage/newsadd', $atts);
 ?>
<div class="form-group">
							<label for="title" class="col-sm-2 control-label">ประเภทหัวข้อข่าว</label>
							<div class="col-xs-4">
								
      <select  class="form-control"  name="type_news" id="type_news">
          <option value="ข่าวภายใน"  >ข่าวภายใน</option>
          <option value="ข่าวภายนอก"  >ข่าวภายนอก</option>
		  <option value="หนังสือราชการ"  >หนังสือราชการ</option>
          
      </select>
							</div>
						</div>
						<div class="form-group">
							<label for="title" class="col-sm-2 control-label">หัวข้อข่าว</label>
							<div class="col-xs-4">
								<input type="text" class="form-control" name="title" id="title" required>
							</div>
						</div>
						<div class="form-group">
							<label for="detail_news" class="col-sm-2 control-label">รายละเอียด</label>
							<div class="col-sm-8">
								<textarea name="detail" id="detail" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="ratio" class="col-sm-2 control-label">&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;&#3611;&#3619;&#3632;&#3585;&#3634;&#3624;</label>
							<div class="col-xs-3">
								<input type="text" class="form-control" name="daterange" value="<?php echo date('m/d/Y')."-".date('m/d/Y') ?>" />
								<script type="text/javascript">
									$(function() {
										$('input[name="daterange"]').daterangepicker();
									});
								</script>
							</div>
						</div>
						<div class="form-group">
								<label for="file" class="col-sm-2 control-label">ภาพ</label>
								<div class="col-xs-4">
									 <input type="file" id="file" name="files" accept="image/*" />
								</div>								
							</div>	
							
							<div class="form-group">
								<label for="file" class="col-sm-2 control-label">เอกสารประกอบ 1</label>
								<div class="col-xs-4">
									 <input type="file" id="file1" name="file1" multiple="multiple"   />
                                                                          
								</div>								
							</div>
							
							<div class="form-group">
								<label for="file" class="col-sm-2 control-label">เอกสารประกอบ 2</label>
								<div class="col-xs-4">
									 <input type="file" id="file2" name="file2" multiple="multiple"   />
                                                                          
								</div>								
							</div>
							
							<div class="form-group">
								<label for="file" class="col-sm-2 control-label">เอกสารประกอบ 3</label>
								<div class="col-xs-4">
									 <input type="file" id="file3" name="file3" multiple="multiple"   />
                                                                          
								</div>								
							</div>
							
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-primary">
								submit
							</button>
							<button type="reset" class="btn btn-default">
								reset
							</button>
						</div>
					</div>
				</div>
			</div>
			<!-- /.row -->
		</div>
		</div>
		<!-- /.container-fluid -->

	</body>
</html>
<script type="text/javascript">
$(function(){
	
	tinymce.init({
  selector: "textarea",
  height: 500,
  plugins: [
    "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak",
    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
    "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"
  ],

  toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
  toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
  toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | visualchars visualblocks nonbreaking template pagebreak restoredraft",
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'],

  menubar: false,
  toolbar_items_size: 'small',

  style_formats: [{
    title: 'Bold text',
    inline: 'b'
  }, {
    title: 'Red text',
    inline: 'span',
    styles: {
      color: '#ff0000'
    }
  }, {
    title: 'Red header',
    block: 'h1',
    styles: {
      color: '#ff0000'
    }
  }, {
    title: 'Example 1',
    inline: 'span',
    classes: 'example1'
  }, {
    title: 'Example 2',
    inline: 'span',
    classes: 'example2'
  }, {
    title: 'Table styles'
  }, {
    title: 'Table row 1',
    selector: 'tr',
    classes: 'tablerow1'
  }],

  templates: [{
    title: 'Test template 1',
    content: 'Test 1'
  }, {
    title: 'Test template 2',
    content: 'Test 2'
  }]
});

});

</script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
