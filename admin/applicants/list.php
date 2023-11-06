<?php
	 if(!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }

?> 
	<div class="row">
    <div class="col-lg-12">
            <h1 class="page-header">List of Applicant's   </h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
                
 
						<form class="wow fadeInDownaction" action="controller.php?action=delete" Method="POST">  
						<div class="table-responsive">	 		
							<table id="dash-table" class="table table-striped  table-hover table-responsive" style="font-size:12px" cellspacing="0">

							  <thead>
							  	<tr>
									<th>Applicant</th>
									<th>Job Title</th>
									<th>Company</th>
									<th>Applied Date</th> 
									<th>Remarks</th>
									<th width="14%" >Action</th> 
							  	</tr>	
							  </thead> 
							  <tbody>
							  	<?php   
							  		// $mydb->setQuery("SELECT * 
											// 			FROM  `tblusers` WHERE TYPE != 'Customer'");
							  		$mydb->setQuery("SELECT * FROM `tblcompany` c  , `tbljobregistration` j, `tbljob` j2, `tblapplicants` a WHERE c.`COMPANYID`=j.`COMPANYID` AND  j.`JOBID`=j2.`JOBID` AND j.`APPLICANTID`=a.`APPLICANTID` ");
							  		$cur = $mydb->loadResultList();

									foreach ($cur as $result) { 
							  		echo '<tr>';
							  		// echo '<td width="5%" align="center"></td>';
							  		echo '<td>'. $result->APPLICANT.'</td>';
							  		echo '<td>' . $result->OCCUPATIONTITLE.'</a></td>';
							  		echo '<td>' . $result->COMPANYNAME.'</a></td>'; 
							  		echo '<td>'. $result->REGISTRATIONDATE.'</td>';
							  		echo '<td>'. $result->REMARKS.'</td>';
									  echo '<td align="center">
									  <a title="View" href="index.php?view=view&id='.$result->REGISTRATIONID.'"  class="btn btn-info btn-xs  ">
					  		             <span class="fa fa-info fw-fa"></span> View</a> 
									 
									  <a title="Delete" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteModal">
										  <span class="fa fa-trash-o fw-fa"> Remove</span>
									  </a>
								  
								  </td>';
							  // Add the centered modal
							  echo '<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
									  <div class="modal-dialog modal-dialog-centered" role="document">
										  <div class="modal-content text-center">
											  <div class="modal-header">
												  <h5 class="modal-title" id="deleteModalLabel">Delete Confirmation</h5>
												  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
													  <span aria-hidden="true">&times;</span>
												  </button>
											  </div>
											  <div class="modal-body">
												  <p>Are you sure you want to delete?</p>
											  </div>
											  <div class="modal-footer">
											  <a title="Remove" href="index.php?view=delete&id='.$result->REGISTRATIONID.'"  class="btn btn-danger   "></span> Yes</a> 
											  
											  <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
											</div>
										  </div>
										</div>
									  </div>';
								    
								 
					  				
							  		echo '</tr>';
							  	} 
							  	?>
							  </tbody>
								
							</table>
 
						</div>
							</form>
       
                 
 