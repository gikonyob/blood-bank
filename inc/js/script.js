$(document).ready(function(){
	$error = $('<center><label class = "text-danger">Please Fill up the form!</label></center>');
	$error1 = $('<center><label class = "text-danger">Invalid username or password</label></center>');
	$loading = $('<center><img src = "images/loading.gif"></center>');
	$load_status= $('<center><label class = "text-success">Waiting...</label></center>');
	$valid = $('<center><label class = "text-danger">Username already taken!</label></center>');
	$mem_valid = $('<center><label class = "text-danger">Member name already exist!</label></center>');
	$club_valid = $('<center><label class = "text-danger">Request already exist!</label></center>');
	$rec_valid = $('<center><label class = "text-danger">Record already exists!</label></center>');
    $req_valid = $('<center><label class = "text-danger">Request already exists!</label></center>');
	

// Member Edit
$('#mem_edit').click(function(){
		$error.remove();
		$id = $('#id').val();
		$mem_valid.remove();
		$fname = $('#fname').val();
		$lname = $('#lname').val();
		$email = $('#email').val();
		$b_id = $('#b_id').val();
		if($fname == "" || $lname == "" || $email == "" || $b_id == ""){
			$error.appendTo('#loading');
		}else{
			$load_status.appendTo('#loading');
			setTimeout(function(){
				$.post('mem_validator.php', {fname: $fname, lname: $lname, email: $email, b_id: $b_id},
					function(result){
						if(result == "Success"){
							$mem_valid.appendTo('#loading');
						}else{
							$.ajax({
								type: 'POST',
								url: 'mem_edit_query.php?id=' + $id,
								data: {fname: $fname, lname: $lname, email: $email, b_id: $b_id},
								success: function(){
									window.location = 'member.php';
								}
							});
						}
					}
				);
			$load_status.remove();	
			}, 3000)
		}
	});
// Record Edit
    $('#rec_edit').click(function(){
        $error.remove();
        $id = $('#id').val();
        $rec_valid.remove();
        $camp = $('#camp').val();
        $ddate = $('#ddate').val();
        $bloodgroup = $('#bloodgroup').val();
        $pints = $('#pints').val();
        if($camp == "" || $ddate == "" || $bloodgroup == "" || $pints == ""){
            $error.appendTo('#loading');
        }else{
            $load_status.appendTo('#loading');
            setTimeout(function(){
                $.post('rec_validator.php', {camp: $camp, ddate: $ddate, bloodgroup: $bloodgroup, pints: $pints},
                    function(result){
                        if(result == "Success"){
                            $rec_valid.appendTo('#loading');
                        }else{
                            $.ajax({
                                type: 'POST',
                                url: 'rec_edit_query.php?id=' + $id,
                                data: {camp: $camp, ddate: $ddate, bloodgroup: $bloodgroup, pints: $pints},
                                success: function(){
                                    window.location = 'record.php';
                                }
                            });
                        }
                    }
                );
                $load_status.remove();
            }, 3000)
        }
    });
// Request Edit
    $('#reqt_edit').click(function(){
        $error.remove();
        $id = $('#id').val();
        $rec_valid.remove();
        $fname = $('#fname').val();
        $lname = $('#lname').val();
        $b_id = $('#b_id').val();
        $units = $('#units').val();
        $reqdate = $('#reqdate').val();
        $issueddate = $('#issueddate').val();
        $issuedunits = $('#issuedunits').val();
        if($fname == "" || $lname == "" || $b_id == "" || $units == "" || $reqdate == ""  || $issueddate == "" || $issuedunits == ""){
            $error.appendTo('#loading');
        }else{
            $load_status.appendTo('#loading');
            setTimeout(function(){
                $.post('req_validator.php', {fname: $fname, lname: $lname, b_id: $b_id, units: $units,reqdate: $reqdate, issueddate: $issueddate, issuedunits: $issuedunits},
                    function(result){
                        if(result == "Success"){
                            $req_valid.appendTo('#loading');
                        }else{
                            $.ajax({
                                type: 'POST',
                                url: 'req_edit_query.php?id=' + $id,
                                data: {fname: $fname, lname: $lname, b_id: $b_id, units: $units,reqdate: $reqdate, issueddate: $issueddate, issuedunits: $issuedunits},
                                success: function(){
                                    window.location = 'request.php';
                                }
                            });
                        }
                    }
                );
                $load_status.remove();
            }, 3000)
        }
    });

// Blood Request
$('#req_edit').click(function(){
		$error.remove();
		$id = $('#id').val();
		$club_valid.remove();
		$fname = $('#fname').val();
		$lname = $('#lname').val();
		$b_id = $('#b_id').val();
		if($fname == "" || $lname == "" || $b_id == ""){
			$error.appendTo('#loading');
		}else{
			$load_status.appendTo('#loading');
			setTimeout(function(){
				$.post('req_validator.php', {fname: $fname, lname: $lname, b_id: $b_id},
					function(result){
						if(result == "Success"){
							$club_valid.appendTo('#loading');
						}else{
							$.ajax({
								type: 'POST',
								url: 'req_edit_query.php?id=' + $id,
								data: {fname: $fname, lname: $lname, b_id: $b_id},
								success: function(){
									window.location = 'member.php';
								}
							});
						}
					}
				);
			$load_status.remove();	
			}, 3000)
		}
	});
	
});