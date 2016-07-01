function DeleteFlightRecordRow(sno)
{
    if (confirm("This row will be deleted. Press OK to confirm."))
    {
    	var ajaxurl = 'utility.php',
        data =  {'delete_flight_record_action': sno};
        $.post(ajaxurl, data, function (response)
        {

            if(response == "success")
            {
            	//alert(response);
            	 document.getElementById(sno).style.display = 'none';
            }
            else
            	alert(response);
        });
    }
}

function DeleteComponentRecordRow(partno)
{
    if (confirm("This row will be deleted. Press OK to confirm."))
    {
        var ajaxurl = 'utility.php',
        data =  {'delete_component_record_action': partno};
        $.post(ajaxurl, data, function (response)
        {

            if(response == "success")
            {
                //alert(response);
                 document.getElementById(partno).style.display = 'none';
            }
            else
                alert(response);
        });
    }
}

function EditFlightRecordRow(dataElement)
{
    var rowElement = (dataElement.parentNode).parentNode;
    var dataElements = rowElement.children;
    var childrenCount = dataElements.length; 
    var rowData = {"sno": rowElement.getAttribute('id')};

    for(var i = 0; i < childrenCount; i++)
    {
        var key = dataElements[i].getAttribute("name");
        var value = dataElements[i].innerHTML;
        if(key && key.length > 0)
        {
            if(value == "-")
                rowData[key] = "";
            else
                rowData[key] = value;
        }
    }
    var redirect = 'edit_flight_record.php';
    $.redirectPost(redirect, rowData);
}

function EditComponentRecordRow(dataElement)
{
    var rowElement = (dataElement.parentNode).parentNode;
    var dataElements = rowElement.children;
    var childrenCount = dataElements.length; 
    var rowData = {};

    for(var i = 0; i < childrenCount; i++)
    {
        var key = dataElements[i].getAttribute("name");
        var value = dataElements[i].innerHTML;
        if(key && key.length > 0)
        {
            if(value == "-")
                rowData[key] = "";
            else
                rowData[key] = value;
        }
    }
    var redirect = 'edit_component_record.php';
    $.redirectPost(redirect, rowData);
}

// jquery extend function
$.extend(
{
    redirectPost: function(location, args)
    {
        var form = '';
        $.each( args, function( key, value ) {
            value = value.split('"').join('\"')
            form += '<input type="hidden" name="'+key+'" value="'+value+'">';
        });
        $('<form action="' + location + '" method="POST">' + form + '</form>').appendTo($(document.body)).submit();
    }
});

function changeToUpperCase(element) {
   //var eleVal = document.getElementById(t.id);
   element.value= element.value.toUpperCase();
}
