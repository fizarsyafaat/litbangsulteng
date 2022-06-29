<?php $this->extend('Admin\Template\Views\master\master_admin') ?>

<?= $this->section('main') ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                	<div class="row">
                		<div class="col-12">
							JUMLAH DATA :
							<iframe width="100%" height="100%" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQaG06HnsTzddZpS4UPzaSOPhMntGDwZLi1Vai77IOTbgwzxmWvBybjbVK0tljR0519z82EAl-I9Ji3/pubchart?oid=1472615049&amp;format=interactive"></iframe>
						</div>
					</div>
                	<div class="row">
                		<div class="col-12">
							Data Tervalidasi :
							<iframe width="100%" height="100%" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQaG06HnsTzddZpS4UPzaSOPhMntGDwZLi1Vai77IOTbgwzxmWvBybjbVK0tljR0519z82EAl-I9Ji3/pubchart?oid=466334091&amp;format=interactive"  style="height: 500px"></iframe>
						</div>
					</div>
                	<div class="row">
						<div class="col-12">
							Data Per Kecamatan : 
							<iframe width="100%" height="100%" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQaG06HnsTzddZpS4UPzaSOPhMntGDwZLi1Vai77IOTbgwzxmWvBybjbVK0tljR0519z82EAl-I9Ji3/pubchart?oid=1753115381&amp;format=interactive"  style="height: 500px"></iframe>
						</div>
					</div>
                	<div class="row">
						<div class="col-12">
							Data Per Kelurahan : 
							<iframe width="100%" height="100%" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQaG06HnsTzddZpS4UPzaSOPhMntGDwZLi1Vai77IOTbgwzxmWvBybjbVK0tljR0519z82EAl-I9Ji3/pubchart?oid=1594172787&amp;format=interactive" style="height: 700px"></iframe>
                		</div>
                	</div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
<?= $this->endsection('main') ?>