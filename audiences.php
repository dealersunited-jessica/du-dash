<?php include("pages/header.php");?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Audiences
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Audiences
                            </li>
                        </ol>
                    </div>
                     <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
				<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Create Audience Form 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="post" action="test.php">
                                        <div class="form-group">
                                            <label>Account Number</label>
                                            <input class="form-control" placeholder="Enter number" name="account" type="text">
                                        </div>
                                        <div class="form-group">
                                             <label>Pixel</label>
                                            <input class="form-control" placeholder="Enter number" name="pixel" type="text">
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                           		<label>OEM(s)</label>
                                            	<div class="radio" id="makes" required>
                                             	<?php	 	
                                            		echo $Displaymake
												;?>
													
												</div>
											</div>
                                        </div>
                                         <div class="form-group">
                                          <div class="checkbox-multiple" id="models" required>
												<?php
											  		echo $Displaymodel
												;?>
                                          </div>
                                        </div>
                                        <button type="submit" class="btn btn-default">Submit Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
								</div>
							</div>
						</div>
					</div>
				</div>           
           		</div>
           		<!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    <script type="text/javascript">
$(document).ready(function(){
    $('#makes input[type=radio]').on("click", function(){
        var inputVal = $(this).val(); 
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
				$("#models").html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", "#models option", function(){
        $(this).parents("#makes").find('#makes input[type=radio]').val($(this).text());
        $(this).parent("#models").empty();
    });
});
</script>

<script type="text/javascript">
function reindexer(frm)
{
    var counter = 0;
    var inputsPerRow = 2;
    for (var idx = 0; idx < frm.elements.length; idx++)
    {
        elm.name = elm.name.replace('%%INDEX%%', counter);
        if (idx % inputsPerRow == 1)
        {
            // only increment the counter (or row number) after you've processed all the
            // inputs from each row
            counter++;
        }
    }
}
</script>

</body>

</html>
