<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Products</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
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
						<h2>สินค้า</h2>
						<hr />
							<?php $atts  = array('enctype' => 'multipart/form-data','class' => 'form-horizontal' ); echo form_open('productsmanage/productsedit',$atts); ?>
							<div class="form-group">
								<label for="ProductsID" class="col-sm-2 control-label">รหัสสินค้า</label>
								<div class="col-xs-4">
									<input type="text" class="form-control" name="ProductsID" id="ProductsID" value="<?=$products[0]['ProductsID']?>">
								</div>
							</div>
							<div class="form-group">
								<label for="ProductsName" class="col-sm-2 control-label">ชื่อสินค้า</label>
								<div class="col-xs-4">
									<input type="text" class="form-control" name="ProductsName" id="ProductsName" value="<?=$products[0]['ProductsName']?>">
								</div>
							</div>
							<div class="form-group">
								<label for="ProductsType" class="col-sm-2 control-label">หมวด</label>
								<div class="col-xs-3">
									<select name="ProductsType" class="form-control">
										<?php 
											foreach ($type as $key => $value) {?>
												<option <?php if($value['ID']==$products[0]['ProductsType'])echo "selected";; ?> value="<?=$value['ID']?>"><?=$value['NameType']?></option>
											<?php }
										?> 			
																
									</select>									
								</div>
								
							</div>  
                                                <div class="form-group">
								<label for="more_online" class="col-sm-2 control-label">ข้อมูลจากเว็บ</label>
								<div class="col-xs-4">
									<input type="text" class="form-control" name="more_online" id="more_online" value="<?=$products[0]['more_online']?>" required">
								</div>
							</div>
							<div class="form-group">
								<label for="size" class="col-sm-2 control-label">รายละเอียด</label>
								<div class="col-xs-4">
									<textarea name="Description" class="form-control"  style="width: 500px;height:300px;" ><?=$products[0]['Description']?></textarea>
								</div>								
							</div><div class="form-group">
								<label for="file" class="col-sm-2 control-label">โบชัวร์</label>
								<div class="col-xs-4">
									 <input type="file" id="file" name="brochoure" multiple="multiple"/>
								</div>								
							</div>
                                                
							<div class="form-group">
								<label for="file" class="col-sm-2 control-label">ภาพ 1</label>
								<div class="col-xs-4">
									 <input type="file" id="file" name="pic1" multiple="multiple" accept="image/*" />
                                                                         <?php
                                                                         if($products[0]['pic1'] != ""){
                                                                            echo '<img src="'.base_url().'uploads_product/'.$products[0]['pic1'].'" width="50" height="40" alt="'.$products[0]['ProductsName'].'" class="img-thumbnail">';
                                                                         }
                                                                         ?>
								</div>								
							</div>								
                                                
                                                <div class="form-group">
								<label for="file" class="col-sm-2 control-label">ภาพ 2</label>
								<div class="col-xs-4">
									 <input type="file" id="file" name="pic2" multiple="multiple" accept="image/*"/>
                                                                         <?php
                                                                         if($products[0]['pic2'] != ""){
                                                                            echo '<img src="'.base_url().'uploads_product/'.$products[0]['pic2'].'" width="50" height="40" alt="'.$products[0]['ProductsName'].'" class="img-thumbnail">';
                                                                         }
                                                                         
                                                                         ?>
								</div>								
							</div>
                                                
                                                <div class="form-group">
								<label for="file" class="col-sm-2 control-label">ภาพ 3</label>
								<div class="col-xs-4">
									 <input type="file" id="file" name="pic3" multiple="multiple" accept="image/*" />
                                                                         <?php
                                                                         if($products[0]['pic3'] != ""){
                                                                            echo '<img src="'.base_url().'uploads_product/'.$products[0]['pic3'].'" width="50" height="40" alt="'.$products[0]['ProductsName'].'" class="img-thumbnail">';
                                                                         }
                                                                         ?>
								</div>								
							</div>
                                                
                                                <div class="form-group">
								<label for="file" class="col-sm-2 control-label">ภาพ 4</label>
								<div class="col-xs-4">
									 <input type="file" id="file" name="pic4" multiple="multiple" accept="image/*" />
                                                                         <?php
                                                                         if($products[0]['pic4'] != ""){
                                                                            echo '<img src="'.base_url().'uploads_product/'.$products[0]['pic4'].'" width="50" height="40" alt="'.$products[0]['ProductsName'].'" class="img-thumbnail">';
                                                                         }
                                                                         ?>
								</div>								
							</div>
                                                
                                                <div class="form-group">
								<label for="file" class="col-sm-2 control-label">ภาพ 5</label>
								<div class="col-xs-4">
									 <input type="file" id="file" name="pic5" multiple="multiple" accept="image/*" />
                                                                         <?php
                                                                         if($products[0]['pic5'] != ""){
                                                                            echo '<img src="'.base_url().'uploads_product/'.$products[0]['pic5'].'" width="50" height="40" alt="'.$products[0]['ProductsName'].'" class="img-thumbnail">';
                                                                         }
                                                                         ?>
								</div>								
							</div>									
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-primary">submit</button>
									<button type="reset" class="btn btn-default">reset</button>									
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