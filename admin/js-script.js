// JavaScript Document


//  for select / deselect all

$('document').ready(function()
{
    $(".select-all").click(function ()
    {
        $('.chk-box').attr('checked', this.checked)
    });
        
    $(".chk-box").click(function()
    {
        if($(".chk-box").length == $(".chk-box:checked").length)
        {
            $(".select-all").attr("checked", "checked");
        }
        else
        {
            $(".select-all").removeAttr("checked");
        }
    });
});


//  for select / deselect all


//  page redirect on user click edit/delete
function edit_camp() 
{
	document.frm.action = "edit_camp.php";
	document.frm.submit();		
}

function edit_requests()
{
    document.frm.action = "edit_status.php";
    document.frm.submit();
}
function delete_camp() 
{
	document.frm.action = "delete_camp.php";
	document.frm.submit();
}
function delete_contactus() 
{
	document.frm.action = "delete_contactus.php";
	document.frm.submit();
}
function delete_doctor()
{
    document.frm.action = "delete_doctor.php";
    document.frm.submit();
}
function delete_admin()
{
    document.frm.action = "delete_admin.php";
    document.frm.submit();
}
function delete_news()
{
    document.frm.action = "delete_news.php";
    document.frm.submit();
}
function delete_requests()
{
	document.frm.action = "delete_requests.php";
	document.frm.submit();		
}
function edit_records() 
{
	document.frm.action = "edit_mul.php";
	document.frm.submit();		
}
function delete_records() 
{
	document.frm.action = "delete_mul.php";
	document.frm.submit();
}


//  page redirection