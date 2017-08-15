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
						<h2>&#3586;&#3656;&#3634;&#3623;</h2>
						<hr />
						<?php $atts = array('enctype' => 'multipart/form-data', 'class' => 'form-horizontal');
							echo form_open('newsmanage/newsedit', $atts); ?>
						<input type="hidden" name="id" value="<?php echo $news[0]['id'] ?>" />
						
						<div class="form-group">
							<label for="title" class="col-sm-2 control-label">ประเภทหัวข้อข่าว</label>
							<div class="col-xs-4">
								
      <select  class="form-control"  name="type_news" id="type_news">
          <option value="ข่าวภายใน" <?=($news[0]['type_news']=="ข่าวภายใน") ? "selected" : "" ;?>>ข่าวภายใน</option>
          <option value="ข่าวภายนอก" <?=($news[0]['type_news']=="ข่าวภายนอก") ? "selected" : "" ;?>>ข่าวภายนอก</option>
		  <option value="หนังสือราชการ" <?=($news[0]['type_news']=="หนังสือราชการ") ? "selected" : "" ;?>>หนังสือราชการ</option>
          
      </select>
							</div>
						</div>
						
						<div class="form-group">
							<label for="title" class="col-sm-2 control-label">หัวข้อข่าว</label>
							<div class="col-xs-4">
								<input type="text" class="form-control" name="title" id="title" value="<?=$news[0]['title']?>">
							</div>
						</div>
						<div class="form-group">
							<label for="detail_news" class="col-sm-2 control-label">รายละเอียด</label>
							<div class="col-sm-8">
								<textarea rows='5' name="detail" id="detail" class="form-control"><?=$news[0]['detail']?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="ratio" class="col-sm-2 control-label">วันที่ประกาศ</label>
							<div class="col-xs-3">
								<?php $start = date("m/d/Y", strtotime($news[0]['start']));
									$end = date("m/d/Y", strtotime($news[0]['end']))
								?>
								<input type="text" class="form-control" name="daterange" value="<?php echo $start ?> - <?php echo $end ?>" />
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
									 <input type="file" id="file" name="files" accept="image/*"  />
									   <?php
                                                                         if($news[0]['img'] != ""){
                                                                            echo '<img src="'.base_url().'uploads/'.$news[0]['img'].'" width="100" height="160"  class="img-thumbnail">';
                                                                         }
                                                                         ?>
								</div>								
							</div>

							<div class="form-group">
								<label for="file" class="col-sm-2 control-label">เอกสารประกอบ 1</label>
								<div class="col-xs-4">
									 <input type="file" id="file1" name="file1" multiple="multiple"   />
                                                                         <?php
                                                                         if($news[0]['file1'] != ""){
                                                                            echo '<a href="'.base_url().'uploads/'.$news[0]['file1'].'"  >เอกสารประกอบ 1</a>';
                                                                         }
                                                                         ?>
								</div>								
							</div>
							
							<div class="form-group">
								<label for="file" class="col-sm-2 control-label">เอกสารประกอบ 2</label>
								<div class="col-xs-4">
									 <input type="file" id="file2" name="file2" multiple="multiple"   />
                                                                         <?php
                                                                         if($news[0]['file2'] != ""){
                                                                            echo '<a href="'.base_url().'uploads/'.$news[0]['file2'].'"  >เอกสารประกอบ 2</a>';
                                                                         }
                                                                         ?>
								</div>								
							</div>
							
							<div class="form-group">
								<label for="file" class="col-sm-2 control-label">เอกสารประกอบ 3</label>
								<div class="col-xs-4">
									 <input type="file" id="file3" name="file3" multiple="multiple"   />
                                                                         <?php
                                                                         if($news[0]['file3'] != ""){
                                                                            echo '<a href="'.base_url().'uploads/'.$news[0]['file3'].'"  >เอกสารประกอบ 3</a>';
                                                                         }
                                                                         ?>
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
